@extends('layouts.app')
@section('header')
    @include('components.header.navbar')
@endsection
@section('aside')
    @include('components.sidebar.mypage', ['page' => 'mypage'])
@endsection
@section('main')
    @include('mypage.profile.profile')
    @include('mypage.profile.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => true])
    @foreach($followers as $follower)
        {{ $follower->id }}
    @endforeach
@endsection
