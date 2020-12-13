<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kasus;
use App\Fitur;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Ini DataTable Controller fungsinya adalah untuk menyediakan data kayak endpoint Web Service
| datanya berupa json yang nantinya dibaca oleh datatable dan ditampilkan dalam bentuk tabel
| getKasus() : untuk mengambil data basis kasus
| getFitur() : untuk mengambil data basis fitur/gejala
| getFiturCheckbox() : untuk mengambil data basis fitur yang akan digunakan saat input bobot di kasus, 
|   bedanya dengan getFitur() fungsi ini menyediakan option checkbox
|
*/
class DataTableController extends Controller
{
    // constructor ini fungsi untuk menerapkan authentikasi sebelum dapat mengakses fungsi getFitur(),
    // getKasus(), dan getFiturCheckbox() melalui endpoint.
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function getKasus()
    {
        return datatables()->of(Kasus::all())
            ->addColumn('aksi', function ($kasus) {
                return '<a href="' . route('kasus.show', ['kasus'=> $kasus->id]) . '" class="btn btn-success btn-sm mr-2">View</a>' 
                    . '<a href="' . route('kasus.edit', ['kasus' => $kasus->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
                    . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('kasus.destroy', ['kasus' => $kasus->id]) . '">Delete</button>';
            })
            ->rawColumns(['aksi'])
            ->toJson();
    }

    public function getFitur()
    {
        return datatables()->of(Fitur::all())
            ->addColumn('aksi', function ($fitur) {
                return '<a href="' . route('fitur.edit', ['fitur' => $fitur->id]) . '" class="btn btn-warning btn-sm mr-2">Edit</a>'
                    . '<button type="button" class="btn btn-danger btn-sm btn-delete" data-remote="' . route('fitur.destroy', ['fitur' => $fitur->id]) . '">Delete</button>';
            })
            ->rawColumns(['aksi', 'check'])
            ->toJson();
    }

    public function getFiturCheckbox()
    {
        return datatables()->of(Fitur::all())
            ->addColumn('checkbox', function ($fitur) {
                return '<input type="checkbox" class="form-control" name="checks[]" value="'.$fitur->id.'">';
            })
            ->rawColumns(['checkbox'])
            ->toJson();
    }


}
