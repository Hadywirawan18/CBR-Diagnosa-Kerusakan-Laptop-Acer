<?php

namespace App\Http\Controllers;

use App\Fitur;
use Illuminate\Http\Request;

class RevisiController extends Controller
{
    public function create(Request $request)
    {
        $frs = $request->get('fiturs');
        $fiturs = [];
        foreach (json_decode($frs) as $fr) {
            $fitur = Fitur::find($fr);
            array_push($fiturs, $fitur);
        }
        return view('user.revisi', ['fiturs'=>$fiturs]);
    }
}
