<?php

namespace App\Http\Controllers;

use App\Gare;
use App\Transaction;
use App\Recharge;
use App\User;
use App\Voyage;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $chiffreDaffaires = Transaction::whereDate('created_at', '=', Carbon::today()
        ->toDateString())
        ->sum('DebitTransaction');

        $NombreDeTransactions = Transaction::whereDate('created_at', '=', Carbon::today()
        ->toDateString())
        ->count();

        $Rechargement = Recharge::whereDate('created_at', '=', Carbon::today()
        ->toDateString())
        ->sum('Montant');

        //recupérer l'id du user connecté
        $user= auth()->user()->id;
        $gare = User::where('id', $user)->first();
        $gareID = $gare->gare_id;

        if ($gareID) {
            // $gares = Gare::whereMonth('created_at', '=', Carbon::now()
            // )->where('id', $gareID)->get();
            $gares = Gare::where('id', $gareID)->get();
            $Annee = Carbon::now()->format('Y');
            return view('home', compact('chiffreDaffaires', 'NombreDeTransactions', 'Rechargement', 'gares', 'Annee'));
        }

        $Annee = Carbon::now()->format('Y');
        $gares = Gare::all();
        return view('home', compact('chiffreDaffaires', 'NombreDeTransactions', 'Rechargement', 'gares', 'Annee'));
    }

    
    function getAllMonths(){

		$month_array = array();
		$posts_dates = Transaction::orderBy( 'created_at', 'ASC' )->pluck( 'created_at' );
		$posts_dates = json_decode( $posts_dates );

		if ( ! empty( $posts_dates ) ) {
			foreach ( $posts_dates as $unformatted_date ) {
				$date = new \DateTime( $unformatted_date );
				$month_no = $date->format( 'm' );
				$month_name = $date->format( 'M' );
				$month_array[ $month_no ] = $month_name;
			}
		}
		return $month_array;
	}

	function getMonthlyPostCount( $month ) {
		$monthly_post_count = Transaction::whereMonth( 'created_at', $month )->get()->count();
		return $monthly_post_count;
	}

	function getMonthlyPostData() {

		$monthly_post_count_array = array();
		$month_array = $this->getAllMonths();
		$month_name_array = array();
		if ( ! empty( $month_array ) ) {
			foreach ( $month_array as $month_no => $month_name ){
				$monthly_post_count = $this->getMonthlyPostCount( $month_no );
				array_push( $monthly_post_count_array, $monthly_post_count );
				array_push( $month_name_array, $month_name );
			}
		}

		$max_no = max( $monthly_post_count_array );
		$max = round(( $max_no + 10/2 ) / 10 ) * 10;
		$monthly_post_data_array = array(
			'months' => $month_name_array,
			'post_count_data' => $monthly_post_count_array,
			'max' => $max,
		);

		return $monthly_post_data_array;

    }
}


