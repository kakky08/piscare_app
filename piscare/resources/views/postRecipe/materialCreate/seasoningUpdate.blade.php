<div class="row cols-4 material-register-form-tag">
    <div class="col-1"></div>
    <p class="col">調味料の名前</p>
    <p class="col">調味料の分量</p>
    <div class="col-1"></div>
</div>
@if($errors->has('seasonings'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('seasonings') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('seasonings.*.seasoningName'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('seasonings.*.seasoningName') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('seasonings.*.quantity'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('seasonings.*.quantity') }}</p>
        <div class="col-1"></div>
    </div>
@endif
<form method="POST" action="{{ route('materialCreate.updateSeasoning')}} " id="edit-seasoning">
    @csrf
    <input
        type="hidden"
        value="{{ $postId }}"
        name="edit_postId"
    >
    <seasoning-edit
        :post-id={{ $postId }}
        :seasonings="{{ json_encode($seasonings) }}"
    >
    </seasoning-edit>
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn col-auto button-default material-form-button-margin" form="edit-seasoning">調味料についての情報を更新する</button>
    </div>
</form>
