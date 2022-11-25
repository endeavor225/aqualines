<?php

namespace App\Http\Controllers;

use App\Gare;
use App\Terminal;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TerminalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        if ($gareID) {
            $terminals=Terminal::where('gare_id', $gareID)->get();
            return view('terminals.index', compact('terminals'));
        }
        $terminals=Terminal::all();
        return view('terminals.index', compact('terminals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        if ($gareID) {
            $gares = Gare::where('id', $gareID)->get();
            return view('terminals.create', compact('gares'));
        }
        $gares = Gare::all();
        return view('terminals.create', compact('gares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $terminal = request()->validate([
            'Libelle' => 'required',
            'NumeroSerie' => 'required|unique:terminals',
            'Statut' => ''
        ]);

        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        Terminal::create([
            'Libelle' => $request->Libelle,
            'NumeroSerie' => $request->NumeroSerie,
            'gare_id' => $gareID,
            'Statut' => $request->Statut,
        ]);

        $terminals=Terminal::all();

        Session::flash('success', 'Nouveau terminal ajouté avec succès.');

        return redirect()->route('terminals.index', compact('terminals'));
        
        
        // ->with('message', 'Nouveau terminal ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function show(Terminal $terminal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function edit(Terminal $terminal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Terminal $terminal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Terminal  $terminal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Terminal $terminal)
    {
        //
    }
}
