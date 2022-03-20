@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">
                <div class="card">
                    <div class="card-header">
                        {{ $calendar->getTitle() }}
                    </div>
                    <div class="card-body">
                        {!! $calendar->render() !!}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
