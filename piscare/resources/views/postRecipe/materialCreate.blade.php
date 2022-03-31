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
                            <p class="col-4 text-center bg-success text-white rounded-pill py-2" >材料・調味料</p>
                            <p class="col-4 text-center bg-success text-white rounded-pill py-2">分量</p>
                        </div>
                        <form method="POST" action="{{ route('materialCreate.store')}}" id="form-material">
                            @csrf
                            <material-component
                            :post-id={{ $postId }}
                            {{-- :materials={{ $materials }} --}}
                            {{-- endpoint="{{ route('materialCreate.update', $postId) }}" --}}
                            >
                            </material-component>
                            <p class="border-bottom mb-4"></p>
                            {{-- <p>{{$postId}}</p> --}}
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-success col-auto" form="form-material">保存して閉じる</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
