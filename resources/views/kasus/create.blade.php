@extends('layouts.admin')

@section('title')
Kasus
@endsection

@section('title-card')
Tambah Kasus
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

        <form action="{{ route('kasus.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Nomor Kasus</label>
                <input name="kasus_id" type="text"
                    class=" form-control {{$errors->first('kasus_id') ? 'is-invalid':''}}" value="{{$newKodeKasus}}"
                    maxlength="190" readonly>
                @error('kasus_id')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group">
                    <label for="">Tipe Laptop</label>
                    <input name="tipe_laptop" type="text"
                        class=" form-control {{$errors->first('tipe_laptop') ? 'is-invalid':''}}"
                        value="{{old('tipe_laptop')}}" maxlength="190" required>
                    @error('tipe_laptop')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                    <label for="">Nama Kasus</label>
                    <input name="nama_kasus" type="text"
                        class=" form-control {{$errors->first('nama_kasus') ? 'is-invalid':''}}"
                        value="{{old('nama_kasus')}}" maxlength="190" required>
                    @error('nama_kasus')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="">Solusi</label>
                    <textarea name="solusi" id="" cols="30" rows="10"
                        class=" form-control {{$errors->first('solusi') ? 'is-invalid':''}}"
                        require>{{old('solusi')}}</textarea>
                    @error('solusi')
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