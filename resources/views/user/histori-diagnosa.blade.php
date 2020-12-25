@extends('layouts.user')

@section('menu-diagnosa')
active
@endsection

@section('histori-diagnosa')
active
@endsection

@section('menu-diagnosa-open')
menu-open
@endsection

@section('content')
<table class="table table-hover" id="table_id">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Tipe Laptop</th>
      <th scope="col">Nama Kasus</th>
      <th scope="col">Solusi</th>
      <th>Aksi</th>
    </tr>
  </thead>
</table>
@endsection

@section('script')
<script>
  $(document).ready( function () {
      var table = $('#table_id').DataTable({
          processing:true,
          serverside:true,
          ajax:"{{ route('getdata.historikasus') }}",
          columns:[
              {data:null},
              {data:'tipe_laptop'},
              {data:'nama_kasus'},
              {data:'solusi'},
              {data:'aksi', sortable:false},
          ],
          columnDefs:[ 
            {
            "searchable": false,
            "orderable": false,
            "targets": 0
            }
          ],
          order: [[ 1, 'asc' ]],
      });

      table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        });
      }).draw();
  });
</script>
@endsection