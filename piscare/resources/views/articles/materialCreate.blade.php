@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">

                <div class="card col-md-auto col-lg-auto">
                    <div class="card-body">
                        <input type="text" class="form-control mb-5" placeholder="何人分">
                        <div class="row justify-content-evenly mb-4">
                            <p class="col-4 text-center bg-success text-white rounded-pill py-2">材料・調味料</p>
                            <p class="col-4 text-center bg-success text-white rounded-pill py-2">分量</p>
                        </div>

                    <material-component></material-component>

                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
