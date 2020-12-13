@extends('layouts.admin')

@section('title')
Kasus
@endsection

@section('title-card')
Masukkan Bobot
@endsection

@section('menu-kasus')
active
@endsection

@section('menu-kasus-tambah')
active
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{ route('kasus.detail.store2') }}" method="POST">
            @csrf
            <table class="table table-striped table-bordered table-hover" style="width:100%" id="table_id">
                <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 80%">Fitur</th>
                        <th>Bobot</th>
                    </tr>
                    @foreach ($fiturs as $fitur)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$fitur->nama_fitur}}</td>
                        <td>
                            <select name="bobots[]" class="form-control" require>
                                <option value="">Pilih</option>
                                <option value="5">Sangat Tinggi</option>
                                <option value="4">Tinggi</option>
                                <option value="3">Sedang</option>
                                <option value="2">Rendah</option>
                                <option value="1">Sangat Rendah</option>
                            </select>
                        </td>

                        <input type="hidden" name="type" value="{{$type}}">
                        <input type="hidden" name="fiturs[]" value="{{$fitur->id}}">
                    </tr>
                    @endforeach
                </thead>
            </table>

            <input type="hidden" name="kasus_id" value="{{$kasus_id}}">
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection