<form action="{{ route('procedure.store')}}" method="POST" id="store-procedure" 　enctype="multipart/form-data">
    @csrf
    @isset($filename)
        <div>
            {{-- <img src="{{ asset('storage/' . $filename) }}"> --}}
        </div>
    @endisset
    <input type="hidden" name="postId" value="{{ $postId }}">
    <procedure-component></procedure-component>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn col-auto button-default material-form-button-margin" form="store-procedure">手順を追加する</button>
    </div>
</form>

@if (isset($procedures))
    @foreach ($procedures as $procedure)
        <img src="{{ asset('storage/' . $procedure->photo) }}" alt="">
    @endforeach
@endif
