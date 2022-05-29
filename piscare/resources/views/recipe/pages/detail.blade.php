@extends('layouts.app')
@section('header')
    @include('components.header.navbar')
@endsection
@section('aside')
    @include('recipe.components.aside')
@endsection
@section('main')
<div class="row justify-content-between col-lg-12">
    <button type="button" onClick="history.back()">戻る</button>
    {{-- タイトル --}}
    <h2 class="h2 col-10 mb-0">{{ $recipe->title }}</h2>
    <img src="{{ $recipe->foodImageUrl }}" alt="{{ $recipe->title }}">
    <p>投稿者 ： {{ $recipe->contributor }}</p>
    <p>所要時間 : {{ $recipe->indication }}</p>
    <p>費用 ： {{ $recipe->cost }}</p>
    <p>材料・調味料</p>
    <ul>
        @foreach ($materials as $material)
            <li>{{ $material->name }}</li>
        @endforeach
    </ul>
</div>


<recipe-like
    :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
    :initial-count-likes='@json($recipe->count_likes)'
    :authorized='@json(Auth::check())'
    endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
>
</recipe-like>

<a href="{{ $recipe->url }}" class="btn btn-danger">作り方はこちらから</a>
@endsection
