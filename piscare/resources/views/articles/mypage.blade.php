@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row">
            {{-- サイドバー --}}
            @include('components.sidebar', ['page' => 'mypage'])
            <main class="col-md-9 ml-sm-auto col-lg-10 px-md-4 py-4">
                <div class="d-flex flex-row">
                    <a href="" class="text-dark">
                    <i class="fas fa-user-circle fa-3x"></i>
                    </a>
                </div>
                <h2 class="h5 card-title m-0">
                    <a href="" class="text-dark">
                        {{ $user->name }}
                    </a>
                </h2>
                <div class="card-text">
                    <a href="" class="text-muted">
                        10 フォロー
                    </a>
                    <a href="" class="text-muted">
                        10 フォロワー
                    </a>
                </div>
            </main>
        </div>
    </div>
@endsection
