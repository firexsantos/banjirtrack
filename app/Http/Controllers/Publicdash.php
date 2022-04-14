<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Publicdash extends Controller
{
    public function index(){
        return view('publicdash',[
            'title' => 'Banjir Tracking App Kota Pekanbaru',
            'desk' => 'Banjir Tracking App Kota Pekanbaru',
            'keyword' => 'Bajir Tracking, Kota Pekanbaru, Pendeteksi Banjir, Alat Deteksi Banjir, Pemerintah Kota Pekanbaru, Pekanbaru'
        ]);
    }

    public function api(){
		header("Access-Control-Allow-Origin: *");
		$id		= trim(@$_GET['id']);
		if(empty($id)){
			$datane = Status::with('alats','alerts')->get();
            // $datane = DB::select(DB::raw("SELECT a.*, b.`nm_alat`, b.`alamat`, b.`gambar`, b.`jarak_normal`, b.`lat`, b.`lng`, c.`nm_alert`, c.`icon`, c.`color`, c.`desk` FROM statuses a LEFT JOIN alats b ON a.`alat_id` = b.`id` LEFT JOIN alerts c ON a.`alert_id` = c.`id`"));
			return response()->json($datane);
		}else{
			$datane = Status::with('alats','alerts')->where('alats_id', $id)->get();
			return response()->json($datane);
		}

        // dd($datane);
    }
}
