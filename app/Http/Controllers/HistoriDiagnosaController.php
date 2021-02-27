<?php

namespace App\Http\Controllers;

use App\DetailKasus;
use App\Kasus;
use Illuminate\Http\Request;

class HistoriDiagnosaController extends Controller
{
    public function index()
    {
        return view("user.histori-diagnosa");
    }

    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);

        // mengambil data detail kasus dengan id kasus yg sama dengan parameter id yg dibawa fungsi show() ini
        $detail_kasus = DetailKasus::where('kasus_id', $id)->get();

        return view('user.detail-histori-kasus', [
            'kasus' => $kasus,
            'detail_kasus' => $detail_kasus
        ]);
        
    }
}
