<?php

namespace App\Http\Controllers;

use App\Bonus;
use App\Carte;
use App\Client;
use App\Transfert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CarteController extends Controller
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
        $cartes = Carte::all();
        // $clients = Client::latest()->paginate(10);

        return view('cartes.index', compact('cartes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::latest()->paginate(1);
        return view('cartes.create', compact('clients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $carte = request()->validate([
            'client_id' => 'required|integer',
            'NumeroCarte' => 'required|integer|unique:cartes',
            'Solde' => 'integer'
        ]);
        // Carte::create($carte);
        // $cartes = Carte::all();
        // return view('cartes.index', compact('cartes'));
        // return redirect()->route('cartes.index', compact('cartes'));

        
        $batch = DB::table('batchs')->where('NumeroCarte', $request->NumeroCarte)->first();
        
        if ($batch) {

            $cle = $batch->CLE;
            
            $bonus = Carte::create([
                'client_id' => $request->client_id,
                'NumeroCarte' => $request->NumeroCarte,
                'Solde'  => $request->Solde,
                'Cle'  => $cle,
            ]);

            Bonus::create([
                'carte_id' =>$bonus->id,
            ]);

            Session::flash('success', 'Nouvelle carte ajoutée avec succès.');
            $cartes = Carte::all();
            return redirect()->route('cartes.index', compact('cartes'));
        }
    
        Session::flash('erreur', 'Cette carte n\'existe pas.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Carte  $carte
     * @return \Illuminate\Http\Response
     */
    public function show(Carte $carte)
    {
        dd($carte);
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Carte  $carte
     * @return \Illuminate\Http\Response
     */
    public function edit($carte)
    {
        $cartes= Carte::find($carte);
        $transferts = Transfert::where('carte_id', $cartes->id)->first();
        
        return view('cartes.edit', compact('cartes', 'transferts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Carte  $carte
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carte $carte)
    {
        $carte->update([
            'statut' => request()->has('statut')
        ]);

        return back();

        // $blog = Carte::where('id', '=', $carte)->first();

        // $blog->update($request->all());

        // $carte->update($donnes);
        // $cartes = Carte::all();
        // return view('cartes.index', compact('cartes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Carte  $carte
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carte $carte)
    {
        //
    }
}
