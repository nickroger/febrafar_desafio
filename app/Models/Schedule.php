<?php

namespace App\Models;

use App\Enums\ScheduleStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'start_date',
        'deadline_date',
        'conclusion_date',
        'status',
        'description',
        'id_user'
    ];
    public function status(): Attribute
    {
        return Attribute::make(
            set: fn (ScheduleStatus $status) => $status->name,
        );
    }
}
