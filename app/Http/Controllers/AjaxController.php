<?php

namespace App\Http\Controllers;

use App\Recharge;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AjaxController extends Controller
{
    public function update(){

        $chiffreDaffaires = Transaction::whereDate('created_at', '=', Carbon::today()
        ->toDateString())
        ->sum('DebitTransaction');

        $NombreDeTransactions = Transaction::whereDate('created_at', '=', Carbon::today()
        ->toDateString())
        ->count();

        $Rechargement = Recharge::whereDate('created_at', '=', Carbon::today()
        ->toDateString())
        ->sum('Montant');

        return response()->json([
            'chiffreDaffaires' => $chiffreDaffaires,
            'NombreDeTransactions' => $NombreDeTransactions,
            'Rechargement' => $Rechargement,
        ]);
    }
}
