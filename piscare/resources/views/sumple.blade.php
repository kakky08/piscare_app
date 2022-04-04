@extends('app')
<style>
    .drop_area {
        color: gray;
        font-weight: bold;
        font-size: 1.2em;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 320px;
        height: 240px;
        border: 5px solid gray;
        border-radius: 15px;
        box-sizing: border-box;
    }
    .enter {
    border: 10px dotted powderblue;
}
.image-input{
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    opacity: 0;
    cursor: pointer;
}
    </style>
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">

                <div class="card col-md-auto col-lg-auto">
                    <div class="card-body">
                        <form method="POST" action="{{ route('editProcedure.store')}}" id="form-procedure">
                            @csrf
                            <test-component
                                :post-id=1
                            {{-- :materials={{ $materials }} --}}
                            {{-- endpoint="{{ route('materialCreate.update', $postId) }}" --}}
                            >
                            </test-component>
                            <p class="border-bottom mb-4"></p>
                            {{-- <p>{{$postId}}</p> --}}
                            <div class="d-grid gap-2 col-6 mx-auto">
                                <button type="submit" class="btn btn-success col-auto" form="form-procedure">保存して閉じる</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
