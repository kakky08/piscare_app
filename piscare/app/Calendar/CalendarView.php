<?php
namespace App\Calendar;

use Carbon\Carbon;

class CalendarView {
    private $carbon;

    function __construct($date)
    {
        $this->carbon = new Carbon($date);
    }

    /**
     * タイトル
     */
    public function getTitle()
    {
        return $this->carbon->format('Y年n月');
    }

    /**
     * カレンダー出力
     */
    function render()
    {
        $html = [];
        $html[] = '<div class="calendar">';
        $html[] = '<table class="table">';
        $html[] = '<thead>';
        $html[] = '<tr>';
        $html[] = '<th>月</th>';
        $html[] = '<th>火</th>';
        $html[] = '<th>水</th>';
        $html[] = '<th>木</th>';
        $html[] = '<th>金</th>';
        $html[] = '<th>土</th>';
        $html[] = '<th>日</th>';
        $html[] = '</tr>';
        $html[] = '</thead>';
        $html[] = '</table>';
        $html[] = '</div>';
        return implode("", $html);
    }

    /**
     * 週を取得
     */
    protected function getWeeks()
    {
        $weeks = [];

        // 初日
        $firstDay = $this->carbon->copy()->firstOfMonth();

        // 月末まで
        $lastDay = $this->carbon->copy()->lastOfMonth();

        // 1週目
        $week = new CalendarWeek($firstDay->copy());
        $week[] = $week;

        // 作業用の日
        $tmpDay = $firstDay->copy()->addDay(7)->startOfWeek();

        // 月末までループ
        while ($tmpDay->lte($lastDay))
        {
            //週カレンダーviewの作成
            $week = new CalendarWeek($tmpDay, count($weeks));
            $week[] = $week;

            // 次の日を7日に設定
            $tmpDay->addDay(7);
        }
        return $weeks;
    }
}
