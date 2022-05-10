@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto material-register-form">
        <div class="card-body">
            <label for="postNumberOfPeople" class="form-label material-register-form-label">何人分の材料か入力してください</label>
            <input type="text" id="postNumberOfPeople" class="form-control mb-5" placeholder="何人分">
            <p class="border-bottom mb-5"></p>
            <div class="row cols-4 material-register-form-tag">
                <div class="col-1"></div>
                <p class="col">材料・調味料</p>
                <p class="col">分量</p>
                <div class="col-1"></div>
            </div>
            <form method="POST" action="{{ route('materialCreate.store')}}" id="form-material">
                @csrf
                <material-component
                :post-id={{ $postId }}
                {{-- :materials={{ $materials }} --}}
                {{-- endpoint="{{ route('materialCreate.update', $postId) }}" --}}
                >
                </material-component>
                <p class="border-bottom mb-5"></p>
                {{-- <p>{{$postId}}</p> --}}
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn col-auto button-default" form="form-material">保存して閉じる</button>
                </div>
            </form>
        </div>
    </div>

@endsection
