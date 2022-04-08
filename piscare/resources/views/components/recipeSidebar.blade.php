<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-md-3">

            <form method="GET" action="{{ route('recipes.search') }}" class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Button</button>
            </form>

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                カテゴリ1
            </button>
        </p>
        <div class="collapse" id="collapseExample">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">カテゴリ1-1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">カテゴリ1-2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">カテゴリ1-3</a>
                </li>
            </ul>
        </div>

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                カテゴリ2
            </button>
        </p>
        <div class="collapse" id="collapseExample1">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="">カテゴリ2-1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">カテゴリ2-2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="">カテゴリ2-3</a>
                </li>
            </ul>
        </div>
        <ul>
            @foreach ($subcategories as $subcategory)
                <li><a href="{{ route('recipes.category', $subcategory->searchCategoryId) }}">{{ $subcategory->categoryName }}</a></li>
                <li>
                    <ul>
                        @foreach ($subsubcategories as $subsubcategory)
                            @if ($subcategory->categoryId === $subsubcategory->parentCategoryId)
                                <li><a href="{{ route('recipes.category', $subsubcategory->searchCategoryId) }}">{{ $subsubcategory->categoryName }}</a></li>
                            @endif
                        @endforeach
                    </ul>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
