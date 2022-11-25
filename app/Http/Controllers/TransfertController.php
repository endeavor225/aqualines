<?php

namespace App\Http\Controllers;

use App\Carte;
use App\Transfert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class TransfertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'client_id' => '',
            'carte_id' => '',
            'NumeroCarte' => 'required|unique:cartes',
        ]);

      

        $batch = DB::table('batchs')->where('NumeroCarte', $request->NumeroCarte)->first();

        if ($batch) {

            $cle = $batch->CLE;

        $client = DB::table('clients')->where('id', $request->client_id)->first();
        $IDClient = $client->id;
        $number = $client->TelephoneClient;

        
        $carte = Carte::where('id', $request->carte_id)->first();
        $IDCarte =$carte->id;
        $SoldeCarte = $carte->Solde;
        $AncienCarte = $carte->NumeroCarte;

        Carte::create([
            'client_id' => $IDClient,
            'NumeroCarte' => $request->NumeroCarte,
            'Solde'  => $SoldeCarte,
            'Cle'  => $cle,
        ]);

        Transfert::create([
            'carte_id' => $request->carte_id,
            'NumeroCarte' => $request->NumeroCarte,
        ]);


         // Envoie de sms
         $numbers = '+225' . $number;

         $sid    = env("TWILIO_SID");
         $token  =  env("TWILIO_TOKEN");
         $client = new Client($sid, $token);

         $message = 'Transfert de carte effectué avec succès du '.$AncienCarte. ' vers le ' . $request->NumeroCarte . '. Solde : ' . $SoldeCarte . ' FCFA. Aqualines vous souhaite une excellente journée!';

         $client->messages->create($numbers, [
             'from' => 'AQUALINES',
             'body' => $message
         ]);


        Carte::where('id', $IDCarte)->update(['Solde' => 0]);

        Session::flash('success', 'Transfert de la carte effectuer avec succès.');
        $cartes = Carte::all();
        return redirect()->route('cartes.index', compact('cartes'));

        }
        
        Session::flash('erreur', 'Cette carte n\'existe pas.');
        return back()->withInput()->withErrors([
            'NumeroCarte' => 'Cette carte n\'est pas valable',
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Carte $carte)
    {
        dd($carte);
        // $ID = Carte::where('id', $CarteID)->first();
        // $Solde = $ID->Solde;

        // // DB::table('cartes')
        // Carte::where('id', $CarteID)->update(['Solde' => $Montant + $Solde]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
