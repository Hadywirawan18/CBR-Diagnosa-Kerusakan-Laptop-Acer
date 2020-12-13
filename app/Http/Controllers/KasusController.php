<?php

namespace App\Http\Controllers;

use App\Kasus;
use App\Fitur;
use App\DetailKasus;
use Illuminate\Http\Request;

class KasusController extends Controller
{
    // constructor ini fungsi untuk menerapkan authentikasi sebelum dapat mengakses fungsi2 dibawah
    public function __construct()
    {
        // $this->middleware('auth');
    }

    // fungsi ini mengembalikan halaman daftar kasus
    public function index()
    {
        return view('kasus.index');
    }

    // fungsi ini mengembalikan halaman untuk membuat kasus 
    public function create()
    {
        return view('kasus.create');
    }

    // fungsi ini untuk menangkap request yang dikirim dari halaman create kasus dan disimpan pada database
    public function store(Request $request)
    {
        // validasi request
        $request->validate(
            [
                'nama_kasus' => "required|max:191",
                'solusi' => "required",
            ],
            [
                'nama_kasus.required' => 'Nama kasus harus diisi',
                'nama_kasus.max' => 'Nama kasus tidak boleh melebihi 191 karakter',
                'solusi.required' => 'Solusi harus diisi',
            ]
        );

        // memasukkan semua request ke database
        $kasus = Kasus::create($request->all());
        $nama_kasus = $request->get('nama_kasus');

        // mengembalikan halaman create1 detail kasus, halaman ini berfungsi untuk memilih fitur apa saja yg
        // dimiliki oleh sebuah kasus, dengan membawa data id kasus dan type.
        // type disitu berfungsi untuk membedakan siapa yg mengakses halaman create1 detail kasus. Karena sistem
        // halaman tersebut dapat diakses dari controller KasusController dan KasusDetailController.
        // jika type = null maka artinya dia diakses oleh route KasusController.
        return view('kasus.detail.create1', [
            'kasus_id'=>$kasus->id,
            'type'=>null
        ]);
    }

    // fungsi ini untuk mengembalikan view detail kasus dengan id kasus sebagai parameter
    public function show($id)
    {
        $kasus = Kasus::findOrFail($id);

        // mengambil data detail kasus dengan id kasus yg sama dengan parameter id yg dibawa fungsi show() ini
        $detail_kasus = DetailKasus::where('kasus_id', $id)->get();

        return view('kasus.view', [
            'kasus'=>$kasus,
            'detail_kasus'=>$detail_kasus
        ]);
    }

    // fungsi ini mengembalikan halaman edit kasus dengan membawa id kasus yg akan di edit sebagai parameter
    public function edit($id)
    {
        $kasus = Kasus::findOrFail($id);
        return view('kasus.edit', [
            'kasus' => $kasus
        ]);
    }

    // fungsi ini untuk menangkap request yang dikirim dari halaman edit kasus dan diupdate pada database
    // dg membawa id kasus dan request (data kasus yg diinputkan baru oleh user)
    public function update(Request $request, $id)
    {
        $request->validate(
            [
                'nama_kasus' => "required|max:191",
                'solusi' => "required",
            ],
            [
                'nama_kasus.required' => 'Nama kasus harus diisi',
                'nama_kasus.max' => 'Nama kasus tidak boleh melebihi 191 karakter',
                'solusi.required' => 'Solusi harus diisi',
            ]
        );

        $kasus = Kasus::findOrFail($id);
        $kasus->update($request->all());
        return redirect()->route('kasus.edit', ['kasus' => $id])->with('status', "Kasus \"$kasus->nama_kasus\" berhasil diedit");
    }

    // fungsi ini digunakan untuk menghapus data pada database berdasarkan id pada parameter
    public function destroy($id)
    {
        $kasus = Kasus::findOrFail($id);
        $nama_kasus = $kasus->nama_kasus;
        $kasus->delete();
        return redirect()->route('kasus.index')->with('status', "Kasus $nama_kasus berhasil dihapus");
    }
}
