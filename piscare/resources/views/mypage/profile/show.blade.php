@extends('layouts.app')
@section('header')
    @include('components.header.navbar')
@endsection
@section('aside')
    @include('components.sidebar.mypage', ['page' => 'mypage'])
@endsection
@section('main')
    @include('mypage.profile.profile')
    @include('mypage.profile.tabs', ['isPosts' => true, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => false])
    @foreach($posts as $post)
        {{ $post->id }}
    @endforeach
@endsection
