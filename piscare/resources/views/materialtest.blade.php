@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">
                @foreach ($materials as $material)
                    <p>{{ $material }}</p>
                @endforeach
                @foreach ($quantities as $quantity)
                    <p>{{ $quantity }}</p>
                @endforeach
                @foreach ($requests as $request)
                    <p>{{ $request }}</p>
                @endforeach
            </main>
        </div>
    </div>
@endsection
