@extends('layouts.user')

@section('title')
Kasus
@endsection

@section('title-card')
Detail Kasus
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
<form action="{{route('tambah-kasus.store')}}" method="POST">
    @csrf
    <table class="table table-hover" id="table_id">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Fitur</th>
                <th>Nama Fitur</th>
            </tr>
            </th>
        </thead>
    </table>
    <input class="btn btn-primary float-right mt-2" type="submit" value="Proses">
</form>
@endsection

@section('script')
<script>
    $(document).ready( function () {
      var table = $('#table_id').DataTable({
          processing:true,
          serverside:true,
          ajax:"{{ route('getdata.fitur.cb') }}",
          columns:[
              {data:'checkbox'},
              {data:'kode_fitur'},
              {data:'nama_fitur'},
            ],
          select: true,
      });

  });
</script>
@endsection