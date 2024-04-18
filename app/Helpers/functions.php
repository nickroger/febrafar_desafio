<?php

use App\Enums\ScheduleStatus;

if (!function_exists('getStatusSchedule')) {
    function getStatusSchedule(string $status): string
    {
        return ScheduleStatus::fromValue($status);
    }
}
