@extends('layouts.admin')

@section('title')
Kasus
@endsection

@section('title-card')
Edit Kasus
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

        <form action="{{ route('kasus.update', ['kasus' => $kasus->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Nama Kasus</label>
                <input name="nama_kasus" type="text" class=" form-control {{$errors->first('nama_kasus') ? 'is-invalid':''}}"
                    value="{{$kasus->nama_kasus}}" maxlength="190" required>
                @error('nama_kasus')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Solusi</label>
                <textarea name="solusi" id="" cols="30" rows="10" class=" form-control {{$errors->first('solusi') ? 'is-invalid':''}}"
                    require>{{$kasus->solusi}}</textarea>
                @error('solusi')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
            <a href="{{ route('kasus.index') }}" class="btn btn-secondary btn-md float-right mr-2">Kembali</a>
        </form>
    </div>
</div>
@endsection