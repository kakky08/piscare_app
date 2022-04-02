@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">

                <div class="card">
                    <h1 class="card-title h2 border-bottom">{{ $title }}</h1>
                    <div class="card-body">
                        {{-- post Id のインプット --}}
                        {{-- <input type="hidden" name="postId" value="{{ $postId }}"> --}}
                        <div class="row justify-content-around">
                            {{-- 料理画像 --}}
                            <div class="col-5">
                                <img src="https://placehold.jp/320x240.png" alt="">
                            </div>
                            {{-- 材料リスト --}}
                            <div class="col-5">
                                <a href="{{ route('materialCreate.edit', ['materialCreate' => $postId])}}">
                                    @if ($materials)
                                        <div>
                                            <h3>材料名（人分）</h3>
                                            <ul>
                                                @foreach ($materials as $material)
                                                    <li class="row justify-content-between">
                                                            <h4 class="col-auto">材料{{ $i }}</h4>
                                                            <p class="col-auto">分量</p>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @else
                                    <div>
                                        <h3>材料名（何人分)</h3>
                                        <ul>
                                            @for ($i = 1; $i < 4; $i++)
                                                <li class="row justify-content-between">
                                                        <h4 class="col-auto">材料{{ $i }}</h4>
                                                        <p class="col-auto">分量</p>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                    @endif
                                </a>
                            </div>
                            <h3 class="border-bottom">作り方</h3>
                            <a href="{{ route('editProcedure.edit', ['editProcedure' => $postId])}}">作り方</a>
                                <div class="row justify-content-around">
                                    <div class="col-5">
                                        <img src="https://placehold.jp/320x240.png" alt="">
                                    </div>
                                    <div class="col-5">
                                        <label for="exampleFormControlTextarea1" class="form-label">作り方の説明</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
