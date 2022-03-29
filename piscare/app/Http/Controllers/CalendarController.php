<?php

namespace App\Http\Controllers;

use App\Calendar\CalendarView;
use App\Calendar\Record;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // カーボンでデータの受け渡しテスト
        $date = new Carbon('today');
        $records = Record::all();


        return view('calendar', compact('calendar', 'date', 'records'));
    }

    public function show(Request $request, $select)
    {

        $date = $request->input('date');

        if ($date && preg_match("/^[0-9]{4}-[0-9]{2}$/", $date)) {
            $date = strtotime($date . '-01');
        } else {
            $date = null;
        }

        if (!$date) {
            $date = time();
        }

        $calendar = new CalendarView($date);

        // カーボンでデータの受け渡しテスト
        $date = $select;

        // TODO データベースから記録データを取得する処理
        // TODO indexとshowで使っている共通コードをまとめる

        return view('calendar', compact('calendar', 'date'));
    }

}
