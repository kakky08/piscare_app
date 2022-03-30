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
        $record->date = $request->date;
        $record->flag_breakfast ? $record->flag_breakfast = false : $record->flag_breakfast = true;
        $record->flag_count += 1;
        $record->save();
        return redirect()->route('calendar.index');
    }


    /**
     * 昼食の新規登録
     */
    public function storeLunch(Request $request)
    {
        $record = new Record();
        $record->user_id = Auth::id();
        $record->date = $request->date;
        $record->flag_lunch ? $record->flag_lunch = false : $record->flag_lunch = true;
        $record->flag_count += 1;
        $record->save();
        return redirect()->route('calendar.index');
    }

    /**
     * 夕食の新規登録
     */
    public function storeDinner(Request $request)
    {
        $record = new Record();
        $record->user_id = Auth::id();
        $record->date = $request->date;
        $record->flag_dinner ? $record->flag_dinner = false : $record->flag_dinner = true;
        $record->flag_count += 1;
        $record->save();
        return redirect()->route('calendar.index');
    }


    /**
     * 朝食の更新
     */
    public function updateBreakfast(RecordUpdateRequest $request, Record $records)
    {
        Validator::make($request->all(), [
            'date' => [
                Rule::unique('users')->ignore($request->date),
            ],
        ]);
        $date = $request->date;
        $record = Record::where('user_id', Auth::id())->where('date', $date)->first();
        if ($record->flag_breakfast)
        {
            $record->flag_breakfast = false;
            $record->flag_count -= 1;
            if ($record->flag_count === 0) {
                $record->destroy($record->id);
            }
        }
        else
        {
            $record->flag_breakfast = true;
            $record->flag_count += 1;
        }

        $record->save();


        return redirect()->route('calendar.index');
    }

    /**
     * 昼食の更新
     */
    public function updateLunch(Request $request)
    {
        $date = $request->date;
        $record = Record::where('user_id', Auth::id())->where('date', $date)->first();
        if ($record->flag_lunch) {
            $record->flag_lunch = false;
            $record->flag_count -= 1;
            if ($record->flag_count === 0) {
                $record->destroy($record->id);
            }
        } else {
            $record->flag_lunch = true;
            $record->flag_count += 1;
        }
        $record->save();
        return redirect()->route('calendar.index');
    }

    /**
     * 夕食の更新
     */
    public function updateDinner(Request $request)
    {
        $date = $request->date;
        $record = Record::where('user_id', Auth::id())->where('date', $date)->first();
        if ($record->flag_dinner) {
            $record->flag_dinner = false;
            $record->flag_count -= 1;
            if ($record->flag_count === 0) {
                $record->destroy($record->id);
            }
        } else {
            $record->flag_dinner = true;
            $record->flag_count += 1;
        }
        $record->save();
        return redirect()->route('calendar.index');
    }
}
