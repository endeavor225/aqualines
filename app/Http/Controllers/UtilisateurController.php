<?php

namespace App\Http\Controllers;

use App\Gare;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UtilisateurController extends Controller
{
    public function index()
    {
        $users = User::all();
        $gares = Gare::all();
        return view('utilisateurs.index', compact('users', 'gares'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gares = Gare::all();
        return view('utilisateurs.create', compact('gares'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $users = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => 'required',
            'gare_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password'  => Hash::make($request->password),
            'role'  => $request->role,
            'gare_id'  => $request->gare_id,
        ]);
        $users = User::all();
        $gares = Gare::all();
        return view('utilisateurs.index', compact('users', 'gares'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($user)
    {
        $users = User::find($user);

        $gares = Gare::all();
        return view('utilisateurs.edit', compact('users', 'gares'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $users = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'role' => 'required',
            'gare_id' => 'required',
        ]);

        $user->update($users);

        $users = User::all();
        $gares = Gare::all();

        Session::flash('success', 'Mise à jour effectuée avec succès.');

        return redirect()->route('utilisateurs.index', compact('users', 'gares'));
    }
}
