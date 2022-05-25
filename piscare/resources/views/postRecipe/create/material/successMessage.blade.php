@if (session('completion-of-registration-people'))
    <div class="row cols-4 spacing-reset">
        <div class="col-1"></div>
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-registration-people') }}
        </div>
        <div class="col-1"></div>
    </div>
@elseif (session('completion-of-registration-material'))
    <div class="row cols-4 spacing-reset">
        <div class="col-1"></div>
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-registration-material') }}
        </div>
        <div class="col-1"></div>
    </div>
@elseif (session('completion-of-update-material'))
    <div class="row cols-4 spacing-reset">
        <div class="col-1"></div>
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-registration-material') }}
        </div>
        <div class="col-1"></div>
    </div>
@elseif (session('completion-of-registration-seasoning'))
    <div class="row cols-4 spacing-reset">
        <div class="col-1"></div>
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-registration-seasoning') }}
        </div>
        <div class="col-1"></div>
    </div>
@elseif (session('completion-of-update-seasoning'))
    <div class="row cols-4 spacing-reset">
        <div class="col-1"></div>
        <div class="alert alert-message-success col" role="alert">
            {{ session('completion-of-registration-seasoning') }}
        </div>
        <div class="col-1"></div>
    </div>

@endif
