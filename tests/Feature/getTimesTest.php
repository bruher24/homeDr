<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Services\ScheduleService;
use Tests\TestCase;

class getTimesTest extends TestCase
{
    public function test_getTimes() {
        $date = '2025-06-19';
        $scheduleService = new ScheduleService();
        $schedule = $scheduleService->getTimes(1, $date);
        var_dump($schedule->content());
    }
}
