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

        public function index(Request $request)
        {
          if (isset($request->bulan)) {
            $posyandu = Posyandu::select(DB::raw("COUNT(*) as count"), DB::raw("status_gizi as statuss"))
            ->whereYear('created_at', '=', $request->tahun)
            ->whereMonth('created_at','=', $request->bulan)
            ->groupBy(DB::raw("statuss"))
            ->orderBy('id','ASC')
            ->pluck('count', 'statuss');

            // dd($posyandu);

            $labels = $posyandu->keys();
            $data = $posyandu->values();
            $bulan = $request->bulan;
            $tahun = $request->tahun;
          
          
        return view('chart', compact('data', 'labels','bulan','tahun'));

          }else{
            $posyandu = Posyandu::select(DB::raw("COUNT(*) as count"), DB::raw("status_gizi as statuss"))
                        ->whereMonth('created_at', '00')
                        ->groupBy(DB::raw("statuss"))
                        ->orderBy('id','ASC')
                        ->pluck('count', 'statuss');

                        $labels = $posyandu->keys();
                        $data = $posyandu->values();

            return view('chart', compact('data', 'labels'));

          }

          
        
}

}
