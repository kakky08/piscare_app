@extends('layouts.app')
@section('header')
        @include('components.header.navbar', ['page' => 'home'])
@endsection
@section('aside')
    @include('components.sidebar.mypage')
@endsection
@section('main')
    <h1>Privacy</h1>
    <form method="POST" action="{{ route('privacy.update')}}" class="row cols-3">
        @csrf
        <p class="col">{{ $user->email}}</p>
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <input type="email" name="email" class="col" placeholder="新しいメールアドレスを入力してください">
        <button type="submit" class="col-2">メールアドレスを更新</button>
    </form>
    {{-- パスワードが存在したら更新画面を表示する --}}
    {{-- @if (isset($user->password)) --}}
        <form method="POST" action="{{ route('privacy.update')}}" class="row cols-3">
            @csrf
            <input type="password"  name="password" class="col" placeholder="新しいパスワードを入力してください">
            <button type="submit" class="col-2">パスワードを更新</button>
        </form>
    {{-- @endif --}}
    <p>アイコンの更新</p>
@endsection
