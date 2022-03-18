@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">
                <div class="row justify-content-between">
                    {{-- タイトル --}}
                    <h1 class="h2 col-10 mb-0">投稿レシピ</h1>
                    <button type="button" class="btn btn-success col-2">新しいレシピを投稿する</button>
                </div>
                {{-- ソート --}}
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">新着順</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">人気順</a>
                    </li>
                </ul>

                {{-- カード --}}
                <div class="row justify-content-around">
                    @for ($i = 0; $i < 8; $i++)
                    <div class="card " style="width: 18rem;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                    @endfor
                </div>
                {{-- ページネーション --}}
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @for ($i = 1; $i < 5; $i++)
                            <li class="page-item"><a class="page-link" href="#">{{ $i }}</a></li>
                        @endfor
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </main>
        </div>
    </div>
@endsection
