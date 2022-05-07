<nav class="navbar navbar-expand-lg nav-header">
    <div class="container-fluid nav-height">
        <div>
            <a class="navbar-brand" href="{{ route('home.index') }}">Piscare</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

            <ul class="nav justify-content-end nav-list">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('recipes.index') }}">レシピ検索</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('postRecipe.index') }}">投稿レシピ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shops.index') }}">お店検索</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $user->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">マイページ</a></li>
                        <li><a class="dropdown-item" href="{{ route('registerName.create') }}">レシピ投稿</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                            >
                                ログアウト
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
    </div>
</nav>
