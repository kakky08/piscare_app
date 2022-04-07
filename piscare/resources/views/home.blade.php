@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <recipe-like
                        {{-- $recipeはレシピ全件取得時に使用 --}}
                        {{-- :initial-is-liked-by='@json($recipe->isLiedBy(Auth::user()))' --}}
                        {{-- :initial-count-likes='@json($recipe->count_likes)' --}}
                        {{-- :authorized='@json(Auth::check())' --}}
                        {{-- endpoint="{{ route('recipes.like', ['recipe' => $recipe])}}" --}}
                    >
                    </recipe-like>
                    <follow-button>
                    </follow-button>
                    <p class="red">You are logged in!</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
