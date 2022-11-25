<?php

namespace App\Http\Controllers;

use App\Voyage;
use App\Bateau;
use App\Gare;
use App\Terminal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VoyageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //recupérer l'id du user connecté
        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;
        
        if ($gareID) {
            $voyages = Voyage::where('gare_id', $gareID)->get();
            return view('voyages.index', compact('voyages'));
        }
        $voyages = Voyage::all();
        return view('voyages.index', compact('voyages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gares = Gare::all();
        $bateaus = Bateau::all();

         //recupérer l'id du user connecté
         $user= auth()->user()->id;
         $gare = User::where('id', $user)->first();
         $gareID = $gare->gare_id;

        $terminals = Terminal::where('Statut', 0)->where('gare_id', $gareID)->get();

        return view('voyages.create', compact('bateaus', 'gares', 'terminals'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $voyage = request()->validate([
            'CodeVoyage' => 'required|unique:voyages',
            'PassageInitial' => '',
            'MontantVoyage' => 'required|integer',
            'bateau_id' => 'required|integer',
            'NombrePassage' => 'integer',
            'Depart' => 'required',
            'Destination' => 'required',
            'Statut' => 'required',
            'terminal1' => 'required',
            'terminal2' =>'',
        ]);

         //recupérer l'id du user connecté
        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;
     
        $TerSelect = Voyage::create([
            'CodeVoyage' => $request->CodeVoyage,
            'PassageInitial' => $request->PassageInitial,
            'MontantVoyage' => $request->MontantVoyage,
            'bateau_id' => $request->bateau_id,
            'NombrePassage' => $request->NombrePassage,
            'Depart' => $request->Depart,
            'Destination' => $request->Destination,
            'Statut' => $request->Statut,
            'terminal1' => $request->terminal1,
            'terminal2' => $request->terminal2,
            'gare_id' => $gareID,

        ]);

        $voyages = Voyage::all();

        $ID =$TerSelect->terminal1;

        Terminal::where('id', $ID)->update(['Statut' => 1]);

        Session::flash('success', 'Nouveau voyage ajouté avec succès.');
        return redirect()->route('voyages.index', compact('voyages'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function show(Voyage $voyage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function edit(Voyage $voyage)
    {
        $terminals = Terminal::all();
        $bateaus = Bateau::all();
        return view('voyages.edit', compact('voyage', 'bateaus', 'terminals'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Voyage $voyage)
    {
        // $voyages = Voyage::find($voyage); 
        // $ID = $voyages->terminal1;
        // Terminal::where('id', $ID)->update(['Statut' => 0]);
        
        // $voyage->update([
        //     'statut' => request()->has('statut')
        // ]);

        // $ID =$request->terminal1;
        // Terminal::where('id', $ID)->update(['Statut' => 0]);

        // return back();
        // dd(request()->has('statut'));
        $donnes = request()->validate([
            'CodeVoyage' => '',
            'DateVoyage' => '',
            'MontantVoyage' => '',
            'bateau_id' => '',
            'NombrePassage' => '',
            'Depart' => '',
            'Destination' => '',
            'Statut' => 'required',
            'terminal1' =>'',
            'terminal2' =>''
        ]);

        $voyage->update($donnes);
        $voyages = Voyage::all();

        $ID =$request->terminal1;

        Terminal::where('id', $ID)->update(['Statut' => 0]);

        return redirect()->route('voyages.index', compact('voyages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Voyage  $voyage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voyage $voyage)
    {
        //
    }
}
