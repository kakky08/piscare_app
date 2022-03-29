@extends('app')
@section('content')
    @include('components.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <main class="col-md-9 col-lg-10 px-md-4 py-4">
                <div class="card col-md-auto col-lg-auto">
                    <div class="card-body">
                        <form method="POST" action="{{ route('registerName.store')}}" class="mb-3">
                            @csrf
                            <label for="postRecipeName" class="form-label">レシピ名を入力してください</label>
                            <input type="text" class="form-control mb-3" id="postRecipeName" name="title" placeholder="料理名">
                            <button type="submit" class="btn btn-success">新規登録</button>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
