@extends('layouts.user')

{{-- @section('title')
Welcome
@endsection --}}


@section('penggunaan')
    active
@endsection
@section('menu-bantuan')
    active
@endsection

@section('content')
<div class="container">
    <h2 class="text-center">Video Cara Penggunaan</h2>
    <hr>
    <div class="embed-responsive embed-responsive-16by9">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/JZYuMOBc03U?rel=0" allowfullscreen></iframe>
      </div>
</div>
@endsection
