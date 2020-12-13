@extends('layouts.admin')

@section('title')
Fitur
@endsection

@section('title-card')
Tambah Fitur
@endsection

@section('menu-fitur')
active
@endsection

@section('menu-fitur-tambah')
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

        <form action="{{ route('fitur.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Kode Fitur</label>
                <input name="kode_fitur" type="text" class=" form-control {{$errors->first('kode_fitur') ? 'is-invalid':''}}"
                    require value="{{old('kode_fitur')}}">
                @error('kode_fitur')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="form-group">
                <label for="">Fitur</label>
                <textarea name="nama_fitur" id="" cols="30" rows="5" class=" form-control {{$errors->first('nama_fitur') ? 'is-invalid':''}}"
                    require>{{old('nama_fitur')}}</textarea>
                @error('nama_fitur')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection