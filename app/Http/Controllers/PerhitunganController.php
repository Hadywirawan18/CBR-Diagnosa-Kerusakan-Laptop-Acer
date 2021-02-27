<?php

namespace App\Http\Controllers;

use App\DetailKasus;
use App\Fitur;
use App\Kasus;
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
        return view("user.tambah-kasus", [
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
        $tipe_laptop = $request->get('tipe_laptop');

        //Perhitungan Nearest Neihgbour
        $fitur = $request->input('checks');
        //menampung tiap kasus dan fitur yang ada
        $kasus_ids = [];
        $kasuses = [];

        foreach ($fitur as $f) {
            $detailKasus = DetailKasus::where('fitur_id', $f)->get();
            foreach ($detailKasus as $d) {
                if (!(in_array($d->kasus_id, $kasus_ids))) {
                    $kasus = Kasus::find($d->kasus_id);
                    if ($kasus->revise_status != 'unrevised') {
                        array_push($kasus_ids, $d->kasus_id);

                        $dk = DetailKasus::where('kasus_id', $d->kasus_id)->get();
                        array_push($kasuses, $dk);
                    }
                }
            }
        }
        //perhitungan masing-masing fitur
        $total_bobot = 0;
        $total_bobot_terpilih = 0;
        $hasilAkhir = [];

        $fiturWthBobot = [];

        foreach ($kasuses as $kasus) {
            $total_fitur = 0;
            $total_fitur_terpilih = 0;
            foreach ($kasus as $dk) {
                $total_bobot += $dk->bobot;
                $total_fitur += 1;

                if (in_array($dk->fitur_id, $fitur)) {
                    array_push($fiturWthBobot, [$dk->fitur_id, $dk->bobot]);
                    $total_bobot_terpilih += $dk->bobot;
                    $total_fitur_terpilih += 1;
                }
            }
            $hasil_perhitungan = $total_bobot_terpilih / $total_bobot;
            $case = Kasus::find($kasus[0]->kasus_id);
            $perhitungan = [
                'case_id' => $case->id,
                'kasus_id' => $case->kasus_id,
                'case_name' => $case->nama_kasus,
                'case_solution' => $case->solusi,
                'fitur_dipilih' => count($fitur),
                'total_fitur' => $total_fitur,
                'total_fitur_terpilih' => $total_fitur_terpilih,
                'total_bobot' => $total_bobot,
                'total_bobot_terpilih' => $total_bobot_terpilih,
                'similiaritas' => round($hasil_perhitungan, 2)
            ];
            // array_push($hasilAkhir, $perhitungan);
            $key = $perhitungan['similiaritas'];
            $hasilAkhir[sprintf('%02.2f', $key)] = $perhitungan;

            $total_bobot = 0;
            $total_bobot_terpilih = 0;
        }

        krsort($hasilAkhir);
        return view('user.hasil-perhitungan', [
            'result' => $hasilAkhir,
            'solution' => reset($hasilAkhir),
            'fiturs' => json_encode($fiturWthBobot),
            'tipe_laptop' => $tipe_laptop,
            'nama_kasus' => reset($hasilAkhir)['case_name']
        ]);
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
