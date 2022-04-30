<nav class="navbar navbar-expand-lg nav-header auth-header">
    <div class="container-fluid nav-height">
        <div>
            <a class="navbar-brand" href="#">Piscare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

            <ul class="nav justify-content-end nav-list">
                <li class="nav-item">
                    @if ($page === 'login')
                        <a class="nav-link active" aria-current="page" href="{{ route('register') }}">Register</a>
                    @endif
                    @if ($page === 'register')
                        <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Login</a>
                    @endif

                </li>
            </ul>
    </div>
</nav>
