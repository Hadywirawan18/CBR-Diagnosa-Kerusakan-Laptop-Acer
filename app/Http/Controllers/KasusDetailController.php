<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fitur;
use App\Kasus;
use App\DetailKasus;

class KasusDetailController extends Controller
{
    // constructor ini fungsi untuk menerapkan authentikasi sebelum dapat mengakses fungsi2 dibawah
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // fungsi ini untuk mengembalikan halaman creata1 detail kasus (halaman input fitur untuk kasus)
    public function create($id)
    {
        $kasus = Kasus::findOrFail($id);

        // mengembalikan halaman dengan membawa data id kasus dan type bernilai 'add'
        // nilai add menandakan halaman tersebut diakses oleh controller KasusDetailController
        return view('kasus.detail.create1', [
            'kasus_id'=>$id,
            'type'=>'add'
        ]);
    }
    
    // fungsi ini untuk menangkap request dari halaman create1 detail kasus
    public function store1(Request $request)
    {
        $request->validate(
            [
                'kasus_id' => "required",
                'checks' => "required",
            ],
            [
                'kasus.required' => 'ID kasus harus ada',
                'checks.required' => 'Fitur harus dipilih minimal 1',
            ]
        );
        // mengambil type yg dibawa oleh halaman create1
        $type = $request->get('type');

        $kasus_id = $request->get('kasus_id');
        $kasus = Kasus::findOrFail($kasus_id);

        // menangkap semua input checkbox yang dicentang oleh user (checkbox fitur)
        $checks = $request->input('checks');

        // memvalidasi semua checkbox yg dipilih user tersedia juga di database
        // dan disimpan di array smentara
        $fiturs = [];
        foreach ($checks as $check => $value) {
            $fitur = Fitur::findOrFail($value);
            array_push($fiturs, $fitur);
        }

        // mengembalikan halaman create2 detail kasus (halaman untuk mengisi bobot tiap fitur)
        return view('kasus.detail.create2', [
            'fiturs' => $fiturs,
            'kasus_id' => $kasus_id,
            'type'=>$type               // mengirim type ke halaman create2
        ]);
    }

    public function store2(Request $request)
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
        // mengambil type dari halaman create2
        $type = $request->get('type');

        $kasus_id = $request->get('kasus_id');
        $kasus = Kasus::findOrFail($kasus_id);

        // mengambil semua fitur yg sudah dipilih user
        $fiturs = $request->input('fiturs');

        // mengambil bobot yg di inputkan untuk setiap fitur
        $bobots = $request->input('bobots');

        // loop untuk memasukkan fitur dan bobot ke database DetailKasus satu per satu
        for ($i=0; $i < count($fiturs); $i++) {
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
        if ($type == 'add') {
            return redirect()->route('kasus.show', ['kasus'=>$kasus_id])->with('status', "Fitur berhasil ditambah");
        } else {
            return redirect()->route('kasus.create')->with('status', "Kasus \"$kasus->nama_kasus\" berhasil ditambah");
        }
    }

    // fungsi ini digunakan untuk mengupdate bobot pada detail kasus
    public function update(Request $request, $id)
    {
        $dk = DetailKasus::findOrFail($id);
        $dk->bobot = $request->get('bobot');
        $dk->save();
        return redirect()->route('kasus.show', ['kasus'=>$dk->kasus_id])->with('status', "Bobot berhasil diedit");
    }

    // fungsi ini untuk menghapus detail kasus
    public function destroy($id)
    {
        $dk = DetailKasus::findOrFail($id);
        $fitur = $dk->Fitur()->nama_fitur;
        $kasus_id = $dk->kasus_id;
        $dk->delete();

        return redirect()->route('kasus.show', ['kasus'=>$kasus_id])->with('status', "Fitur $fitur berhasil dihapus");
    }
}
