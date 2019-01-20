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
        {{-- Sort Pages --}}
        @php $parent_pages=array(array()); $child_pages=array(); $count=0; $i=0; $j=0; @endphp
        @foreach ($elements as $element)
           @foreach ($element as $page => $url)
              $child_pages[$i] = $page;
              $count++;
              @if($count%3==0)
              $parent_pages[$i] = $child_pages;
              $i++;
              @endif
           @endforeach
           @php dd($parent_pages); exit(); @endphp
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="page-item" {{($paginator->currentPage()%3==0 && !in_array($page-$paginator->currentPage(),[-1,-2]))||
                                                (($paginator->currentPage()+1)%3==0 && !in_array($page-$paginator->currentPage(),[1,-1]))||
                                                (($paginator->currentPage()+2)%3==0 && !in_array($page-$paginator->currentPage(),[1,2]))
                                                 ? 'hidden':''}}>
                                                <a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

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
