@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">

                <div class="card col-md-auto col-lg-auto">
                    <div class="card-body">
                        <form method="POST" action="{{ route('editProcedure.store')}}" id="form-procedure">
                            @csrf
                            <procedure-component
                                :post-id={{ $postId }}
                            {{-- :materials={{ $materials }} --}}
                            {{-- endpoint="{{ route('materialCreate.update', $postId) }}" --}}
                            >
                            </procedure-component>
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
