<?php

namespace App\Http\Controllers;

use App\DetailKasus;
use App\Fitur;
use App\Kasus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RevisiController extends Controller
{
    public function create(Request $request)
    {
        $lastKasus = Kasus::orderBy('created_at', 'DESC')->first();
        if (isset($lastKasus)) {
            $newKodeKasus = str_pad((string) $lastKasus->id + 1, 4, "0", STR_PAD_LEFT);
            $newKodeKasus = "K$newKodeKasus";
        } else {
            $newKodeKasus = "K0001";
        }

        $similiaritas = $request->get('similiaritas');

        $tipe_laptop = $request->get('tipe_laptop');
        $nama_kasus = $request->get('nama_kasus');
        $solusi = $request->get('solusi');

        $kasus = new Kasus;
        $kasus->tipe_laptop = $tipe_laptop;
        $kasus->nama_kasus = $nama_kasus;
        $kasus->solusi = $solusi;
        $kasus->kasus_id = $newKodeKasus;
        $kasus->revise_status = 'unrevised';
        $kasus->revise_msg = "Similiaritas: $similiaritas | Request By: Hadi";
        $kasus->save();

        $bobot = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
        $frs = $request->get('fiturs');
        $fiturs = [];
        foreach (json_decode($frs) as $fr) {
            $fitur = Fitur::find($fr[0]);
            array_push($fiturs, [$fitur, $bobot[$fr[1] - 1], $fr[1]]);
        }
        return view('user.revisi', ['fiturs' => $fiturs, 'kasus_id' => $kasus->id]);
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'kasus_id' => "required",
                'fiturs' => "required",
                'bobots' => "required",
            ],
            [
                'kasus.required' => 'ID kasus harus ada',
                'fiturs.required' => 'Fiturs harus ada minimal 1',
                'bobots.required' => 'Bobots harus ada minimal 1',
            ]
        );

        $kasus_id = $request->get('kasus_id');
        $kasus = Kasus::findOrFail($kasus_id);

        // mengambil semua fitur yg sudah dipilih user
        $fiturs = $request->input('fiturs');

        // mengambil bobot yg di inputkan untuk setiap fitur
        $bobots = $request->input('bobots');

        // loop untuk memasukkan fitur dan bobot ke database DetailKasus satu per satu
        for ($i = 0; $i < count($fiturs); $i++) {
            $fitur = Fitur::findOrFail($fiturs[$i]);

            $dk = new DetailKasus;
            $dk->kasus_id = $kasus_id;
            $dk->fitur_id = $fiturs[$i];
            $dk->bobot = $bobots[$i];
            $dk->save();
        }

        // disini type yg dibawa diawal akan dicek
        // jika type bernilai add (diakses oleh controller KasusDetailController) maka akan di return seperti berikut
        // dan sebaliknya akan di return pada else.
        return redirect()->route('tambah-kasus')->with('status', "Kasus \"$kasus->nama_kasus\" berhasil di revise");
    }

    public function retain(Request $request)
    {
        $lastKasus = Kasus::orderBy('created_at', 'DESC')->first();
        if (isset($lastKasus)) {
            $newKodeKasus = str_pad((string) $lastKasus->id + 1, 4, "0", STR_PAD_LEFT);
            $newKodeKasus = "K$newKodeKasus";
        } else {
            $newKodeKasus = "K0001";
        }

        $tipe_laptop = $request->get('tipe_laptop');
        $nama_kasus = $request->get('nama_kasus');
        $solusi = $request->get('solusi');
        $rtby = Auth::user()->name;

        $kasus = new Kasus;
        $kasus->tipe_laptop = $tipe_laptop;
        $kasus->nama_kasus = $nama_kasus;
        $kasus->solusi = $solusi;
        $kasus->kasus_id = $newKodeKasus;
        $kasus->revise_msg = "Retain By: $rtby";
        $kasus->save();

        $bobot = ['Sangat Rendah', 'Rendah', 'Sedang', 'Tinggi', 'Sangat Tinggi'];
        $frs = $request->get('fiturs');
        $fiturs = [];
        foreach (json_decode($frs) as $fr) {
            $fitur = Fitur::find($fr[0]);
            $ks = Kasus::find($fr[2]);
            array_push($fiturs, [$fitur, $bobot[$fr[1] - 1], $fr[1], $ks->tipe_laptop, $ks]);
        }
        return view('user.retain', [
            'fiturs' => $fiturs, 
            'kasus_id' => $kasus->id,
            'kasus' => $kasus,
            'tipe_laptop' => $tipe_laptop,
        ]);
    }

    public function retain_store(Request $request)
    {
        $request->validate(
            [
                'kasus_id' => "required",
                'fiturs' => "required",
                'bobots' => "required",
            ],
            [
                'kasus.required' => 'ID kasus harus ada',
                'fiturs.required' => 'Fiturs harus ada minimal 1',
                'bobots.required' => 'Bobots harus ada minimal 1',
            ]
        );

        $kasus_id = $request->get('kasus_id');
        $kasus = Kasus::findOrFail($kasus_id);

        // mengambil semua fitur yg sudah dipilih user
        $fiturs = $request->input('fiturs');

        // mengambil bobot yg di inputkan untuk setiap fitur
        $bobots = $request->input('bobots');

        $kasus = $request->input('kasus');

        $tipe_laptop = $request->get('tipe_laptop');

        $dataUnique = [];
        $dataSame = [];

        // loop untuk memasukkan fitur dan bobot ke database DetailKasus satu per satu
        for ($i = 0; $i < count($fiturs); $i++) {
            $data = $fiturs[$i];
            if (!in_array($data, $dataUnique)) {
                array_push($dataUnique,$data);
            } else {
                if (!in_array($data, $dataSame)) {
                    array_push($dataSame,$data);
                }
            }
        }
        
        foreach (array_keys($dataSame) as $ds) {
            for ($i=0; $i < count($dataUnique); $i++) { 
                $key = array_keys($dataUnique)[$i];
                if ($ds == $key) {
                    unset($dataUnique[$key]);
                }
            }
        }

        foreach ($dataUnique as $dUnq) {
            for ($i=0; $i < count($fiturs); $i++) {
                $data = json_decode($dUnq); 
                $fitur = json_decode($fiturs[$i]);
                if ($fitur->id == $data->id) {
                    $fitur = Fitur::findOrFail($fitur->id);
                    $dk = new DetailKasus;
                    $dk->kasus_id = $kasus_id;
                    $dk->fitur_id = $fitur->id;
                    $dk->bobot = $bobots[$i];
                    $dk->save();
                }
            }
        }

        $typeInput = $tipe_laptop;
        foreach ($dataSame as $dSm) {
            $data = json_decode($dSm);
            $sameStatus = true;
            $notSame = [];
            for ($i = 0; $i < count($fiturs); $i++) {
                $fitur = json_decode($fiturs[$i]);
                if ($fitur->id == $data->id) {
                    if ($typeInput == json_decode($kasus[$i])->tipe_laptop) {
                        $fitur = Fitur::findOrFail($fitur->id);
                        $dk = new DetailKasus;
                        $dk->kasus_id = $kasus_id;
                        $dk->fitur_id = $fitur->id;
                        $dk->bobot = $bobots[$i];
                        $dk->save();
                        $sameStatus = false;
                        break;
                    } else {
                        array_push($notSame, [$fitur, $bobots[$i]]);
                    }
                }
            }
            if ($sameStatus) {
                foreach ($notSame as $ns) {
                    $fitur = Fitur::findOrFail($ns[0]->id);
                    $dk = new DetailKasus;
                    $dk->kasus_id = $kasus_id;
                    $dk->fitur_id = $ns[0]->id;
                    $dk->bobot = $ns[1];
                    $dk->save();
                }
            }
        }

        return redirect()->route('tambah-kasus')->with('status', "Kasus berhasil di simpan");
    }
}
