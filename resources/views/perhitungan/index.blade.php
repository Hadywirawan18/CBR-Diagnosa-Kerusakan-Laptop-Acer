<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="{{route('perhitungan.store')}}">
        @csrf
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Fitur</th>
                    <th>Nama Fitur</th>
                </tr>
                </th>
            </thead>
            <tbody>
                @foreach ($fitur as $f)
                <tr>
                    <td>
                        <input type="checkbox" name="fitur[]" value="{{$f->id}}">
                    </td>
                    <td>{{$f->kode_fitur}}</td>
                    <td>{{$f->nama_fitur}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <input type="submit" value="Proses">
    </form>

</body>

</html>