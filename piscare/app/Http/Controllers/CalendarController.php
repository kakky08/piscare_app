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
        // Carbonで日時を取得
        $date = new Carbon('today');
        $date = $date->format('Ymd');

        // その日の記録があるかを検索
        $record = Record::where('user_id', Auth::id())->where('date', $date)->first();

        $action = 'store';
        if ($record) {
            $action =  'update';
        }

        return view('calendar', compact('calendar', 'date', 'action', 'record'));
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
