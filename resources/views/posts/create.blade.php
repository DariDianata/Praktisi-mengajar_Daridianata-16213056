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
                    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Masukkan Judul">
                        </div>
                        <div class="mb-3">
                            <label for="thumbnail" class="form-label">Foto</label>
                            <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">Isi Resep</label>
                            <input id="x" type="hidden" name="body" value="">
                            <trix-editor input="x" class="form-control"></trix-editor>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" style="background-color: transparent; color: #000;">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Trix Editor CSS -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">

<!-- Trix Editor JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

<script>
    // Menyimpan nilai dari editor Trix ke input tersembunyi sebelum mengirimkan formulir
    document.addEventListener('trix-change', function(event) {
        document.getElementById('x').value = event.target.innerHTML;
    });

    // Menghapus elemen <div> dan <li> dari hasil input sebelum menyimpan ke database
    document.addEventListener('submit', function(event) {
        var bodyInput = document.getElementById('x');
        bodyInput.value = stripTags(bodyInput.value);
    });

    function stripTags(html) {
        var doc = new DOMParser().parseFromString(html, 'text/html');
        doc.querySelectorAll('div, li').forEach(function(element) {
            element.parentNode.replaceChild(document.createTextNode(element.textContent), element);
        });
        return doc.body.textContent || '';
    }
</script>
@endsection
