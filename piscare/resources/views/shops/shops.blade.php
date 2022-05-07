@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection

@section('main')
{{-- タイトル --}}
<h2 class="page-title">お店検索</h2>
{{-- <h1 class="h2">お店検索</h1> --}}

{{-- 検索フォーム --}}
<form method="GET" action="{{ route('shops.search') }}" class="row shop-search-form" >
    <div class="col-4">
        <input type="text" name="search" class="form-control"  placeholder="キーワード">
    </div>
    <div class="col-4">
        <select class="form-select" name='area'>
            <option selected>エリアを選択する</option>
            @foreach ($areas as $area)
                <option value="{{ $area->code }}">{{ $area->name }}</option>
            @endforeach
            </select>
    </div>
    <div class="col-auto">
        <button type="submit" class="btn mb-4 shop-search-button">検索</button>
    </div>
</form>

{{-- カード --}}
<div class="row justify-content-between spacing-reset">
    @foreach ($results as $result)
        <div class="card col-lg-3 card-style">
            <img src="{{ $result->shop_image }}" class="card-img-top card-style-image" alt="...">
            <div class="card-body card-style-body">
                <h5 class="card-title card-style-title">{{ $result->name }}</h5>
                <p class="card-text card-style-text">{{ $result->catch }}</p>
                <a href="{{ $result->catch }}" class="btn stretched-link card-style-button">店舗詳細</a>
            </div>
        </div>
    @endforeach

</div>
{{-- ページネーション --}}
<nav class="pagination justify-content-center">
    {{ $results->appends(request()->query())->links() }}
</nav>
{{-- @include('shops.pagination') --}}
@endsection
