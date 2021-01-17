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
<table class="table table-hover" id="table_id">
    <thead>
        <tr>
            <th>Nomor Kasus</th>
            <th>Kerusakan</th>
            <th>Nilai Similiaritas</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($nilaiSimiliaritas as $ns)
            <tr>
                <td>{{$ns[0]->id}}</td>
                <td>{{$ns[0]->nama_kasus}}</td>
                <td>{{$ns[1]['similiaritas']}} %</td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col">
        <button id="btn-solution" type="button" class="btn btn-primary btn-md btn-solution float-right">Lihat Solusi</button>
    </div>
</div>
@endsection

@section('modal')
<div class="modal fade" id="modal-solution" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Solusi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
  $(document).ready( function () {
      var table = $('#table_id').DataTable({
        dom: 'rti',
        order: [[ 2, 'desc' ]],
      });

      $('#btn-solution').click(function () {
        $('#modal-solution').modal('show');
      })
  });
</script>
@endsection