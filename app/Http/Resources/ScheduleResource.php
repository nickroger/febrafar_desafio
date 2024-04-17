<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ScheduleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'start_date' => $this->start_date,
            'deadline_date' => $this->deadline_date,
            'conclusion_date' => $this->conclusion_date,
            'date_created' => Carbon::make($this->created_at)->format('Y-m-d'),
        ];
    }
}
