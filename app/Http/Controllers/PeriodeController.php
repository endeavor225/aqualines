<?php

namespace App\Http\Controllers;

use App\Gare;
use App\Recharge;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('periodes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $gare = request()->validate([
            'id' => 'required',
            'date' => 'required',
            'date2' => ''
        ]);

       if ($request->date2) {

    $date = $request->date;
    $date2 = $request->date2;
    $gare = Gare::where('id', $request->id)->first();

    $transaction = Transaction::where('gare_id', $request->id)->whereBetween('created_at', [$request->date, $request->date2])
        ->sum('DebitTransaction');

    $NombreDeTransactions = Transaction::where('gare_id', $request->id)->whereBetween('created_at', [$request->date, $request->date2])
        ->count();

    $Rechargement = Recharge::where('gare_id', $request->id)->whereBetween('created_at', [$request->date, $request->date2])
        ->sum('Montant');

    // =============================CHIFFRE D'AFFAIRE===============================================
    $caMois = Transaction::where('gare_id', $request->id)->whereMonth('created_at', '=', Carbon::now())
        ->sum('DebitTransaction');

    $caAnnee = Transaction::where('gare_id', $request->id)->whereYear('created_at', '=', Carbon::now())
        ->sum('DebitTransaction');

    $caHier = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', Carbon::yesterday()
        ->toDateString())
        ->sum('DebitTransaction');
    // =============================RECHARGE===============================================
    $RMois = Recharge::where('gare_id', $request->id)->whereMonth('created_at', '=', Carbon::now())
        ->sum('Montant');

    $RAnnee = Recharge::where('gare_id', $request->id)->whereYear('created_at', '=', Carbon::now())
        ->sum('Montant');

    $RHier = Recharge::where('gare_id', $request->id)->whereDate('created_at', '=', Carbon::yesterday()
        ->toDateString())
        ->sum('Montant');
    // =============================TRANSACTION===============================================
    $TMois = Transaction::where('gare_id', $request->id)->whereMonth('created_at', '=', Carbon::now())
        ->count();

    $TAnnee = Transaction::where('gare_id', $request->id)->whereYear('created_at', '=', Carbon::now())
        ->count();

    $THier = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', Carbon::yesterday()
        ->toDateString())
        ->count();

    return view('/details', compact('transaction', 'NombreDeTransactions', 'Rechargement', 'date', 'gare', 'caMois', 'caAnnee', 'caHier', 'RMois', 'RAnnee', 'RHier', 'TMois', 'TAnnee', 'THier', 'date2'));
    
       }

        $date = $request->date;
        $date2 = $request->date2;
        $gare = Gare::where('id', $request->id)->first();

        $transaction = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', $request->date)
            ->sum('DebitTransaction');

        $NombreDeTransactions = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', $request->date)
            ->count();

        $Rechargement = Recharge::where('gare_id', $request->id)->whereDate('created_at', '=', $request->date)
            ->sum('Montant');

        // =============================CHIFFRE D'AFFAIRE===============================================
        $caMois = Transaction::where('gare_id', $request->id)->whereMonth('created_at', '=', Carbon::now())
            ->sum('DebitTransaction');

        $caAnnee = Transaction::where('gare_id', $request->id)->whereYear('created_at', '=', Carbon::now())
            ->sum('DebitTransaction');

        $caHier = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', Carbon::yesterday()
            ->toDateString())
            ->sum('DebitTransaction');
        // =============================RECHARGE===============================================
        $RMois = Recharge::where('gare_id', $request->id)->whereMonth('created_at', '=', Carbon::now())
            ->sum('Montant');

        $RAnnee = Recharge::where('gare_id', $request->id)->whereYear('created_at', '=', Carbon::now())
            ->sum('Montant');

        $RHier = Recharge::where('gare_id', $request->id)->whereDate('created_at', '=', Carbon::yesterday()
            ->toDateString())
            ->sum('Montant');
        // =============================TRANSACTION===============================================
        $TMois = Transaction::where('gare_id', $request->id)->whereMonth('created_at', '=', Carbon::now())
            ->count();

        $TAnnee = Transaction::where('gare_id', $request->id)->whereYear('created_at', '=', Carbon::now())
            ->count();

        $THier = Transaction::where('gare_id', $request->id)->whereDate('created_at', '=', Carbon::yesterday()
            ->toDateString())
            ->count();

        return view('/details', compact('transaction', 'NombreDeTransactions', 'Rechargement', 'date', 'gare', 'caMois', 'caAnnee', 'caHier', 'RMois', 'RAnnee', 'RHier', 'TMois', 'TAnnee', 'THier', 'date2'));

        // return redirect()->route('details', compact('transaction', 'NombreDeTransactions', 'Rechargement'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
