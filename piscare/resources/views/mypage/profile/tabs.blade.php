<ul class="nav nav-tabs nav-justified mt-3">
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isPosts ? 'active' : '' }}"
        href="{{ route('profile.show', ['name' => $user->name]) }}">
        投稿レシピ
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isLikes ? 'active' : '' }}"
        href="{{ route('profile.likes', ['name' => $user->name]) }}">
        いいね
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isFollowings ? 'active' : '' }}"
        href="{{ route('profile.followings', ['name' => $user->name]) }}">
        フォロー
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link text-muted {{ $isFollowers ? 'active' : '' }}"
        href="{{ route('profile.followers', ['name' => $user->name]) }}">
        フォロワー
        </a>
    </li>
</ul>
