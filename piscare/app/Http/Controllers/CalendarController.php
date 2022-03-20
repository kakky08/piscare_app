<?php

namespace App\Http\Controllers;

use App\Calendar\CalendarView;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        $calendar = new CalendarView(time());

        return view('calendar', compact('calendar'));
    }

}
