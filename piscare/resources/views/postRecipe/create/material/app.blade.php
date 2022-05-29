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
            @include('postRecipe.create.material.successMessage')

            {{-- 人数の登録フォーム --}}
            @include('postRecipe.create.material.peopleUpdate')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 材料の新規登録フォーム --}}
            @include('postRecipe.create.material.materialRegister')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 材料の更新フォーム --}}
            @include('postRecipe.create.material.materialUpdate')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 調味料の新規登録フォーム --}}
            @include('postRecipe.create.material.seasoningRegister')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 調味料の更新フォーム --}}
            @include('postRecipe.create.material.seasoningUpdate')

        </div>
    </div>

@endsection
