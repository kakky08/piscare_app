@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection

@section('main')
{{-- タイトル --}}
<h2 class="page-title">お店検索</h2>
{{-- <h1 class="h2">お店検索</h1> --}}

{{-- 検索フォーム --}}
@if($errors->has('keyword'))
    <div class="row cols-3 spacing-reset">
        <p class="col alert-message-error">※{{ $errors->first('keyword') }}</p>
    </div>
@endif
@if($errors->has('area'))
    <div class="row cols-3 spacing-reset">
        <p class="col alert-message-error">※{{ $errors->first('area') }}</p>
    </div>
@endif
<form method="GET" action="{{ route('shops.search') }}" class="row shop-search-form" >
    <div class="col-4">
        <input type="text" name="keyword" class="form-control"  placeholder="店名">
    </div>
    <div class="col-4">
        <select class="form-select" name='area'>
            <option selected value="">エリアを選択する</option>
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
    @foreach ($shops as $shop)
        <div class="card col-lg-3 card-style">
            <img src="{{ $shop->shop_image }}" class="card-img-top card-style-image" alt="...">
            <div class="card-body card-style-body">
                <h5 class="card-title card-style-title">{{ $shop->name }}</h5>
                <p class="card-text card-style-text">{{ $shop->catch }}</p>
                <a href="{{ $shop->shop_url }}" class="btn stretched-link card-style-button">店舗詳細</a>
            </div>
        </div>
    @endforeach

</div>
{{-- ページネーション --}}
<nav class="pagination justify-content-center">
    {{ $shops->appends(request()->query())->links() }}
</nav>
{{-- @include('shops.pagination') --}}
@endsection
