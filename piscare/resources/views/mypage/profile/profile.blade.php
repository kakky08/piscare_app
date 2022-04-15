<div class="d-flex flex-row">
    <a href="" class="text-dark">
    <i class="fas fa-user-circle fa-3x"></i>
    </a>
</div>
<h2 class="h5 card-title m-0">
    <a href="" class="text-dark">
        {{ $user->name }}
    </a>
</h2>
<div class="card-text">
    <a href="{{ route('profile.followings', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followings }}フォロー
    </a>
    <a href="{{ route('profile.followers', ['name' => $user->name]) }}" class="text-muted">
        {{ $user->count_followers }} フォロワー
    </a>
</div>
