@extends('layouts.main')

@section('body')
    <div class="d-flex justify-content-center">
        <div class="card mt-5">
            <div class="card-body" style="background-color: #E6EFF4;">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100px;">
                </div>
                    <form method="POST" action="/posts/{{ $post->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukan Judul"
                                value="{{ $post->title }}">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Thumbnail</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Text Body</label>
                            <input id="x" type="hidden" name="body" value="{{ $post->body }}">
                            <trix-editor input="x" class="form-control"></trix-editor>
                        </div>
                        <input type="submit" class="btn btn-primary" id="submit" name="submit" value="Simpan">
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    
    <script>
        document.addEventListener("trix-initialize", function () {
            let initialValue = "{{ $post->body }}";
            let editor = document.querySelector("trix-editor");
            editor.editor.loadHTML(initialValue);
        });
    </script>
@endsection
