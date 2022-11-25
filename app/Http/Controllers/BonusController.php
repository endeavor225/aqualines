<?php

namespace App\Http\Controllers;

use App\Bonus;
use Illuminate\Http\Request;

class BonusController extends Controller
{
    public function index()
    {
        $bonus = Bonus::all();
        return view('bonus.index', compact('bonus'));
    }
}
