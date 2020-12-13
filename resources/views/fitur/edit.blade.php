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

        <form action="{{ route('fitur.update', ['fitur' => $fitur->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Kode Fitur</label>
                <input name="kode_fitur" type="text" class=" form-control {{$errors->first('kode_fitur') ? 'is-invalid':''}}"
                    require value="{{$fitur->kode_fitur}}">
                @error('kode_fitur')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Fitur</label>
                <textarea name="nama_fitur" id="" cols="30" rows="5" class=" form-control {{$errors->first('nama_fitur') ? 'is-invalid':''}}"
                    require>{{$fitur->nama_fitur}}</textarea>
                @error('nama_fitur')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
            <a href="{{ route('fitur.index') }}" class="btn btn-secondary btn-md float-right mr-2">Kembali</a>
        </form>
    </div>
</div>
@endsection