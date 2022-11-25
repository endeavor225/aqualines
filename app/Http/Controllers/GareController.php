<?php

namespace App\Http\Controllers;

use App\Gare;
use App\Recharge;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class GareController extends Controller
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
        $gares = Gare::all();

        return view('gares.index', compact('gares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gares.create');
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
            'NomGare' => 'required',
            'ResponsableGare' => 'required',
            'NumeroGare' => 'required|unique:gares',
            'AdresseGare' => 'required|email',
            'TelephoneGare' => 'required|min:8',
            'Couleur' => 'required|unique:gares'
        ]);

        Gare::create($gare);

        $gares = Gare::all();

        Session::flash('success', 'Nouvelle gare ajoutée avec succès.');

        return redirect()->route('gares.index', compact('gares'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function show($gare)
    {
        $gares = Gare::find($gare);

        // dd($gares->id);

        $chiffreDaffaires = Transaction::where('gare_id', $gare)->whereDate('created_at', '=', Carbon::today()
            ->toDateString())
            ->sum('DebitTransaction');

        $NombreDeTransactions = Transaction::where('gare_id', $gare)->whereDate('created_at', '=', Carbon::today()
            ->toDateString())
            ->count();

        $Rechargement = Recharge::where('gare_id', $gare)->whereDate('created_at', '=', Carbon::today()
            ->toDateString())
            ->sum('Montant');
        // =============================CHIFFRE D'AFFAIRE===============================================
        $caMois = Transaction::where('gare_id', $gare)->whereMonth('created_at', '=', Carbon::now())
            ->sum('DebitTransaction');

        $caAnnee = Transaction::where('gare_id', $gare)->whereYear('created_at', '=', Carbon::now())
            ->sum('DebitTransaction');

        $caHier = Transaction::where('gare_id', $gare)->whereDate('created_at', '=', Carbon::yesterday()
            ->toDateString())
            ->sum('DebitTransaction');
        // =============================RECHARGE===============================================
        $RMois = Recharge::where('gare_id', $gare)->whereMonth('created_at', '=', Carbon::now())
            ->sum('Montant');

        $RAnnee = Recharge::where('gare_id', $gare)->whereYear('created_at', '=', Carbon::now())
            ->sum('Montant');

        $RHier = Recharge::where('gare_id', $gare)->whereDate('created_at', '=', Carbon::yesterday()
            ->toDateString())
            ->sum('Montant');
        // =============================TRANSACTION===============================================
        $TMois = Transaction::where('gare_id', $gare)->whereMonth('created_at', '=', Carbon::now())
            ->count();

        $TAnnee = Transaction::where('gare_id', $gare)->whereYear('created_at', '=', Carbon::now())
            ->count();

        $THier = Transaction::where('gare_id', $gare)->whereDate('created_at', '=', Carbon::yesterday()
            ->toDateString())
            ->count();

        return view('gares.show', compact('gare', 'gares', 'chiffreDaffaires', 'Rechargement', 'NombreDeTransactions', 'caMois', 'caAnnee', 'caHier', 'RMois', 'RAnnee', 'RHier', 'TMois', 'TAnnee', 'THier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function edit(Gare $gare)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gare $gare)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gare  $gare
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gare $gare)
    {
        //
    }
}
