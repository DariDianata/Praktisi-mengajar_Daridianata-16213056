@extends('layouts.main')
@section('body')
    <div class="mt-5">
        <div class="d-flex justify-content-center">
            <div class="card mt-5">
                <div class="card-body" style="background-color: #E6EFF4;">
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px;">
                    </div>
                    <h5 class="card-title">Buat Resep</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">Masukkan Resep Baru Anda</h6>
                    <div class="row">
                        <form method="POST" action="{{route ('posts.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul">
                            </div>
                            <div class="mb-3">
                                <label for="thumbnail" class="form-label">Foto</label>
                                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                            </div>
                            <div class="mb-3">
                                <label for="body" class="form-label">Isi Resep</label>
                                <textarea class="form-control" id="body" name="body" placeholder="Bahan dan Langkah"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary" style="background-color: transparent; color: #000;">Kirim</button>    
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
