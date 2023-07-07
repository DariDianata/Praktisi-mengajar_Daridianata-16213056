@extends('layouts.main')
@section('body')
    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Thumbnail" style="max-width: 100%;">
                </div>
                <div class="col-md-8">
                    <p class="card-text">{{ $post->body }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-5">
        <div class="card-body">
            <h5 class="card-title">Komentar</h5>
            <form>
                <div class="form-group">
                    <textarea class="form-control" rows="3" placeholder="Tulis komentar"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
@endsection
