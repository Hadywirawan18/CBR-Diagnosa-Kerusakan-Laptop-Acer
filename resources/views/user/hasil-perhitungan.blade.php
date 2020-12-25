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

@endsection

@section('script')
<script>
  $(document).ready( function () {
      var table = $('#table_id').DataTable({
        dom: 'rti',
        order: [[ 2, 'desc' ]],
      });
  });
</script>
@endsection