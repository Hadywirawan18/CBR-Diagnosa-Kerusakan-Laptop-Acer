@extends('layouts.admin')

@section('title')
Kasus
@endsection

@section('title-card')
Daftar Kasus
@endsection

@section('menu-kasus')
active
@endsection

@section('menu-kasus-daftar')
active
@endsection

@section('content')
@if (session('status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{session('status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if (session('warning'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{session('warning')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="row">
    <div class="col-12 table-responsive">
        <form action="{{ route('kasus.update', ['kasus' => $kasus->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <table class="table" style="width:100%">
                <tbody>
                    @if ($kasus->revise_status)
                    <tr>
                        <td><strong>Revise Status</strong></td>
                        <td>
                            <strong>{{ $kasus->revise_status }}</strong>
                            <button type="button" class="btn btn-warning btn-md ml-2 shadow" id="btn-revise" data-remote="{{route('kasus.update', ['kasus' => $kasus->id])}}">Revise</button>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td><strong>Nomor Kasus</strong></td>
                        <td>
                            <input type="text" class="form-control" value="{{$kasus->kasus_id}}" disabled>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Tipe Laptop</strong></td>
                        <td>
                            <div class="form-group">
                                <input name="tipe_laptop" type="text"
                                    class=" form-control {{$errors->first('tipe_laptop') ? 'is-invalid':''}}"
                                    value="{{$kasus->tipe_laptop}}" maxlength="10" required>
                                @error('tipe_laptop')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Nama Kasus</strong></td>
                        <td>
                            <div class="form-group">
                                <input name="nama_kasus" type="text"
                                    class=" form-control {{$errors->first('nama_kasus') ? 'is-invalid':''}}"
                                    value="{{$kasus->nama_kasus}}" maxlength="190" required>
                                @error('nama_kasus')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>Solusi</strong></td>
                        <td>
                            <div class="form-group">
                                <textarea name="solusi" id="" cols="30" rows="10"
                                    class=" form-control {{$errors->first('solusi') ? 'is-invalid':''}}"
                                    require>{{$kasus->solusi}}</textarea>
                                @error('solusi')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <button type="submit" class="btn btn-primary btn-md float-right">Simpan</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-12 table-responsive">
        <table class="table table-striped table-bordered table-hover" style="width:100%" id="table_id">
            <thead>
                <tr>
                    <th style="width: 70%">Fitur</th>
                    <th style="width: 10%">Bobot</th>
                    <th style="width: 20%">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail_kasus as $dk)
                <tr>
                    <td>{{$dk->Fitur()->nama_fitur}}</td>
                    <td>{{$dk->Bobot()}}</td>
                    <td>
                        <button type="button" class="btn btn-warning btn-sm mr-2 btn-edit"
                            data-remote="{{route('kasus.detail.update', ['kasus_detail'=>$dk->id])}}">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm btn-delete"
                            data-remote="{{route('kasus.detail.destroy', ['kasus_detail' => $dk->id])}}">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<a href="{{route('kasus.detail.create', ['kasus_detail'=>$kasus->id])}}" id="add_fitur" hidden></a>
@endsection

@section('modal')
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Kasus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <form action="" id="form-delete" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" id="form-btn_delete">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-revise" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Revise Kasus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form action="" id="form-revise" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="revise_status" class="form-control">
                        <option value="" {{ $kasus->revise_status == 'revised' ? 'selected':'' }}>Revised</option>
                        <option value="unrevised" {{ $kasus->revise_status == 'unrevised' ? 'selected':'' }}>Unrevised</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning" id="form-btn_revise">Revise</button>
            </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bobot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-body">
                <form action="" id="form-edit" class="form-inline" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="bobot" class="form-control" require style="width: 100%">
                        <option value="">Pilih</option>
                        <option value="5">Sangat Tinggi</option>
                        <option value="4">Tinggi</option>
                        <option value="3">Sedang</option>
                        <option value="2">Rendah</option>
                        <option value="1">Sangat Rendah</option>
                    </select>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-warning" id="form-btn_edit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready( function () {
        var table = $('#table_id').DataTable({
            dom: 'Brtip',
            buttons: [
                {
                    text: 'Tambah Fitur',
                    action: function ( e, dt, node, config ) {
                        document.getElementById("add_fitur").click();
                    }
                }
            ]
        });

        $('#table_id tbody').on('click', '.btn-delete', function () {
            var url = $(this).data('remote');
            $('#modal-delete').modal('show');
            $('#form-delete').attr('action', url);

            var tr = $(this).closest('tr');
            var row = table.row(tr).data();
            document.getElementById('modal-body').innerHTML = 'Apakah anda yakin menghapus kasus <strong>' + row[0]+ '</strong> ?';
        });

        $('#table_id tbody').on('click', '.btn-edit', function () {
            var url = $(this).data('remote');
            $('#modal-edit').modal('show');
            $('#form-edit').attr('action', url);
        });

        $('#btn-revise').on('click', function () {
            var url = $(this).data('remote');
            $('#modal-revise').modal('show');
            $('#form-revise').attr('action', url);
        });
    });
</script>
@endsection