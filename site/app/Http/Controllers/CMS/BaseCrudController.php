<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;


abstract class BaseCrudController extends Controller
{
    protected $perPage = 15;


    abstract protected function getPageAlias();
    abstract protected function getEntityClassName();
    abstract protected function getRules();





    protected function inputValues() {
        $excluded = ['path', 'page'];
        $array = array_where(Input::all(), function ($key, $value) use($excluded) {
            return (!in_array($key, $excluded) && $key[0] != '_');
        });

        return $array;
    }

    protected function getObjectFromId($id) {
        $className = $this->getEntityClassName();


        $object = call_user_func(array($className, 'find'), $id);
        if(!$object)
            return redirect($this->getListingUrl());
        return $object;
    }

    protected function getListingUrl() {
        $pageAlias = $this->getPageAlias();
        return crud_url($pageAlias, 'cms/'.$pageAlias);
    }


    protected function getStatus($statusArray = [], $includeAll = true, $includeTrashed = true) {
        $className = $this->getEntityClassName();


        $all_status = [];

        if($includeAll)
            $all_status['all'] = ['label' => 'All', 'query' => call_user_func(array($className, 'select')) ];

        $all_status = array_merge($all_status, $statusArray);

        if($includeTrashed)
            $all_status['trash'] = ['label' => 'Trash', 'query' => call_user_func(array($className, 'onlyTrashed')) ];

        return $all_status;
    }
}
