@extends('layouts.master')

@section('pageTitle', 'About Nahini Coffee')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <div class="col-sm-6">
                <p class="text-justify" style="font-size: 1rem"><span class="font-weight-bold">Nahini Coffee Brewery</span>
                    adalah kedai kopi yang berdiri pada 24
                    Mei 2019. Kami sangat terpaku untuk memberikan pelayanan
                    terbaik bagi pelanggan agar pelanggan tetap nyaman dan
                    puas, khususnya pada bidang servis, makanan, dan minuman.
                    Agar bisa terus memuaskan pelanggan, kami selalu berinovasi
                    dari segala aspek yang mencangkup dunia servis dan FnB.
                    Kami mendukung perkembangan kopi lokal mulai dari petani
                    hingga antusias kopi, sehingga kami bisa terus progresif untuk
                    memajukan dunia perkopian Indonesia walaupun hanya dengan
                    langkah sederhana.
            </div>
            <div class="col-2"></div>
            <div class="col-sm-2 align-self-center">
                <div class="border m-2 border-dark rounded text-sm-center">
                    <h2 class="ff-gothic m-3" style="color:rgb(219, 172, 132) ">serab</h2>
                    <h2 class="ff-gothic m-3" style="color:rgb(25, 52, 70) ">coffee</h2>
                    <h2 class="ff-gothic m-3" style="color:rgb(219, 172, 132) ">brewery</h2>
                </div>
            </div>
        </div>

        <h2 class="text-center">Our Logo</h2>
        <img src="assets/{{ $image }}" style="object-fit: cover; width: 100%; padding-bottom: 2vw"
            alt="SerabSurrounding">
    </div>
@endsection
