@extends('layouts.user')

@section('title')
Kasus Baru
@endsection

@section('title-card')
Hasil Diagnosa Kasus Baru
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

<div class="row mb-3">
    <div class="col">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th>Nama Fitur Terpilih</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fitur_user as $fu)
                <tr>
                    <td>{{ $fu->nama_fitur }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col">
        <table class="table table-hover table-bordered" id="table_id">
            <thead>
                <tr>
                    <th style="width: 20%">Nomor Kasus</th>
                    <th style="width: 60%">Kerusakan</th>
                    <th style="width: 20%">Nilai Similiaritas</th>
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
    </div>
</div>
<div class="row">
    <div class="col">
            @if ((float)$solution['similiaritas'] < 0.5) 
                <form action="{{route('user.revisi')}}" class="form-inline float-right" method="POST">
                    @csrf
                    <input type="hidden" name="tipe_laptop" value="{{ $tipe_laptop }}">
                    <input type="hidden" name="nama_kasus" value="{{ $nama_kasus }}">
                    <input type="hidden" name="fiturs" value="{{ $fiturs }}">
                    <input type="hidden" name="solusi" value="{{ $solution['case_solution'] }}">
                    <input type="hidden" name="similiaritas" value="{{ $solution['similiaritas'] }}">
                    <button id="btn-revisi" type="submit" class="btn btn-warning btn-md">Revisi</button>
                </form>
            @else
                <form action="{{route('user.retain')}}" class="form-inline float-right" method="POST">
                    @csrf
                    <input type="hidden" name="tipe_laptop" value="{{ $tipe_laptop }}">
                    <input type="hidden" name="nama_kasus" value="{{ $nama_kasus }}">
                    <input type="hidden" name="fiturs" value="{{ $fiturs }}">
                    <input type="hidden" name="solusi" value="{{ $solution['case_solution'] }}">
                    <button id="btn-revisi" type="submit" class="btn btn-success btn-md">Simpan</button>
                </form>
            @endif
            <button id="btn-solution" type="button" class="btn btn-primary btn-md mr-2 btn-solution float-right"
                {{(float)$solution['similiaritas'] < 0.5 ? 'disabled':''}}>Lihat Solusi</button>
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


<div class="modal fade bd-example-modal-lg" id="modal-calc" style="width: 1000px; margin: auto;" tabindex="-1"
    role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
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