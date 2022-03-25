<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-md-5">
        <ul class="nav flex-column nav-pills nav-fill">
            <li class="nav-item">
                <a class="nav-link {{  $page === 'home' ? 'active' : '' }}" aria-current="page" href="#">
                    <div>
                        <h3 class="ml-2"><i class="fas fa-home"></i>Home</h3>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  $page === 'mypage' ? 'active' : '' }}" aria-current="page" href="{{ route('mypage.index') }}">
                    <h3 class="ml-2"><i class="fas fa-user"></i>MyPage</h3>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  $page === 'setting' ? 'active' : '' }}" href="#">
                    <h3 class="ml-2"><i class="fas fa-cog"></i>Setting</h3>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  $page === 'privacy' ? 'active' : '' }}" href="#">
                    <h3 class="ml-2"><i class="fas fa-user-shield"></i>Privacy</h3>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{  $page === 'data' ? 'active' : '' }}" href="#">
                    <h3 class="ml-2"><i class="fas fa-database"></i>Data</h3>
                </a>
            </li>
        </ul>
    </div>
</nav>
