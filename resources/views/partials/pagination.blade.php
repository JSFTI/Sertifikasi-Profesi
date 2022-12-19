<ul class="flex gap-5 items-center">
    <li>
        @if (!$paginator->onFirstPage())
            <a href="{{ $paginator->url(1) }}">
                <div class="i-mdi:chevron-double-left"></div>
            </a>
        @else
            <div class="i-mdi:chevron-double-left text-#555"></div>
        @endif
    </li>
    @if ($paginator->currentPage() - 1 >= 1)
    <li>
        <a href="{{ $paginator->previousPageUrl() }}">
            {{$paginator->currentPage() - 1}}
        </a>
    </li>
    @endif
    <li class="text-#555">
        {{ $paginator->currentPage() }}
    </li>
    @if ($paginator->currentPage() + 1 <= $paginator->lastPage())
    <li>
        <a href="{{ $paginator->nextPageUrl() }}">
            {{$paginator->currentPage() + 1}}
        </a>
    </li>
    @endif
    <li>
        @if (!$paginator->onLastPage())
            <a href="{{ $paginator->url($paginator->lastPage()) }}">
                <div class="i-mdi:chevron-double-right"></div>
            </a>
        @else
            <div class="i-mdi:chevron-double-right text-#555"></div>
        @endif
    </li>
</ul>