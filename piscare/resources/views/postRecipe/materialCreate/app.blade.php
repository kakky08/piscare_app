@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto material-register-form">
        <div class="card-body">
            {{-- 戻るボタン --}}
            <a class="btn button-back" href="{{ route('materialCreate.back', ['materialCreate' => $postId]) }}">>>戻る</a>
            <br />
            {{-- 登録完了メッセージ --}}
            @include('postRecipe.materialCreate.successMessage')

            {{-- 人数の登録フォーム --}}
            @include('postRecipe.materialCreate.peopleUpdate')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 材料の新規登録フォーム --}}
            @include('postRecipe.materialCreate.materialRegister')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 最良の更新フォーム --}}
            @include('postRecipe.materialCreate.materialUpdate')

        </div>
    </div>

@endsection
