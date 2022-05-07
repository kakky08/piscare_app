<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecordUpdateRequest;
use App\Record;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;

class RecordController extends Controller
{
    /**
     * 朝食の新規登録
     */
    public function storeBreakfast(Request $request)
    {
        $record = new Record();
        $record->user_id = Auth::id();
        $record->year_month = (string)$request->year_month;
        $record->day = $request->day;
        $record->flag_breakfast ? $record->flag_breakfast = false : $record->flag_breakfast = true;
        $record->flag_count += 1;
        $record->save();
        return redirect()->route('home.select', $request->year_month . '-' . $request->day);
    }


    /**
     * 昼食の新規登録
     */
    public function storeLunch(Request $request)
    {
        $record = new Record();
        $record->user_id = Auth::id();
        $record->year_month = $request->year_month;
        $record->day = $request->day;
        $record->flag_lunch ? $record->flag_lunch = false : $record->flag_lunch = true;
        $record->flag_count += 1;
        $record->save();
        return redirect()->route('home.select', $request->year_month . '-' . $request->day);
    }

    /**
     * 夕食の新規登録
     */
    public function storeDinner(Request $request)
    {
        $record = new Record();
        $record->user_id = Auth::id();
        $record->year_month = $request->year_month;
        $record->day = $request->day;
        $record->flag_dinner ? $record->flag_dinner = false : $record->flag_dinner = true;
        $record->flag_count += 1;
        $record->save();
        return redirect()->route('home.select', $request->year_month . '-' . $request->day);
    }


    /**
     * 朝食の更新
     */
    public function updateBreakfast(RecordUpdateRequest $request, Record $records)
    {
        $year_month = $request->year_month;
        $day = $request->day;
        $record = Record::where('user_id', Auth::id())->where('year_month', $year_month)->where('day', $day)->first();
        if ($record->flag_breakfast)
        {
            $record->flag_breakfast = false;
            $record->flag_count -= 1;
            if ($record->flag_count === 0)
            {
                $record->destroy($record->id);
            }
        }
        else
        {
            $record->flag_breakfast = true;
            $record->flag_count += 1;
        }

        $record->save();


        return redirect()->route('home.select', $request->year_month . '-' . $request->day);
    }

    /**
     * 昼食の更新
     */
    public function updateLunch(Request $request)
    {
        $year_month = $request->year_month;
        $day = $request->day;
        $record = Record::where('user_id', Auth::id())->where('year_month', $year_month)->where('day', $day)->first();
        if ($record->flag_lunch)
        {
            $record->flag_lunch = false;
            $record->flag_count -= 1;
            if ($record->flag_count === 0)
            {
                $record->destroy($record->id);
            }
        }
        else
        {
            $record->flag_lunch = true;
            $record->flag_count += 1;
        }
        $record->save();
        return redirect()->route('home.select', $request->year_month . '-' . $request->day);
    }

    /**
     * 夕食の更新
     */
    public function updateDinner(Request $request)
    {
        $year_month = $request->year_month;
        $day = $request->day;
        $record = Record::where('user_id', Auth::id())->where('year_month', $year_month)->where('day', $day)->first();
        if ($record->flag_dinner)
        {
            $record->flag_dinner = false;
            $record->flag_count -= 1;
            if ($record->flag_count === 0)
            {
                $record->destroy($record->id);
            }
        }
        else
        {
            $record->flag_dinner = true;
            $record->flag_count += 1;
        }
        $record->save();
        return redirect()->route('home.select', $request->year_month . '-' . $request->day);
    }
}
