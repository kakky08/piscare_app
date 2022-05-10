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

        dd($record);
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
        $date =  new Carbon($select);
        $date = $date->format('Ymd');

        // その日の記録があるかを検索
        $record = Record::where('user_id', Auth::id())->where('date', $date)->first();

        $action = 'store';
        if ($record) {
            $action =  'update';
        }

        // TODO データベースから記録データを取得する処理
        // TODO indexとshowで使っている共通コードをまとめる

        return view('calendar', compact('calendar', 'date', 'record', 'action'));
    }

    public function test()
    {
        $user = Auth::user();

        // $select_year = 0;
        // $select_month = 0;
        // $year =new Carbon(sprintf('%d years', $select_year));
        // $month = new Carbon(sprintf('%d months', $select_month));
        // dd($month->month);
        // $dateStr = sprintf('%04d-%02d-01', $year->year, $month->month);
        $dateStr = Carbon::now()->format("Y-m-01");
        // dd($dateStr);


        $date = new Carbon($dateStr);
        $year = $date->year;
        $month = $date->month;
        // dd($date->month);
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay())
        {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }


        return view('calen', compact('dates', 'user', 'date', 'year', 'month'));

    }


    public function selectTest($select)
    {
        $user = Auth::user();

        $select_year = 0;
        /* $select_month = $month; */
        // $year = new Carbon(sprintf('%d years', $select_year));
        // $month = new Carbon(sprintf('%d months', $select_month));
        // dd($month->month);
        $dateStr = sprintf('%s-01', $select);


        $date = new Carbon($dateStr);
        $year = $date->year;
        $month = $date->month;
        // dd($date->month);
        // カレンダーを四角形にするため、前月となる左上の隙間用のデータを入れるためずらす
        $date->subDay($date->dayOfWeek);
        // 同上。右下の隙間のための計算。
        $count = 31 + $date->dayOfWeek;
        $count = ceil($count / 7) * 7;
        $dates = [];

        for ($i = 0; $i < $count; $i++, $date->addDay()) {
            // copyしないと全部同じオブジェクトを入れてしまうことになる
            $dates[] = $date->copy();
        }

        return view('calen', compact('dates', 'user', 'year', 'month'));
    }

}
