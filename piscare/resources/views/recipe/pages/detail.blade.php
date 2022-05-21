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
{{-- ソート --}}
<ul class="nav">
    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">新着順</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">人気順</a>
    </li>
</ul>

{{-- <p>{{ $recipe->title }}</p> --}}
@foreach ($materials as $material)
    <p>{{ $material->name }}</p>
@endforeach

@endsection
