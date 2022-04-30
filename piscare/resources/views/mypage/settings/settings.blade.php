@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- サイドバー --}}
            @include('components.sidebar.mypage')
            <main class="col-lg-10 main">
                <h1>Settings</h1>
            </main>
        </div>
    </div>
@endsection
