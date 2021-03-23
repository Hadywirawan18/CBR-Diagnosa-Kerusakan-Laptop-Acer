@extends('layouts.user')

{{-- @section('title')
Welcome
@endsection --}}


@section('tentang')
    active
@endsection

@section('menu-bantuan-open')
menu-open
@endsection

@section('menu-bantuan')
    active
@endsection

@section('content')
<div class="container">
    <h2 class="text-center">Tentang</h2>
    <hr>
    <p align="justify">
        Sistem ini dibuat untuk membantu mempermudah Teknisi di Acer ASP Mataram untuk menganalisa kerusakan pada laptop Acer sehingga dapat melakukan perbaikan/penggantian onderdil dengan tepat berdasarkan kesesuaian gejala terhadap kasus yang pernah terjadi sebelumnya
        menggunakan metode Case Based Reasoning dan perhitungan K-Nearest Neighbour.
        CBR (Case Based Reasoning) merupakan metode yang memiliki cara kerja yang unik, yaitu cara berfikir logis berbasis kasus, dimana hasil dari kasus yang sudah di analisa didapatkan dari kasus yang sudah pernah terjadi sebelumnya. Dalam artian, metode ini merupakan metode yang dapat mengambil kesimpulan berdasarkan pengalaman sebelumnya (Salamun, 2018). Ada banyak teknik untuk meningkatkan keakuratan keputusan yang dapat digunakan dalam CBR Salah satunya adalah algoritma k-Nearest Neighbour (KNN). Algoritma Nearest Neighbor (k-nearest neighbor atau k-NN) adalah sebuah algoritma untuk melakukan klasifikasi terhadap objek berdasarkan data pembelajaran yang jaraknya paling dekat dengan objek tersebut  (Novita, 2015).
    </p>
    
    <p align="center"> 
        <img src="{{url('/img/knn.jpg')}}" width="400" class="center" alt="Image"/>
        <br>
        <b align="center" style="bold">Siklus Case Based Reasoning (Agnar & Plaza, 1994)</b>
    </p>
    <hr>
</div>
@endsection
