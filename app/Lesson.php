<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'subject_id', 'teacher_id', 'room_id', 'group_id', 'start_time', 'end_time',
    ];
}
