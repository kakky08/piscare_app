@extends('layouts.app')
@section('header')
    @include('components.header.navbar')
@endsection
@section('aside')
    @include('recipe.components.aside')
@endsection
@section('main')
<div class="row justify-content-between col-lg-12">
    {{-- タイトル --}}
    <h1 class="h2 col-10 mb-0">レシピ</h1>
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
@foreach ($recipes as $key => $recipe)
    @if ($key % 4 === 0)
        <div class="row cols-4 spacing-reset card-content">
    @endif
            <div class="card col card-style">
                <img src={{ $recipe->foodImageUrl }} class="card-img-top card-style-image recipe-card-image" alt="...">
                <div class="card-body">
                    <h5 class="card-title card-style-title recipe-card-title">{{ $recipe->title }}</h5>
                    <p class="card-text card-style-text recipe-card-text">{{ $recipe->description }}</p>
                    <div class="recipe-card-like">
                        <i class="fas fa-heart"></i><p>{{ $recipe->count_likes}}</p>
                    </div>
                    <div class="d-grid">
                        <a href="{{ route('recipe.show', $recipe->id) }}" class="btn stretched-link card-style-button">詳細</a>
                    </div>
                </div>
            </div>
    @if (($key + 1) % 4 === 0)
        </div>
    @endif
@endforeach


</div>
{{-- ページネーション --}}
<nav class="pagination justify-content-center">
    {{ $recipes->appends(request()->query())->links() }}
</nav>

@endsection
