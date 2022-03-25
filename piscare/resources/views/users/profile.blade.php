@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">
                @include('users.user')
                <ul class="nav nav-tabs nav-justified mt-3">
                    <li class="nav-item">
                        <a class="nav-link text-muted active"
                        href="{{ route('user.show', ['user' => $user->id]) }}">
                            記事
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted"
                        href="">
                            いいね
                        </a>
                    </li>
                </ul>
                TODO{{-- 記事を追加  --}}
                {{-- @foreach($articles as $article)
                    @include('articles.card')
                @endforeach --}}
            </main>
        </div>
    </div>
@endsection
