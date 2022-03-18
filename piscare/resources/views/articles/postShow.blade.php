@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">

                <div class="card col-md-auto col-lg-auto">
                    <div class="card-title row justify-content-between">
                        {{-- タイトル --}}
                        <h1 class="h2 col-3">投稿レシピ</h1>
                        <button type="button" class="btn btn-success col-auto">レシピを編集する</button>
                    </div>


                    <div class="card-body">
                        <div class="row justify-content-around">
                            {{-- 料理画像 --}}
                            <div class="col-5">
                                <img src="https://placehold.jp/320x240.png" alt="">
                            </div>
                            {{-- 材料リスト --}}
                            <div class="col-5">
                                <div>
                                    <h3>材料名（何人分）</h3>
                                    <ul>
                                        @for ($i = 1; $i < 4; $i++)
                                            <li class="row justify-content-between">
                                                    <h4 class="col-auto">材料{{ $i }}</h4>
                                                    <p class="col-auto">分量</p>
                                            </li>
                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <h3 class="border-bottom">作り方</h3>
                        @for ($i = 1; $i < 3; $i++)
                            <div class="row justify-content-around">
                                <p>{{ $i }}.</p>
                                <div class="col-5">
                                    <img src="https://placehold.jp/320x240.png" alt="">
                                </div>
                                <div class="col-5">
                                    <p>サンプルテキスト</p>
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
