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
        <div class="card mb-4" style="width: 18rem;">
            <img src="" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{ $recipe->user->name }}</h5>
                {{-- <p class="card-text">{{ $recipe->people }}</p> --}}
                <p class="card-text">{{ $recipe->title }}</p>
                {{-- {{dd($recipe->id)}} --}}
                <post-like
                    :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
                    :initial-count-likes='@json($recipe->count_likes)'
                    :authorized='@json(Auth::check())'
                    endpoint="{{ route('post.like', ['post' => $recipe->id]) }}"
                >
                </post-like>
                <p></p>
            </div>
        </div>
    </div>

@endsection
