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
        $hasilAll = [];

        $fx = [];

        foreach ($kasuses as $kasus) {
            $total_fitur = 0;
            $total_fitur_terpilih = 0;
            $fiturCase = [];
            foreach ($kasus as $dk) {
                $total_bobot += $dk->bobot;
                $total_fitur += 1;

                if (in_array($dk->fitur_id, $fitur)) {
                    array_push($fiturCase, [$dk->fitur_id, $dk->bobot, $dk->kasus_id]);
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
                'similiaritas' => round($hasil_perhitungan, 2),
                'fitur_case' => $fiturCase,
            ];
            // array_push($hasilAkhir, $perhitungan);

            foreach ($kasus as $dk) {
                if (in_array($dk->fitur_id, $fitur)) {
                    if (isset($fx[$dk->fitur_id])) {
                        if ($fx[$dk->fitur_id][3] < $hasil_perhitungan) {
                            $fx[$dk->fitur_id] = [$dk->fitur_id, $dk->bobot, $dk->kasus_id, $hasil_perhitungan];
                        }
                    } else {
                        $fx[$dk->fitur_id] = [$dk->fitur_id, $dk->bobot, $dk->kasus_id, $hasil_perhitungan];
                    }
                }
            }

            $key = $perhitungan['similiaritas'];
            $hasilAkhir[sprintf('%02.2f', $key)] = $perhitungan;

            array_push($hasilAll, $perhitungan);

            $total_bobot = 0;
            $total_bobot_terpilih = 0;
        }

        $fitur_user = [];
        foreach ($fitur as $fu) {
            $fit = Fitur::findOrFail($fu);
            array_push($fitur_user, $fit);
        }

        krsort($hasilAkhir);
        $bestResult = array_values($hasilAkhir);
        $bestFitur = array_shift($bestResult)['fitur_case'];
        return view('user.hasil-perhitungan', [
            'result' => $hasilAkhir,
            'solution' => reset($hasilAkhir),
            'fiturs' => json_encode($fx),
            'tipe_laptop' => $tipe_laptop,
            'nama_kasus' => reset($hasilAkhir)['case_name'],
            'hasil_all' => $hasilAll,
            'best_fitur' => json_encode($bestFitur),
            'fitur_user' => $fitur_user,
        ]);

        // return \json_encode($fx);
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
