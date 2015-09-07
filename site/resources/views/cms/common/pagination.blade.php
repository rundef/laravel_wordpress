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
            <a class="first-page disabled" title="Go to the first page" href="javascript:;">&laquo;</a>
            <a class="prev-page disabled" title="Go to the first page" href="javascript:;">&lsaquo;</a>
        @else
            <a class="first-page" title="Go to the first page" href="{{ $paginator->url(1) }}">&laquo;</a>
            <a class="prev-page" title="Go to the first page" href="{{ $paginator->previousPageUrl() }}">&lsaquo;</a>
        @endif



        <span class="paging-input">
            <label for="current-page-selector" class="screen-reader-text">Select a page</label>
            <input class="current-page" id="current-page-selector" title="Current page" type="text" name="paged" value="{{ $paginator->currentPage() }}" size="1"> 
            sur 
            <span class="total-pages">{{ $paginator->lastPage() }}</span>
        </span>


        
        @if($paginator->currentPage() == $paginator->lastPage())
            <a class="next-page disabled" title="Go to the next page" href="javascript:;">&rsaquo;</a>
            <a class="last-page disabled" title="Go to the last page" href="javascript:;">&raquo;</a>
        @else
            <a class="next-page" title="Go to the next page" href="{{ $paginator->nextPageUrl() }}">&rsaquo;</a>
            <a class="last-page" title="Go to the last page" href="{{ $paginator->url($paginator->lastPage()) }}">&raquo;</a>
        @endif
    </span>
@endif