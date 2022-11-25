<?php

namespace App\Http\Controllers;

use App\Carte;
use App\Client;
use App\Bonus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();

        return view('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $client = request()->validate([
            'NomClient' => 'required',
            'PrenomClient' => 'required',
            'AdresseClient' => '',
            'TelephoneClient' => 'required|min:8',
            'NumeroCarte' => 'required|integer|unique:cartes',
            'Solde' => 'integer',
        ]);

        $batch = DB::table('batchs')->where('NumeroCarte', $request->NumeroCarte)->first();

        if ($batch) {
            $cle = $batch->CLE;

            $client = Client::create([
                'NomClient' => $request->NomClient,
                'PrenomClient' => $request->PrenomClient,
                'AdresseClient' => $request->AdresseClient,
                'TelephoneClient' => $request->TelephoneClient,
            ]);

            $bonus = Carte::create([
                'client_id' => $client->id,
                'NumeroCarte' => $request->NumeroCarte,
                'Solde' => $request->Solde,
                'Cle' => $cle,
            ]);

            Bonus::create([
                'carte_id' => $bonus->id,
            ]);

            Session::flash('success', 'Nouvelle carte ajoutée avec succès.');
            $cartes = Carte::all();

            return redirect()->route('cartes.index', compact('cartes'));
        }

        Session::flash('erreur', 'Cette carte n\'existe pas.');

        return back()->withInput()->withErrors([
            'NumeroCarte' => 'Cette carte n\'est pas valable',
            ]);

        //recuperer le dernier id
        // $clients = Client::create($client);
        // $last_id = $clients->id;
        // return view('cartes.create', compact('last_id'));  //remplace le code

        // dd($last_id);

        // Client::create($client);
        // $clients = Client::latest()->paginate(1);

        // return redirect()->route('cartes.create', compact('clients'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Client $client
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        // dd($client);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Client $client
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Client              $client
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
        $donnes = request()->validate([
            'NomClient' => 'required',
            'PrenomClient' => 'required',
            'AdresseClient' => '',
            'TelephoneClient' => 'required|min:8',
        ]);

        $client->update($donnes);
        $clients = Client::all();

        Session::flash('success', 'Mise à jour effectuée avec succès.');

        return redirect()->route('clients.index', compact('clients'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Client $client
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
    }
}
