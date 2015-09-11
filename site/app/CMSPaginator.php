<?php
namespace App;

use Illuminate\Support\Facades\App;
use Illuminate\Pagination\LengthAwarePaginator;

class CMSPaginator extends LengthAwarePaginator {
    protected $pageAlias;

    public function setPageAlias($pageAlias) {
        $this->pageAlias = $pageAlias;
    }

	public function url($page)
    {
        if ($page <= 0) {
            $page = 1;
        }

        return crud_url($this->pageAlias, 'cms/'.$this->pageAlias.'?'.$this->pageName.'='.$page);
    }
}