<?php

namespace App\Http\Controllers;

use App\Gare;
use App\Recharge;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;


use App\Transaction;
use App\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
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
            $transactions = Transaction::where('gare_id', $gareID)->get();
            return view('transactions.index', compact('transactions'));
        }
        $transactions = Transaction::all();

        return view('transactions.index', compact('transactions'));
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
        $gare = request()->validate([
            'date' => 'required',
            'id' => 'required'
        ]);

        // dd($gare);

        $transaction = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', $request->date)
            ->sum('DebitTransaction');

        $NombreDeTransactions = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', $request->date)
            ->count();


        $Rechargement = Recharge::where('gare_id', $request->id)->whereDate('created_at', '=', $request->date)
            ->sum('Montant');

        // dd($gare);

        return view('/details', compact('transaction', 'NombreDeTransactions', 'Rechargement'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
