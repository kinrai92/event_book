@if ($paginator->hasPages())
    <ul class="pagination" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="page-link" aria-hidden="true">&lsaquo;</span>
            </li>
        @else
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
            </li>
        @endif
        {{-- Pagination Elements --}}
            {{-- Array Of Links --}}
                @for($page =1; $page <= $paginator->lastPage(); $page++)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
<<<<<<< HEAD
                        <li class="page-item" {{($paginator->currentPage() < ($per_block+1)/2 && $page <= $per_block)||
                                                ($paginator->currentPage() >= ($per_block+1)/2 &&  $page >= $paginator->currentPage()-($per_block-1)/2 && $page <= $paginator->currentPage()+($per_block-1)/2)
=======
                        <li class="page-item" {{($paginator->currentPage() < ($per_block+1)/2 && $page <= $per_block) ||
                                                ($paginator->currentPage() >= ($per_block+1)/2 && $page >= $paginator->currentPage()-($per_block-1)/2 && $page <= $paginator->currentPage()+($per_block-1)/2)
>>>>>>> 3d5369988a5b9751556c420f804135cfc180cb6d
                                                 ? '':'hidden'}}>
                                                <a class="page-link" href="{{ $paginator->url($page) }}">{{ $page }}</a></li>
                    @endif
                @endfor
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
            </li>
        @else
            <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="page-link" aria-hidden="true">&rsaquo;</span>
            </li>
        @endif
    </ul>
@endif
