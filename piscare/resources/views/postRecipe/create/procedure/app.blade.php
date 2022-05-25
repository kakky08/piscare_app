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
            @include('postRecipe.create.procedure.successMessage')

            {{-- 手順の新規登録フォーム --}}
            @include('postRecipe.create.procedure.procedureRegister')

            {{-- 区切り線 --}}
            <p class="border-bottom boundary-line"></p>

            {{-- 手順の更新フォーム --}}
            @include('postRecipe.create.procedure.procedureUpdate')

        </div>
    </div>
@endsection
