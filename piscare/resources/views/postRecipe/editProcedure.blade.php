@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto">
        <div class="card-body">
            <form method="POST" action="{{ route('editProcedure.store')}}" id="form-procedure">
                @csrf
                <test-component
                    :post-id={{ $postId }}
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
@endsection
