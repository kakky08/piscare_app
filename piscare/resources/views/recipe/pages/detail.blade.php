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
    <button type="button" class="btn col-2 button-basic">新しいレシピを投稿する</button>
</div>

<recipe-like
    :initial-is-liked-by='@json($recipe->isLikedBy(Auth::user()))'
    :initial-count-likes='@json($recipe->count_likes)'
    :authorized='@json(Auth::check())'
    endpoint="{{ route('recipe.like', ['recipe' => $recipe->id]) }}"
>
</recipe-like>
{{-- <p>{{ $recipe->title }}</p> --}}
@foreach ($materials as $material)
    <p>{{ $material->name }}</p>
@endforeach

@endsection
