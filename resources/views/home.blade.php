@extends('layouts.user')

@section('title')
Kasus
@endsection


@section('home')
    active
@endsection


@section('content')
<div class="container">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Home</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Selamat Datang {{Auth::user()->name}}</h2>
                </div>
            </div>
        </div>
</div>
@endsection
