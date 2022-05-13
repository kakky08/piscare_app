@extends('layouts.noSide')
@section('header')
    @include('components.header.navbar')
@endsection
@section('main')
    <div class="card">
        <div class="card-body recipe-register-form-body">
            <h2 class="recipe-register-form-title">{{ $title }}</h2>
            {{-- post Id のインプット --}}
            {{-- <input type="hidden" name="postId" value="{{ $postId }}"> --}}
            <div class="row row-cols-2 spacing-reset recipe-register-form-section border-bottom">
                {{-- 料理画像 --}}
                <div class="col spacing-reset">
                    <img src="https://placehold.jp/320x240.png" alt="" class="recipe-register-form-image">
                </div>
                {{-- 材料リスト --}}
                <div class="col spacing-reset">
                    <a href="{{ route('materialCreate.edit', ['materialCreate' => $postId])}}">
                        @if ($materials)
                            <div class="recipe-register-form-link">
                                <h3 class="recipe-register-form-material">
                                    材料名
                                    <small class="recipe-register-form-people">（人分）</small>
                                </h3>
                                <ul>
                                    @foreach ($materials as $material)
                                        <li class="row row-cols-2 border-bottom recipe-register-form-material-list">
                                                <h4 class="col recipe-register-form-material-name">{{ $material->material_name }}</h4>
                                                <p class="col recipe-register-form-material-quantity">{{ $material->quantity }}</p>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                        <div class="recipe-register-form-link">
                            <h3 class="recipe-register-form-material">
                                材料名
                                <small class="recipe-register-form-people">（人分）</small>
                            </h3>
                            <ul>
                                @for ($i = 1; $i < 4; $i++)
                                    <li class="row row-cols-2 spacing-reset border-bottom recipe-register-form-material-list">
                                            <h4 class="col">材料{{ $i }}</h4>
                                            <p class="col">分量</p>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                        @endif
                    </a>
                </div>
            </div>

            <h2 class="recipe-register-form-title">作り方</h2>
            <a href="{{ route('editProcedure.edit', ['editProcedure' => $postId])}}">
                <div class="row cols-3 spacing-reset recipe-register-form-section recipe-register-form-link border-bottom">
                    <p class="col-1 spacing-reset recipe-register-form-order">1.</p>
                    {{-- 料理画像 --}}
                    <div class="col spacing-reset">
                        <img src="https://placehold.jp/320x240.png" alt="" class="recipe-register-form-image">
                    </div>
                    {{-- 作り方の説明 --}}
                    <div class="col spacing-reset">
                        <p class="form-label recipe-register-form-label">作り方の説明</p>
                        <div class="form-control spacing-reset recipe-register-form-explanation"></div>
                    </div>
                </div>
            </a>
            <div class="d-grid gap-2 col-6 recipe-register-form-button-layout">
                <button class="btn recipe-register-form-button" type="button">レシピを登録</button>
            </div>
        </div>
    </div>
@endsection
