<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
{
    public function graphe()
      {
        $data = DB::select('select 
        transactions.gare_id,
        gares.NomGare,
        gares.Couleur,
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 0 THEN 1 ELSE 0 END ) ) AS "Miniut",
	  sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 1 THEN 1 ELSE 0 END ) ) AS "Un",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 2 THEN 1 ELSE 0 END ) ) AS "Deux",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 3 THEN 1 ELSE 0 END ) ) AS "Trois",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 4 THEN 1 ELSE 0 END ) ) AS "Quatre",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 5 THEN 1 ELSE 0 END ) ) AS "Cinq",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 6 THEN 1 ELSE 0 END ) ) AS "Six",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 7 THEN 1 ELSE 0 END ) ) AS "Sept",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 8 THEN 1 ELSE 0 END ) ) AS "Huit",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 9 THEN 1 ELSE 0 END ) ) AS "Neuf",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 10 THEN 1 ELSE 0 END ) ) AS "Dix",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 11 THEN 1 ELSE 0 END ) ) AS "Onze",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 12 THEN 1 ELSE 0 END ) ) AS "Douze",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 13 THEN 1 ELSE 0 END ) ) AS "Treize",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 14 THEN 1 ELSE 0 END ) ) AS "Quatorze",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 15 THEN 1 ELSE 0 END ) ) AS "Quinze",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 16 THEN 1 ELSE 0 END ) ) AS "Seize",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 17 THEN 1 ELSE 0 END ) ) AS "Dixsept",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 18 THEN 1 ELSE 0 END ) ) AS "Dixhuit",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 19 THEN 1 ELSE 0 END ) ) AS "Dixneuf",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 20 THEN 1 ELSE 0 END ) ) AS "Vingt",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 21 THEN 1 ELSE 0 END ) ) AS "Vingtun",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 22 THEN 1 ELSE 0 END ) ) AS "Vingtdeux",
          sum( ( CASE HOUR ( `transactions`.`created_at` ) WHEN 23 THEN 1 ELSE 0 END ) ) AS "Vingttrois",
              
              
        count(transactions.id) AS NbreTransaction 
      FROM 
          transactions,
          gares
      WHERE
          transactions.gare_id = gares.id
          and date ( `transactions`.`created_at` ) = date ( now( ) ) 
          group by transactions.gare_id');

        return json_encode($data);
      }
}
