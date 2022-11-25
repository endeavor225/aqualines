<?php

namespace App\Http\Controllers;

use App\Caisse;
use App\Gare;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CaisseController extends Controller
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
            $caisses = Caisse::where('gare_id', $gareID)->get();
            return view('caisses.index', compact('caisses'));
        }

        $caisses = Caisse::all();
        return view('caisses.index', compact('caisses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //recupérer l'id du user connecté
        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        if ($gareID) {
            $gares = Gare::where('id', $gareID)->get();
            return view('caisses.create', compact('gares'));
        }
        $gares = Gare::all();
        return view('caisses.create', compact('gares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $caisse = request()->validate([
            'NomCaisse' => 'required'
        ]);

        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        Caisse::create([
            'NomCaisse' => $request->NomCaisse,
            'gare_id' => $gareID,
        ]);
        $caisses = Caisse::all();

        Session::flash('success', 'Une nouvelle caisse a été ajoutée avec succès.');

        return redirect()->route('caisses.index', compact('caisses'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function show(Caisse $caisse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function edit(Caisse $caisse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Caisse $caisse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Caisse  $caisse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Caisse $caisse)
    {
        //
    }
}
