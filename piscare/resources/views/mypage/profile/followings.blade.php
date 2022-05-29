@extends('layouts.app')
@section('header')
    @include('components.header.navbar')
@endsection
@section('aside')
    @include('components.sidebar.mypage', ['page' => 'mypage'])
@endsection
@section('main')
    @include('mypage.profile.profile')
    @include('mypage.profile.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => true, 'isFollowers' => false])
    @foreach($followings as $following)
        {{ $following->id }}
    @endforeach
@endsection
