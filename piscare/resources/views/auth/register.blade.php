@extends('layouts.auth')

@section('header')
    @include('components.header.auth', ['page' => 'register'])
@endsection

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-card">
                <div class="card-body auth-card-body">
                        <h2 class="auth-title">Register</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 mt-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('register') }}" class="aurh-form">
                        @csrf

                        <div class="form-group row auth-form-group">
                            <label for="name" class="col-md-4 col-form-label text-md-right">ニックネーム</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row auth-form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row auth-form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row auth-form-group">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワードの確認</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row auth-form-group">
                            <div class="col-md-8  d-grid mx-auto">
                                <button type="submit" class="btn auth-button">
                                    登録
                                </button>
                            </div>
                        </div>
                    </form>
                    <div class="d-grid gap-2 col-8 mx-auto auth-button-social">
                        <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block auth-button-google auth-button-social-link">
                            <i class="fab fa-google auth-button-social-icon"></i>Googleで登録
                        </a>
                    </div>
                    <div class="d-grid gap-2 col-8 mx-auto auth-button-social">
                        <a href="{{ route('login.{provider}', ['provider' => 'github']) }}" class="btn btn-block auth-button-github auth-button-social-link">
                            <i class="fab fa-github auth-button-social-icon"></i>GitHubで登録
                        </a>
                    </div>
                    <div class="d-grid gap-2 col-8 mx-auto auth-button-social">
                        <a href="{{ route('login.{provider}', ['provider' => 'twitter']) }}" class="btn btn-block auth-button-twitter auth-button-social-link">
                            <i class="fab fa-twitter auth-button-social-icon"></i>Twitterで登録
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
