<?php

namespace App\Enums;

enum ScheduleStatus: string
{
    case o = "Open";
    case c = "Close";


    public static function fromValue(string $name): string
    {
        foreach (self::cases() as $status) {
            if ($name === $status->name) {
                return $status->value;
            }
        }

        throw new \ValueError("$status is not a valid");
    }
}
