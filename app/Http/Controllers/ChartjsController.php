<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartjsController extends Controller
{
    public function chart()
      {

        // gares.Couleurs,
        $data = DB::select('select 
        transactions.gare_id,
        gares.NomGare,
        gares.Couleur,
        
          sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 1 THEN 1 ELSE 0 END ) ) AS "Janvier",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 2 THEN 1 ELSE 0 END ) ) AS "Fevrier",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 3 THEN 1 ELSE 0 END ) ) AS "Mars",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 4 THEN 1 ELSE 0 END ) ) AS "Avril",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 5 THEN 1 ELSE 0 END ) ) AS "Mai",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 6 THEN 1 ELSE 0 END ) ) AS "Juin",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 7 THEN 1 ELSE 0 END ) ) AS "Juillet",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 8 THEN 1 ELSE 0 END ) ) AS "Aout",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 9 THEN 1 ELSE 0 END ) ) AS "Septembre",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 10 THEN 1 ELSE 0 END ) ) AS "Octobre",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 11 THEN 1 ELSE 0 END ) ) AS "Novembre",
              sum( ( CASE MONTH ( `transactions`.`created_at` ) WHEN 12 THEN 1 ELSE 0 END ) ) AS "Decembre",
        count(transactions.id) AS NbreTransaction 
      FROM 
          transactions,
          gares
      WHERE
          transactions.gare_id = gares.id
          and YEAR ( `transactions`.`created_at` ) = YEAR ( now( ) ) 
          group by transactions.gare_id  
      ORDER BY `Janvier`  DESC');

        return json_encode($data);
      }
}
// return view('chartjs')->with('data',json_encode($data,JSON_NUMERIC_CHECK)); 