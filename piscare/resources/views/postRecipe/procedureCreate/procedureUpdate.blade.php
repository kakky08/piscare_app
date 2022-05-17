<form method="POST" action="{{ route('procedure.update', ['procedure' => $postId ])}}" id="update-procedure">
    @method('PUT')
    @csrf
    {{-- {{dd( gettype(asset('storage/')))}} --}}
    <input type="hidden" name="edit_postId" value="{{ $postId }}">
    <procedure-edit
        :post-id={{ $postId }}
        :procedures="{{ json_encode($procedures) }}"
        path="{{ $path }}"
    >
    </procedure-edit>
    <p class="border-bottom mb-4"></p>
    {{-- <p>{{$postId}}</p> --}}
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn btn-success col-auto" form="update-procedure">保存して閉じる</button>
    </div>
</form>
