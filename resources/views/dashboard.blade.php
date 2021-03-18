@extends('layouts.admin')

{{-- @section('title')
Welcome
@endsection --}}


@section('dashboard')
    active
@endsection


@section('content')
<div class="container">
        <div class="col-md-8 mx-auto">
            <div class="card">
                <div class="card-header">Dashboard</div>

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
    <div class="row">
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{$user}}</h3>

              <p>Jumlah User</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>{{$fitur}}</h3>

              <p>Jumlah Fitur</p>
            </div>
            <div class="icon">
              <i class="fas fa-tags"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{$kasus}}</h3>

              <p>Jumlah Kasus</p>
            </div>
            <div class="icon">
              <i class="fas fa-cogs"></i>
            </div>
          </div>
        </div>
        <!-- ./col -->
        {{-- <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>65</h3>

              <p>Unique Visitors</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
          </div>
        </div> --}}
        <!-- ./col -->
      </div>
      <!-- /.row -->
</div>
@endsection
