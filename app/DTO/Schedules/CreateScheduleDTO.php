<?php

namespace App\DTO\Schedules;

use App\Http\Requests\StoreUpdateScheduleRequest;

class CreatScheduleDTO
{
    public function __construct(
        public string $name,
        public string $description,
        public string $state,
        public string $start_date,
        public string $deadline_date,
        public string $conclusion_date,
        public string $id_user,
    ) {
    }
    public static function makeFromRequest(StoreUpdateScheduleRequest $request): self
    {
        return new  self(
            $request->name,
            $request->description,
            $request->status,
            $request->start_date,
            $request->deadline_date,
            $request->conclusion_date,
            $request->id_user,
        );
    }
}
