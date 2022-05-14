<div class="row cols-4 material-register-form-tag">
    <div class="col-1"></div>
    <p class="col">材料の名前</p>
    <p class="col">材料の分量</p>
    <div class="col-1"></div>
</div>
@if($errors->has('materials'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('materials') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('materials.*.materialName'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('materials.*.materialName') }}</p>
        <div class="col-1"></div>
    </div>
@endif
@if($errors->has('materials.*.quantity'))
    <div class="row cols-3 spacing-reset">
        <div class="col-1"></div>
        <p class="col alert-message-error">※{{ $errors->first('materials.*.quantity') }}</p>
        <div class="col-1"></div>
    </div>
@endif
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
    <div class="d-grid gap-2 col-6 mx-auto">
        <button type="submit" class="btn col-auto button-default material-form-button-margin" form="edit-material">材料についての情報を更新する</button>
    </div>
</form>
