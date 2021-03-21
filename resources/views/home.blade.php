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
    <h3 class="text-center">Di</h3>
    <h3 class="text-center">Sistem Case Based Reasoning Dalam Diagnosa Kerusakan laptop Acer</h3>
</div>
@endsection
