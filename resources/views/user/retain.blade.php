@extends('layouts.user')

@section('title')
Revisi Kasus
@endsection

@section('title-card')
Revisi
@endsection

@section('menu-diagnosa')
active
@endsection

@section('new-case')
active
@endsection

@section('menu-diagnosa-open')
menu-open
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

        <form action="{{ route('user.retain.store') }}" method="POST">
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
                        <td>{{$fitur[0]->nama_fitur}}</td>
                        <td>
                            <input type="text" readonly class="form-control" value="{{$fitur[1]}}">
                            <input type="hidden" readonly name="bobots[]" class="form-control" value="{{$fitur[2]}}">
                        </td>
                        <input type="hidden" name="fiturs[]" value="{{$fitur[0]->id}}">
                    </tr>
                    @endforeach
                    <input type="hidden" name="kasus_id" value="{{$kasus_id}}">
                </thead>
            </table>
            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
        </form>
    </div>
</div>
@endsection