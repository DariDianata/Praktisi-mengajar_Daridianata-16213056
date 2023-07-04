@extends('layouts.main')
@section('body')
    <div class="d-flex justify-content-center">
        <div class="card mt-5">
            <div class="card-body">
                <h5 class="card-title">Upload</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Masukan gambar</h6>
                <div class="row">
                    <form method="POST" action="/profile/upload" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="form-label">image</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Upload">

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
