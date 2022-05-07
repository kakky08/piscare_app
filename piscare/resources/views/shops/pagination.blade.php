{{-- ページネーション --}}
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            @if ($page - 1 < 1)
                <a class="page-link" href="{{ route('shops.index', 1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            @else
                <a class="page-link" href="{{ route('shops.index', $page - 1) }}" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            @endif
        </li>
        @if ($is_last_six_page === false && $is_over_six_page === true)
            @for ($i = $page; $i < $page + 3; $i++)
                <li class="page-item"><a class="page-link" href="{{ route('shops.index', $i) }}">{{ $i }}</a></li>
            @endfor
        @endif
        @if ($is_over_six_page === false)
            @for ($i = $page; $i < $pages; $i++)
                <li class="page-item"><a class="page-link" href="{{ route('shops.index', $i) }}">{{ $i }}</a></li>
            @endfor
        @endif

        @if ($is_over_six_page === true && $is_last_six_page === false)
            <li class="page-item omit">…</li>
        @endif

        @if ($is_last_six_page)
            @for ($i = $pages - 5; $i <= $pages; $i++)
                <li class="page-item"><a class="page-link" href="{{ route('shops.index', $i) }}">{{ $i }}</a></li>
            @endfor
        @endif
        @if ($is_over_six_page === true && $is_last_six_page === false)
            @for ($i = $pages - 2; $i <= $pages; $i++)
                <li class="page-item"><a class="page-link" href="{{ route('shops.index', $i) }}">{{ $i }}</a></li>
            @endfor
        @endif

        <li class="page-item">
            @if ($page + 1 > $pages)
                <a class="page-link" href="{{ route('shops.index', $pages) }}" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
            @else
                <a class="page-link"  href="{{ route('shops.index', $page + 1) }}" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            @endif

        </li>
    </ul>
</nav>
