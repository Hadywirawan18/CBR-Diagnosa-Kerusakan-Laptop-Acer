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
        @foreach ($result as $res)
        <tr>
            <td>{{$res['kasus_id']}}</td>
            <td>{{$res['case_name']}}</td>
            <td>{{$res['similiaritas']}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="row">
    <div class="col">
       @if ((int)$solution['similiaritas'] < 0.5)    
       <form action="{{route('user.revisi')}}" class="form-inline float-right" method="POST">
           @csrf
           <input type="hidden" name="fiturs" value="{{ $fiturs }}">
           <button id="btn-revisi" type="submit" class="btn btn-warning btn-md">Revisi</button>
       </form>
       @endif
        <button id="btn-solution" type="button" class="btn btn-primary btn-md mr-2 btn-solution float-right" {{(int)$solution['similiaritas'] < 0.5 ? 'disabled':''}}>Lihat
            Solusi</button>
        <button id="btn-calc" type="button" class="btn btn-secondary btn-md mr-2 btn-solution float-right">Lihat
            Perhitungan</button>
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
                <label for="">Nama Kasus</label>
                <input type="text" class="form-control" value="{{$solution['case_name']}}" disabled>
                <label for="" class="mt-2">Solusi</label>
                <textarea name="" id="" cols="30" rows="7" class="form-control"
                    disabled>{{$solution['case_solution']}}</textarea>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>


<div class="modal fade bd-example-modal-lg" id="modal-calc" style="width: 1000px; margin: auto;" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Perhitungan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <table class="table table-hover" id="table_calc_id">
                    <thead>
                        <tr>
                            <th>Nomor Kasus</th>
                            <th>Fitur Terpilih</th>
                            <th>Fitur Cocok</th>
                            <th>Bobot Cocok</th>
                            <th>Total Bobot</th>
                            <th>Fitur Kasus</th>
                            <th>Perhitungan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($result as $res)
                        <tr>
                            <td>{{$res['kasus_id']}}</td>
                            <td>{{$res['fitur_dipilih']}}</td>
                            <td>{{$res['total_fitur_terpilih']}}</td>
                            <td>{{$res['total_bobot_terpilih']}}</td>
                            <td>{{$res['total_bobot']}}</td>
                            <td>{{$res['total_fitur']}}</td>
                            <td>{{$res['total_bobot_terpilih']}} / {{$res['total_bobot']}} = {{$res['similiaritas']}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

      var tableCalc = $('#table_calc_id').DataTable({
        dom: 'rti',
        order: [[ 2, 'desc' ]],
      });

      $('#btn-solution').click(function () {
        $('#modal-solution').modal('show');
      });
      $('#btn-calc').click(function () {
        $('#modal-calc').modal('show');
      });
  });
</script>
@endsection