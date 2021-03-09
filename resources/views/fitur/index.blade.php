@extends('layouts.admin')

@section('title')
Fitur
@endsection

@section('title-card')
Daftar Fitur
@endsection

@section('menu-fitur')
active
@endsection

@section('menu-fitur-daftar')
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
        <table class="table table-striped table-bordered table-hover" style="width:100%" id="table_id">
            <thead>
                <tr>
                    <th style="width: 10%">Kode Fitur</th>
                    <th style="width: 70%">Nama Fitur</th>
                    <th style="width: 20%">Action</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection

@section('script')
<script>
    $(document).ready( function () {
        var table = $('#table_id').DataTable({
            processing:true,
            serverside:true,
            paging: false,
            ajax:"{{ route('getdata.fitur') }}",
            columns:[
                {data: 'kode_fitur'},
                {data: 'nama_fitur'},
                {data: 'aksi', sortable:false},
            ],  
        });

        $('#table_id tbody').on('click', 'button', function () {
            var url = $(this).data('remote');
            $('#modal-delete').modal('show');
            $('#form-delete').attr('action', url);

            var tr = $(this).closest('tr');
            var row = table.row(tr).data();
            document.getElementById('modal-body').innerHTML = 'Apakah anda yakin menghapus fitur <strong>' + row.nama_fitur + '</strong> ?';
        });
    });
</script>
@endsection