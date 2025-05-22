<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;

class ScheduleController extends Controller
{
    public function getDisabledDates($doctorId)
    {
        // TODO: добавить реализацию
        return response()->json([
            'dates' => [
                '2025-05-19',
            ]
        ]);

    }

    public function getTimes($doctorId, $date)
    {
        // TODO: вынести в сервис вместе с другим методом?
        Carbon::setLocale('ru');
        $dayOfWeek = Carbon::parse($date)->format('w');
        $schedule = Schedule::where('doctor_id', $doctorId)->where('day_of_week', $dayOfWeek)->first();
        $startTime = Carbon::createFromTimeString($schedule->start_time);
        $endTime = Carbon::createFromTimeString($schedule->end_time);

        $times = [];
        do {
            $times[] = Carbon::parse($startTime)->format('H:i');
            $startTime = $startTime->addMinutes(30);
        } while ($startTime <= $endTime);

        return response()->json([
            'times' => $times,
        ]);
    }
}
