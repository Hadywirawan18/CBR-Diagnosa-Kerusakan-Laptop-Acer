@extends('layouts.user')

@section('content')
<table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Tipe Laptop</th>
        <th scope="col">Nama Kasus</th>
        <th scope="col">Solusi</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($cases as $case)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $case->tipe_laptop }}</td>
          <td>{{ $case->nama_kasus }}</td>
          <td>{{ $case->solusi }}</td>
          <td>
              <a href="" class="btn btn-info btn-sm text-white shadow">Detail</a>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
@endsection