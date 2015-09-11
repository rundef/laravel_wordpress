<span class="displaying-num">
    {{ $paginator->total() }}
    @if($paginator->total() > 1)
        items
    @else
        item
    @endif
</span>

@if ($paginator->lastPage() > 1)
    <span class="pagination-links">
        @if($paginator->currentPage() == 1)
            <span class="tablenav-pages-navspan" aria-hidden="true">&laquo;</span>
            <span class="tablenav-pages-navspan" aria-hidden="true">&lsaquo;</span>
        @else
            <a class="first-page" href="{{ $paginator->url(1) }}"><span class="screen-reader-text">First page</span><span aria-hidden="true">&laquo;</span></a>
            <a class="prev-page" href="{{ $paginator->previousPageUrl() }}"><span class="screen-reader-text">Previous page</span><span aria-hidden="true">&lsaquo;</span></a>
        @endif


        <span class="paging-input">
            <label for="current-page-selector" class="screen-reader-text">Select a page</label>
            <input class="current-page" id="current-page-selector" title="Current page" type="text" name="paged" value="{{ $paginator->currentPage() }}" size="1"> 
            of 
            <span class="total-pages">{{ $paginator->lastPage() }}</span>
        </span>


        
        @if($paginator->currentPage() == $paginator->lastPage())
            <span class="tablenav-pages-navspan" aria-hidden="true">&rsaquo;</span>
            <span class="tablenav-pages-navspan" aria-hidden="true">&raquo;</span>
        @else
            <a class="next-page" href="{{ $paginator->nextPageUrl() }}"><span class="screen-reader-text">Next page</span><span aria-hidden="true">&rsaquo;</span></a>
            <a class="last-page" href="{{ $paginator->url($paginator->lastPage()) }}"><span class="screen-reader-text">Last page</span><span aria-hidden="true">&raquo;</span></a>
        @endif
    </span>
@endif