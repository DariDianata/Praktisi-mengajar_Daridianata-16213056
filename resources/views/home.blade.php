@extends('layouts.main')

@section('content')
@php
$posts = \App\Models\Post::all();
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('images/slide11.jpg') }}" class="d-block w-100" alt="Slide 1">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slide2.jpg') }}" class="d-block w-100" alt="Slide 2">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slide3.jpg') }}" class="d-block w-100" alt="Slide 3">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slide4.jpg') }}" class="d-block w-100" alt="Slide 4">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('images/slide6.jpg') }}" class="d-block w-100" alt="Slide 5">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/css/bootstrap.min.css" integrity="sha384-pzjg6J+BztcwKJrj6LSOf9U8e/j6IT+6NnQdCgkICHEjXW7Qf1yq2Lrl/5DgX0od" crossorigin="anonymous">

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js" integrity="sha384-BNOsqj0kccZLrIjg7/w70ZhGFrNfXXj4gfA9xmKAJXQTXrO7c2s4Rxk/xgvgDhAH" crossorigin="anonymous"></script>

<style>
    .carousel-inner img {
        width: 100%;
        height: auto;
        margin-top: 20px;
        border-radius: 10px;
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        background-color: #000; /* Warna latar belakang ikon */
        color: #fff; /* Warna ikon */
        border-radius: 50%; /* Bentuk ikon menjadi bulat */
        width: 20px; /* Lebar ikon */
        height: 20px; /* Tinggi ikon */
        padding: 5px; /* Padding ikon */
   }

.custom-card {
    background-color: #7db9db65;
}
</style>

<div class="container mt-5">
    <div class="row justify-content-center">
        @foreach ($posts as $post)
        <div class="col-lg-4 mb-4">
            <div class="card custom-card" style="width: 18rem;">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" class="card-img-top mx-auto" alt="{{ $post->title }}">
                <div class="card-body text-center">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <div class="text-center">
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
