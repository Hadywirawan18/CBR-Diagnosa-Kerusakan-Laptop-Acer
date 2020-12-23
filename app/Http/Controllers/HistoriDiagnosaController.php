<?php

namespace App\Http\Controllers;

use App\DetailKasus;
use App\Kasus;
use Illuminate\Http\Request;

class HistoriDiagnosaController extends Controller
{
    public function index()
    {
        $cases = Kasus::paginate(10);
        return view("user.histori-diagnosa", compact("cases"));
    }

    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);

        // mengambil data detail kasus dengan id kasus yg sama dengan parameter id yg dibawa fungsi show() ini
        $detail_kasus = DetailKasus::where('kasus_id', $id)->get();

        return view('user.view', [
            'kasus' => $kasus,
            'detail_kasus' => $detail_kasus
        ]);
        // }
        // public function detail($id)
        // {
        //     $detail = DetailKasus::findOrFail($id);
        //     return view("user.histori-diagnosa", compact("detail"));
        // }
    }
}
