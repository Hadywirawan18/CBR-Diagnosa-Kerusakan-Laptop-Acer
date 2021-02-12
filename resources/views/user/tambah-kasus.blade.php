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
    <div class="row">
        <div class="col-2">
            <input type="text" name="tipe_laptop" class="form-control" placeholder="Masukkan tipe laptop" required>
        </div>
    </div>
    <table class="table table-hover" id="table_id">
        <thead>
            <tr>
                <th style="width: 3%">#</th>
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
        paging: false,
        ajax:"{{ route('getdata.fitur.cb') }}",
        columns:[
            {data:'id'},
            {data:'nama_fitur'},
        ],
        columnDefs: [{
            targets: [0],
            render: function ( data, type, row, meta ) {
                return type === 'display' ? '<input style="width: 25px" class="form-control" type="checkbox" name="checks[]" value="'+data+'"/> ' : null;
            }
        }],
        select: true,
      });

  });
</script>
@endsection