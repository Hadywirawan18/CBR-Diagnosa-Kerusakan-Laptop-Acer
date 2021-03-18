@extends('layouts.user')

{{-- @section('title')
Welcome
@endsection --}}


@section('home')
    active
@endsection


@section('content')
<div class="container">
    <h2 class="text-center">Selamat Datang {{Auth::user()->name}}</h2>
</div>
@endsection
