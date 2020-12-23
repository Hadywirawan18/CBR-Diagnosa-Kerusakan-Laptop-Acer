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
    public function detail($id)
    {
        $detail = DetailKasus::findOrFail($id);
        return view("user.histori-diagnosa", compact("detail"));
    }
}
