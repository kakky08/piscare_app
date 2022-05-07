@extends('layouts.app')
@section('header')
        @include('components.header.navbar', ['page' => 'home'])
@endsection
@section('aside')
    @include('components.sidebar.mypage')
@endsection
@section('main')
    <h1>Settings</h1>
    {{-- <icon-register
        endpoint="{{ route('setting.icon')}}"
    >
    </icon-register> --}}
    <image-component></image-component>
@endsection
