<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tag;
use App\Models\Ambience;
use App\Models\EventTag;
use App\Models\EventMedia;
use App\Models\EventAmbience;

use Illuminate\Pagination\Paginator;


class EventsController extends BaseCrudController
{
    public function getList() {
        $search = Session::get('cms_events_search', '');
        $status = Session::get('cms_events_filter', 'all');
        $today = date('Y-m-d');

        $all_status = $this->getStatus([
            'active'        => ['label' => 'Active ',       'query' => Event::whereActive(1) ],
            'past'          => ['label' => 'Past',          'query' => Event::where('end_date', '<', $today) ],
            'in_progress'   => ['label' => 'In progress',   'query' => Event::where('end_date', '>=', $today)->where('start_date', '<=', $today) ],
            'to_come'       => ['label' => 'To come',       'query' => Event::where('start_date', '>', $today) ],
        ]);



        if(isset($search[0]))
            $events = Event::where('title', 'LIKE', '%'.$search.'%')->orWhere('title', 'LIKE', '%'.$search.'%');
        else if(!is_null($status) && isset($all_status[$status]))
            $events = $all_status[$status]['query'];
        else {
            $status = 'all';
            $events = Event::select();
        }


        $events = $events->orderBy('start_date', 'DESC')->paginate($this->perPage);
        

        return view('cms.events.list')
                    ->withEvents($events)
                    ->withAllStatus($all_status)
                    ->withStatus($status);
    }

    public function postSearch() {
        $differentSearch = false;
        if(Input::has('search')) {
            $differentSearch = (Session::get('cms_events_search', '') != Input::get('search'));
            Session::set('cms_events_search', Input::get('search'));
            Session::set('cms_events_filter', 'all');
        }
        else {
            Session::set('cms_events_search', '');
        }

        if(Input::has('paged')) {
            $currentPage = $differentSearch ? 1 : Input::get('paged');
            Paginator::currentPageResolver(function() use ($currentPage) {
                return $currentPage;
            });
        }


        return $this->getList();
    }

    public function setFilters() {
        Session::set('cms_events_filter', Input::get('status'));
        Session::set('cms_events_search', '');
        return $this->getList();
    }




    public function getCreate() {
        return view('cms.events.create');
    }

    public function postCreate(Request $request) {
        $this->validate($request, $this->getRules());
        $event = Event::create($this->inputValues());

        $event->name = stripslashes($event->name);
        $event->description = stripslashes($event->description);
        $event->save();

        return redirect($this->getListingUrl())->withMessage('The event was successfully created');
    }





    public function getEdit(Request $request, $id) {
        $event = Event::find($id);
        return view('cms.events.edit')->withEvent($event);
    }

    public function postEdit(Request $request, $id) {
        $event = $this->getObjectFromId($id);
        $this->validate($request, $this->getRules());
        $event->update($this->inputValues());

        $event->name = stripslashes($event->name);
        $event->description = stripslashes($event->description);
        $event->save();

        return redirect($this->getListingUrl())->withMessage('The event was successfully updated');
    }
    



    public function postDelete(Request $request, $id) {
        $event = $this->getObjectFromId($id);
        $event->delete();

        return redirect($this->getListingUrl())->withMessage('The event was successfully deleted');
    }


    public function untrash(Request $request, $id) {
        $event = Event::withTrashed()->whereId($id)->first();
        $event->restore();

        return redirect($this->getListingUrl())->withMessage('The event was successfully undeleted');
    }





    protected function getEntityClassName() {
        return 'App\Models\Event';
    }

    protected function getPageAlias() {
        return 'events';
    }

    protected function getRules() {
        return [
            'start_date' => ['required'],
            'end_date' => ['required'],
            'name' => ['required'],
        ];
    }
}
