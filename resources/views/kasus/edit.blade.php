@extends('layouts.admin')

@section('title')
Kasus
@endsection

@section('title-card')
Lihat Kasus
@endsection

@section('menu-kasus')
active
@endsection

@section('menu-kasus-daftar')
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

        <div class="form-group">
            <label for="">Tipe Laptop</label>
            <input name="tipe_laptop" type="text"
                class=" form-control {{$errors->first('tipe_laptop') ? 'is-invalid':''}}"
                value="{{$kasus->tipe_laptop}}" maxlength="10" disabled>
        </div>

        <div class="form-group">
            <label for="">Nama Kasus</label>
            <input name="nama_kasus" type="text"
                class=" form-control {{$errors->first('nama_kasus') ? 'is-invalid':''}}" value="{{$kasus->nama_kasus}}"
                maxlength="190" disabled>
        </div>

        <div class="form-group">
            <label for="">Solusi</label>
            <textarea name="solusi" id="" cols="30" rows="10"
                class=" form-control {{$errors->first('solusi') ? 'is-invalid':''}}"
                disabled>{{$kasus->solusi}}</textarea>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered table-hover" style="width:100%" id="table_id">
            <thead>
                <tr>
                    <th style="width: 70%">Fitur</th>
                    <th style="width: 10%">Bobot</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_kasus as $dk)
                <tr>
                    <td>{{$dk->Fitur()->nama_fitur}}</td>
                    <td>{{$dk->Bobot()}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection