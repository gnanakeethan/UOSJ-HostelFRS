<?php
/**
 * Created by PhpStorm.
 * User: gnanakeethan
 * Date: 24/12/2016
 * Time: PM 7:40
 */

namespace App\Engine;


use App\Request;
use App\Room;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class Counter
{

    /**
     * Counter constructor.
     */
    public function __construct()
    {
    }

    public function listing($time=null){

    }
    public function count($time = NULL)
    {
        $time = $this->findTime($time);
        if (!auth()->check()) {
            return "Unauthorized";
        }
        info(auth()->user()->hasRole('admin|superadmin'));
        if (auth()->user()->hasRole('admin|superadmin')) {
            $rcount = 0;
            $ucount = auth()->user()->requests()->where('queued_for', '=', $time[0])->where('day_part', '=', $time[1])->sum('count');

            if (auth()->user()->room_id)
                $rcount = auth()->user()->room->requests()->where('queued_for', '=', $time[0])->where('day_part', '=', $time[1])->sum('count');
            $totalcount = Request::where('queued_for', '=', $time[0])->where('day_part', '=', $time[1])->sum('count');
            return "Your Count $ucount. Your Room Count " . $rcount . ".Hostel Count $totalcount";
            //TODO: count all
        } else {
            //TODO: count roommates
        }

        return "counted";
    }

    public function add($count = 1, $time = NULL)
    {
        $time = $this->findTime($time);
        if (!auth()->check()) {
            return "Unauthorized";
        }
        if ($room_id = auth()->user()->room_id) {
            $room = Room::find($room_id);
            $request = Request::firstOrCreate(['user_id'    => auth()->user()->id,
                                               'room_id'    => $room_id,
                                               'queued_for' => $time[0],
                                               'day_part'   => $time[1],
            ]);
            $room_count = $room->requests()->where('queued_for', '=', $time[0])->where('day_part', '=', $time[1])->sum('count');
            if ($room_count + $count < $room->maximum)
                $request->count += $count > 0 ? $count : 1;
            if ($room_count + $count > $room->maximum)
                $request->count += $room->maximum - $room_count;

            info($request->count);
            info($count);
            $request->save();
            $room_count = $room->requests()->where('queued_for', '=', $time[0])->where('day_part', '=', $time[1])->sum('count');

            return "Added to Queue on {$time[0]->toFormattedDateString()} for {$time[1]}.Your Total is {$request->count}.Your Room is No. {$room->name}. Room Total {$room_count}";
        }


    }

    public function subtract($count = 1, $time = NULL)
    {
        $time = $this->findTime($time);
        if (!auth()->check()) {
            return "Unauthorized";
        }

        if ($room_id = auth()->user()->room_id) {
            $room = Room::find($room_id);
            $request = Request::firstOrCreate(['user_id'    => auth()->user()->id,
                                               'room_id'    => $room_id,
                                               'queued_for' => $time[0],
                                               'day_part'   => $time[1],
            ]);

            info('count');
            info($count);
            info($request->count);
            if ($request->count > 0) {
                $request->count -= $count > 0 ? $count : 1;
            }
            if ($request->count < 0)
                $request->count = 0;
            $request->save();
            $room_count = $room->requests()->where('queued_for', '=', $time[0])->where('day_part', '=', $time[1])->sum('count');

            return "Removed from Queue on {$time[0]->toFormattedDateString()} for {$time[1]}.Your Total is {$request->count}. Your Room is No.{$room->name}. Room Total {$room_count}";
        }

    }

    private function findTime($time)
    {

        $today = Carbon::today()->startOfDay();
        $night = Carbon::today()->startOfDay()->addHours(19)->addMinutes(30);
        $morning = Carbon::today()->startOfDay()->addHours(6)->addMinutes(30);
        $lunch = Carbon::today()->startOfDay()->addHours(12);
        $day_part = $time;
        if (($morning->isFuture() && $today->isPast()) || ($night->isPast())) {
            if ($night->isPast())
                $today->addDay();
            $day_part = "morning";

        }
        if ($lunch->isFuture() && ($time == "lunch" || $morning->isPast())) {
            $day_part = "lunch";

        }
        if (($night->isFuture() && $time == "night") && ($lunch->isPast() || $morning->isPast())) {
            $day_part = "night";
        }
        info('t' . $time);
        info('t' . $day_part);

        return [$today, $day_part];

    }
}