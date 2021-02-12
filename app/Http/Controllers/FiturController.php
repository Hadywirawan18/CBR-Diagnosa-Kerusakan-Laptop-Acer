<?php

namespace App\Http\Controllers;

use App\Fitur;
use Illuminate\Http\Request;

class FiturController extends Controller
{
    // constructor ini fungsi untuk menerapkan authentikasi sebelum dapat mengakses fungsi2 dibawah
    public function __construct()
    {
        // $this->middleware('auth');
    }
    
    // fungsi ini mengembalikan halaman daftar fitur
    public function index()
    {
        return view('fitur.index');
    }

    // fungsi ini mengembalikan halaman untuk membuat fitur 
    public function create()
    {
        $lastFitur = Fitur::orderBy('created_at','DESC')->first();
        if (isset($lastFitur)) {
            $newKodeFitur = str_pad((string) $lastFitur-> id +1, 4, "0", STR_PAD_LEFT);
            $newKodeFitur = "F$newKodeFitur";
        }else {
            $newKodeFitur = "F0001";
        }
        return view('fitur.create', ['newKodeFitur'=>$newKodeFitur]);

    }

    // fungsi ini untuk menangkap request yang dikirim dari halaman create fitur dan disimpan pada database
    public function store(Request $request)
    {
        // request->validate berfungsi untuk memvalidasi request yg dikirim oleh user sudah sesuai dengan yang
        // diinginkan oleh server
        $request->validate(
            [
                // list request
                'nama_fitur' => "required",
                'kode_fitur' => "required",
            ],
            [
                // list error yg akan ditampilkan jika request tidak terpenuhi
                'nama_fitur.required' => 'Fitur harus diisi',
                'kode_fitur.required' => 'Kode Fitur harus diisi',
            ]
        );

        // coding dibawah berguna untuk membuat semua request yg sudah ditangkap di simpan di database menggunakan
        // fungsi create pada model fitur
        
        $fitur = Fitur::create($request->all());

        // coding dibawah berguna untuk memberikan nilai kembalian yaitu fitur berhasil di tambah dan diarahakan
        // (redirect) ke route dengan nama 'fitur.create' (silahkan dicek pada route web)
        return redirect()->route('fitur.create')->with('status', "Fitur berhasil ditambahkan");
    }

    // fungsi ini mengembalikan halaman edit fitur dengan membawa id fitur yg akan di edit sebagai parameter
    public function edit($id)
    {
        // mengecek apakah id yg dibawa tersebut ada pada table fitur dg fungsi findOrFail, dan jika tidak
        // ditemukan maka akan di return 404
        $fitur = Fitur::findOrFail($id);

        // mereturn halaman edit fitur dg membawa data fitur yg sudah di ambil sebelumnya
        return view('fitur.edit', [
            'fitur' => $fitur
        ]);
    }

    // fungsi ini untuk menangkap request yang dikirim dari halaman edit fitur dan diupdate pada database
    // dg membawa id fitur dan request (data fitur yg diinputkan baru oleh user)
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_fitur' => "required",
                'kode_fitur' => "required"
            ],
            [
                'nama_fitur.required' => 'Fitur harus diisi',
                'kode_fitur.required' => 'Kode Fitur harus diisi',
            ]
        );

        $fitur = Fitur::findOrFail($id);

        // fungsi update sama dengan fungsi create hanya saja bedanya untuk mengupdate
        $fitur->update($request->all());
        return redirect()->route('fitur.edit', ['fitur' => $id])->with('status', "Fitur berhasil diedit");
    }

    // fungsi ini digunakan untuk menghapus data pada database berdasarkan id pada parameter
    public function destroy($id)
    {
        $fitur = Fitur::findOrFail($id);
        $fitur->delete();
        return redirect()->route('fitur.index')->with('status', "Fitur berhasil dihapus");
    }
}
