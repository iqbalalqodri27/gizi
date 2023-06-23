<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Posyandu;
use Illuminate\Http\Request;
use Redirect,Response;
Use DB;
use Carbon\Carbon;



class ChartJSController extends Controller

{

    /**
     * Write code on Method
     *
     * @return response()
     */

        public function index()
        {
          $posyandu = Posyandu::select(DB::raw("COUNT(*) as count"), DB::raw("status as statuss"))
          // ->whereYear('NT')
          ->groupBy(DB::raw("statuss"))
          ->orderBy('id','ASC')
          ->pluck('count', 'statuss');

$labels = $posyandu->keys();
$data = $posyandu->values();
    
return view('chart', compact('labels', 'data'));
        
}

}
