<?php

namespace App\Http\Controllers;

use App\Bateau;
use App\Gare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BateauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bateaus = Bateau::all();

        return view ('bateaus.index', compact('bateaus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gares = Gare::all();

        return view('bateaus.create', compact('gares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $bateau = request()->validate([
            'Matricule' => 'required|unique:bateaus',
            'Capacite' => 'required|integer',
            'Libelle' => 'required',
            'Poids' => 'required|integer',
            'Details' => 'required',
            'Kilometrage' => 'required|integer',
            'gare_id' => 'required'
        ]);


        Bateau::create($bateau);
        $bateaus = Bateau::all();
        
        Session::flash('success', 'Nouveau bateau ajouté avec succès.');

        return redirect()->route('bateaus.index', compact('bateaus'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function show(Bateau $bateau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function edit(Bateau $bateau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bateau $bateau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bateau  $bateau
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bateau $bateau)
    {
        //
    }
}
