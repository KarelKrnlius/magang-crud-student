@if ($paginator->hasPages())
    <nav class="d-flex justify-content-center mt-4">
        <ul class="pagination">

            {{-- Previous --}}
            <li class="page-item {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                <a class="page-link rounded-pill shadow-sm" href="{{ $paginator->previousPageUrl() }}">
                    ←
                </a>
            </li>

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                            <a class="page-link rounded-pill shadow-sm" href="{{ $url }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            <li class="page-item {{ !$paginator->hasMorePages() ? 'disabled' : '' }}">
                <a class="page-link rounded-pill shadow-sm" href="{{ $paginator->nextPageUrl() }}">
                    →
                </a>
            </li>

        </ul>
    </nav>
@endif