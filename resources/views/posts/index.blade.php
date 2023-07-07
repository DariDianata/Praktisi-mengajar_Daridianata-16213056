@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center">
            <div class="row">
                <div class="col-lg-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">NAMA RESEP</th>
                                <th scope="col">FOTO</th>
                                <th scope="col">RESEP</th>
                                <th scope="col">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <img src="{{ asset('storage/' . $post->thumbnail) }}" width="100px" height="100px" class="img-thumbnail" alt="{{ $post->title }}">
                                    </td>
                                    <td>{{ Str::limit($post->body, 50) }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                Edit
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="{{ route('posts.show', $post->id) }}">Lihat</a></li>
                                                <li><a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">Ubah</a></li>
                                                <li>
                                                    <form action="{{ route('posts.destroy', $post->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="dropdown-item" onclick="return confirm('Anda yakin akan menghapus data ini?')">Hapus</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
