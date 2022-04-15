@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            {{-- サイドバー --}}
            @include('components.sidebar.recipe')
            <main class="col-lg-10 main">
                <p>{{ $recipe->title }}</p>
            </main>
        </div>
    </div>
@endsection
