@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection
@section('main')
    <div class="col-lg-8 content-center">
        <h2 class="page-title">レシピ名の登録</h2>
        <div class="card recipe-register-form">
            <div class="card-body">
                <form method="POST" action="{{ route('registerName.store')}}">
                    @csrf
                    <label for="postRecipeName" class="form-label recipe-register-form-label">レシピ名を入力してください</label>
                    <input type="text" class="form-control recipe-register-form-input" id="postRecipeName" name="title" placeholder="レシピ名">
                    <button type="submit" class="btn recipe-register-form-button">新規登録</button>
                </form>
            </div>
        </div>
    </div>
@endsection
