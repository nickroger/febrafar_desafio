<?php

namespace App\DTO\Schedules;

use App\Enums\ScheduleStatus;
use App\Http\Requests\StoreUpdateScheduleRequest;

class UpdateScheduleDTO
{
    public function __construct(
        public string $id,
        public string $title,
        public string $description,
        public ScheduleStatus $status,
        public string $start_date,
        public string $deadline_date,
        public string $id_user,
    ) {
    }
    public static function makeFromRequest(StoreUpdateScheduleRequest $request, string $id = null): self
    {
        return new  self(
            $id ?? $request->id,
            $request->title,
            $request->description,
            ScheduleStatus::c,
            $request->start_date,
            $request->deadline_date,
            $request->id_user,
        );
    }
}
