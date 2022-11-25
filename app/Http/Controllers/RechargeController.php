<?php

namespace App\Http\Controllers;

use DB;
use App\Caisse;
use App\Carte;
use App\Gare;
use App\Recharge;
use App\User;
use Twilio\Rest\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RechargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //recupérer l'id du user connecté
        $user = auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        if ($gareID) {
            $recharges  = Recharge::where('gare_id', $gareID)->get();
            return view('recharges.index', compact('recharges'));
        }

        $recharges  = Recharge::all();
        return view('recharges.index', compact('recharges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recupérer l'id du user connecté
        $user = auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        $cartes = Carte::all();
        $gares = Gare::all();
        $caisses = Caisse::where('gare_id', $gareID)->get();
        return view('recharges.create', compact('cartes', 'gares', 'caisses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'NumeroDeCarte'  => 'required',
            'Montant' => 'required|integer',
            'TypeRecharge'  => 'required',
            'caisse_id'  => 'required'
        ]);

        //recupérer l'id du user connecté
        $user = auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        //Vérifier si NumeroCarte existe
        $numero = Carte::where('NumeroCarte', $request->NumeroDeCarte)->first();

        if ($numero) {

            $numero_id = $numero->id;

            $rechargement =  Recharge::create([
                'carte_id' => $numero_id,
                'Montant' => $request->Montant,
                'TypeRecharge'  => $request->TypeRecharge,
                'caisse_id'  => $request->caisse_id,
                'gare_id'  => $gareID,
            ]);

            $CarteID = $rechargement->carte_id;
            $Montant = $rechargement->Montant;

            $ID = Carte::where('id', $CarteID)->first();
            $Solde = $ID->Solde;
            $number = $ID->client->TelephoneClient;

            Carte::where('id', $CarteID)->update(['Solde' => $Montant + $Solde]);
            $Solde = Carte::where('id', $CarteID)->first();
            $NouveauSolde = $Solde->Solde;

            // Envoie de sms
            $numbers = '+225' . $number;

            $sid    = env("TWILIO_SID");
            $token  =  env("TWILIO_TOKEN");
            $client = new Client($sid, $token);

            $message = 'Rechargement reussi. Montant de la transaction : ' . $request->Montant . ' Fcfa, Nouveau Solde : ' . $NouveauSolde . ' FCFA. Aqualines vous souhaite une excellente journée!';

            $client->messages->create($numbers, [
                'from' => 'AQUALINES',
                'body' => $message
            ]);

            $recharges = Recharge::all();

            Session::flash('success', 'Rechargement effectué avec succès.');

            return redirect()->route('recharges.index', compact('recharges'));
        }

        //sinon
        Session::flash('erreur', 'Cette carte n\'existe pas.');
        return back()->withInput()->withErrors([
            'NumeroDeCarte' => 'Cette carte n\'est pas valable',
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function show(Recharge $recharge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function edit(Recharge $recharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recharge $recharge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recharge  $recharge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recharge $recharge)
    {
        //
    }
}
