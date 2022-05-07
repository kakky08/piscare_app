<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="position-sticky">

            <form method="GET" action="{{ route('recipes.search') }}" class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                <button class="btn button-basic" type="submit" id="button-addon2">検索</button>
            </form>

        <p>
            <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="true" aria-controls="collapseExample">
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

        <div class="" id="">
            <div class="accordion-item">
                <div class="d-flex">
                    <p class="accordion-header col-10" id="panelsStayOpen-headingOne">
                    Accordion Item #1
                    </p>
                <button class="accordion-button col-1" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">

                </button>
                </div>


                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                </div>
                </div>
            </div>
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
