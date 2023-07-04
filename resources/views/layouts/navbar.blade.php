<nav class="navbar navbar-expand-lg" style="background-color: #7db9db; border-radius: 10px;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="images/logo.png" alt="Logo" width="60" height="60" class="d-inline-block align-text-top">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Post
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/posts">Lihat Semua</a></li>
                        <li><a class="dropdown-item" href="/posts/create">Buat Artikel</a></li>
                    </ul>
                </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/register">Register</a>
                    </li>
                @endguest
            </ul>
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile/upload">Upload Profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
