<?php

namespace App\Models;

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
}
