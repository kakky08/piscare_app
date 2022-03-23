<?php

namespace App\Http\Controllers;

use App\Calendar\CalendarView;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index(Request $request)
    {
        $date = $request->input('date');

        if($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date))
        {
            $date = strtotime($date . '-01');
        }
        else
        {
            $date = null;
        }

        if(!$date)
        {
            $date = time();
        }

        $calendar = new CalendarView($date);

        return view('calendar', compact('calendar'));
    }

}
