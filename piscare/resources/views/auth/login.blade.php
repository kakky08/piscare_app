@extends('layouts.auth')

@section('header')
    @include('components.header.auth', ['page' => 'login'])
@endsection

@section('main')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card auth-card">
                <div class="card-body auth-card-body">
                    <h2 class="auth-title">Login</h2>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 mt-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="aurh-form">
                        @csrf

                        <div class="form-group row auth-form-group">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row auth-form-group">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row auth-form-group">
                            <div class="col-md-8  d-grid mx-auto">
                                <button type="submit" class="btn auth-button">
                                    Login
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        パスワードを忘れた方はこちら
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <div class="d-grid gap-2 col-8 mx-auto auth-button-social">
                        <a href="{{ route('login.{provider}', ['provider' => 'google']) }}" class="btn btn-block auth-button-google auth-button-social-link">
                            <i class="fab fa-google auth-button-social-icon"></i>Googleでログイン
                        </a>
                    </div>
                    <div class="d-grid gap-2 col-8 mx-auto auth-button-social">
                        <a href="{{ route('login.{provider}', ['provider' => 'github']) }}" class="btn btn-block auth-button-github auth-button-social-link">
                            <i class="fab fa-github auth-button-social-icon"></i>GitHubでログイン
                        </a>
                    </div>
                    <div class="d-grid gap-2 col-8 mx-auto auth-button-social">
                        <a href="{{ route('login.{provider}', ['provider' => 'twitter']) }}" class="btn btn-block auth-button-twitter auth-button-social-link">
                            <i class="fab fa-twitter auth-button-social-icon"></i>Twitterでログイン
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
