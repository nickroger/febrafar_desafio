<?php

namespace App\DTO\Schedules;

use App\Enums\ScheduleStatus;
use App\Http\Requests\StoreUpdateScheduleRequest;

class CreateScheduleDTO
{
    public function __construct(
        public string $title,
        public string $description,
        public ScheduleStatus $status,
        public string $start_date,
        public string $deadline_date,
        public string $conclusion_date,
        public string $id_user,
    ) {
    }
    public static function makeFromRequest(StoreUpdateScheduleRequest $request): self
    {
        return new  self(
            $request->title,
            $request->description,
            ScheduleStatus::o,
            $request->start_date,
            $request->deadline_date,
            $request->conclusion_date,
            $request->id_user,
        );
    }
}
