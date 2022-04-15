@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row">
            {{-- サイドバー --}}
            @include('components.sidebar.mypage', ['page' => 'mypage'])
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                @include('mypage.profile.profile')
                @include('mypage.profile.tabs', ['isPosts' => false, 'isLikes' => false, 'isFollowings' => false, 'isFollowers' => true])
                @foreach($followers as $follower)
                    {{ $follower->id }}
                @endforeach
            </main>
        </div>
    </div>
@endsection
