@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection
@section('main')
    <div class="row justify-content-between col-lg-12">
        {{-- タイトル --}}
        <h1 class="h2 col-10 mb-0">投稿レシピ</h1>
        <button type="button" class="btn col-2 button-basic">新しいレシピを投稿する</button>
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
    <div class="row justify-content-around mb-4">
        @foreach ($recipes as $recipe)
        <div class="card mb-4" style="width: 18rem;">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->user->name }}</h5>
                <p class="card-text">{{ $recipe->people }}</p>
                <p></p>
                <a href="" class="btn btn-primary">詳細</a>
            </div>
        </div>
        @endforeach
    </div>
    {{-- ページネーション --}}
    <nav class="pagination justify-content-center">
        {{ $recipes->links() }}
    </nav>
@endsection
