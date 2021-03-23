@extends('layouts.admin')

@section('title')
Kasus
@endsection

@section('title-card')
Pilih Fitur
@endsection

@section('menu-kasus')
active
@endsection

@section('menu-kasus-tambah')
active
@endsection


@section('content')
<div class="row">
    <div class="col-12">
        @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <form action="{{ route('kasus.detail.store1') }}" method="POST" onsubmit="clearSrc()">
            @csrf
            <table class="table table-striped table-bordered table-hover" style="width:100%" id="table_id">
                <thead>
                    <tr>
                        <th style="width: 3%">#</th>
                        <th style="width: 90%">Fitur</th>
                    </tr>
                </thead>
            </table>

            <input type="hidden" name="type" value="{{$type}}">
            <input type="hidden" name="kasus_id" value="{{$kasus_id}}">
            <button type="submit" class="btn btn-primary btn-md float-right mt-2">Next</button>
        </form>
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
            ajax:"{{ route('getdata.fitur.cb') }}",
            columns:[
                {data:'id'},
                {data:'nama_fitur'},
            ],
            columnDefs: [{
                "targets": [0],
                "render": function ( data, type, row, meta ) {
                    return type === 'display' ? '<input style="width: 25px" class="form-control" type="checkbox" name="checks[]" value="'+data+'"/> ' : null;
                }
            }],
            order: [[ 0, "asc" ]],
        });
    });
</script>
<script>
    function clearSrc() {
        var table = $('#table_id').DataTable();
        table.search('').draw();
    }
</script>
@endsection