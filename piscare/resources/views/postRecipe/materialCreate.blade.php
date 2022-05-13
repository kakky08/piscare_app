@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection
@section('main')
    <div class="card col-md-auto col-lg-auto material-register-form">
        <div class="card-body">
            <a href="{{ route('materialCreate.back', ['materialCreate' => $postId]) }}">>>戻る</a><br />
            <label for="postNumberOfPeople" class="form-label material-register-form-label">何人分の材料か入力してください</label>
            <input type="text" id="postNumberOfPeople" class="form-control mb-5" placeholder="何人分">
            <p class="border-bottom mb-5"></p>
            {{-- 新規登録 --}}
            <form method="POST" action="{{ route('materialCreate.store') }}" id="store-material">
                @csrf
                <div class="material">
                    <div class="row cols-4 spacing-reset material-form">
                        <div class="col-1"></div>
                        <input
                            type="hidden"
                            value={{ $postId }}
                            name="store_postId">
                        <input
                            type="text"
                            class="form-control col"
                            placeholder="材料・調味料"
                            name="store_material"
                        >
                        <input
                            type="text"
                            class="form-control col"
                            placeholder="分量"
                            name="store_quantity"
                        >
                        <button type="submit" form="store-material" class="btn col-1 button-default">新規登録</button>
                    </div>
                </div>
            </form>
            <div class="row cols-4 material-register-form-tag">
                <div class="col-1"></div>
                <p class="col">材料・調味料</p>
                <p class="col">分量</p>
                <div class="col-1"></div>
            </div>

            <form method="POST" action="{{ route('materialCreate.update', ['materialCreate' => $postId])}} " id="edit-material">
                @method('PUT')
                @csrf
                <input
                    type="hidden"
                    value="{{ $postId }}"
                    name="edit_postId"
                >
                <material-edit
                    :post-id={{ $postId }}
                    :materials="{{ json_encode($materials) }}"
                >
                </material-edit>
                {{-- <material-component
                :post-id={{ $postId }}
                :materials="{{ json_encode($materials) }}"
                >
                </material-component> --}}
                <p class="border-bottom mb-5"></p>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="submit" class="btn col-auto button-default" form="edit-material">保存して閉じる</button>
                </div>
            </form>
        </div>
    </div>

@endsection
