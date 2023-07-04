@extends('layouts.main')

@section('content')
    <div class="d-flex justify-content-center">
        <div class="card mt-5" style="width: 400px;">
            <div class="card-body" style="background-color: #E6EFF4;">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px;">
                </div>
                <h5 class="card-title">Register</h5>
                <h6 class="card-subtitle mb-2 text-muted">Silakan masukkan nama, email, dan password Anda untuk mendaftar</h6>
                <div class="row">
                    <form method="POST" action="/register">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Sandi">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" style="background-color: transparent; color: #000;">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
