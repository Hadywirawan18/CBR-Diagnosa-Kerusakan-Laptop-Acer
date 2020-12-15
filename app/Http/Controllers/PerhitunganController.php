<?php

namespace App\Http\Controllers;

use App\DetailKasus;
use App\Fitur;
use Illuminate\Http\Request;

class PerhitunganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fitur = Fitur::all();
        return view("perhitungan.index", [
            'fitur' => $fitur
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fitur = $request->input('fitur');

        $kasus_ids = [];
        $kasuses = [];

        foreach ($fitur as $f) {
            $detailKasus = DetailKasus::where('fitur_id', $f)->get();
            foreach ($detailKasus as $d) {
                if (!(in_array($d->kasus_id, $kasus_ids))) {
                    array_push($kasus_ids, $d->kasus_id);

                    $dk = DetailKasus::where('kasus_id', $d->kasus_id)->get();
                    array_push($kasuses, $dk);
                }
            }
        }

        $total_bobot = 0;
        $total_bobot_terpilih = 0;
        $list_hasil_perhitungan = [];

        foreach ($kasuses as $kasus) {
            foreach ($kasus as $dk) {
                $total_bobot += $dk->bobot;

                if (in_array($dk->fitur_id, $fitur)) {
                    $total_bobot_terpilih += $dk->bobot;
                }
            }
            $hasil_perhitungan = $total_bobot_terpilih / $total_bobot * 100;
            array_push($list_hasil_perhitungan, $hasil_perhitungan);
            
            $total_bobot = 0;
            $total_bobot_terpilih = 0;
        }

        return json_encode($list_hasil_perhitungan);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
