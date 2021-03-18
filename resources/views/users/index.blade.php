@extends('layouts.admin')

@section('title')
    Kelola User
@endsection

@section('head')
<link rel="stylesheet" href="{{asset("plugins/datatables-bs4/css/dataTables.bootstrap4.min.css")}}">
<link rel="stylesheet" href="{{asset("plugins/datatables-responsive/css/responsive.bootstrap4.min.css")}}">
@endsection

@section('users.index')
    active
@endsection

@section('content')

@if (session('status'))
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						{{ session('status') }}.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
                    @endif

<a href="{{route("users.create")}}" class="btn btn-primary">Tambah User</a>
<table id="example1" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>Nama</th>
      <th>User</th>
      <th>Phone</th>
      <th>Alamat</th>
      <th>Hak Akses</th>
      <th>Aksi</th>
    </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->phone}}</td>
                <td>{{$user->address}}</td>
                <td>
                    @if ($user->role == "admin")
                        <span class="badge badge-success">Admin</span>
                        @else
                        <span class="badge badge-warning">User</span>
                    @endif
                </td>
                <td>
                    <a href="{{route("users.edit", [$user->id])}}" class="btn btn-warning btn-sm">Edit</a>
                    {{-- <a href="" class="btn btn-danger btn-sm">Delete</a> --}}
                    <form action="{{route("users.destroy", [$user->id])}}" method="post" class="d-inline" onsubmit="return confirm('Anda yakin ingin menghapus data?')">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endsection

@section('script')
<script src="{{asset("plugins/datatables/jquery.dataTables.min.js")}}"></script>
<script src="{{asset("plugins/datatables-bs4/js/dataTables.bootstrap4.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/dataTables.responsive.min.js")}}"></script>
<script src="{{asset("plugins/datatables-responsive/js/responsive.bootstrap4.min.js")}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
        "paging": false,
      });
    });
</script>
@endsection