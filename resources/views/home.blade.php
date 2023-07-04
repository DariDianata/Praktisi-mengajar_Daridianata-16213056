@extends('layouts.main')

@section('content')
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
                            <img src="{{ asset('images/slide5.jpg') }}" class="d-block w-100" alt="Slide 5">
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/css/bootstrap.min.css" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous">

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js" integrity="sha384-XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX" crossorigin="anonymous"></script>

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
    </style>

    <script>
        $(document).ready(function() {
            // Menginisialisasi slideshow
            $('.carousel').carousel({
                interval: 3000 // Waktu perpindahan slide (dalam milidetik)
            });
        });
    </script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">TITLE</th>
                            <th scope="col">THUMBNAIL</th>
                            <th scope="col">BODY</th>
                            <th scope="col">COMMENTS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $posts = \App\Models\Post::all();
                        @endphp
                        @foreach ($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td><img src="{{ asset('storage/' . $post->thumbnail) }}" width="100px" height="100px" class="img-thumbnail" alt="{{ $post->title }}"></td>
                                <td>{{ Str::limit($post->body, 50) }}</td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
