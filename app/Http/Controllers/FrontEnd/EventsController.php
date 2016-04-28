<?php

namespace App\Http\Controllers\FrontEnd;

use App\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    public function calendar()
    {
        ini_set('xdebug.max_nesting_level', 200);
        return view('site.events.calendar');
    }

    public function getAjaxEvents()
    {
        $start =  $_REQUEST['start'];
        $end =  $_REQUEST['end'];
        $events = Event::whereBetween('start', [$start, $end])->get();
        return $events;
    }
}
