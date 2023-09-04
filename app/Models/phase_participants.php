<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class phase_participants extends Model
{
    use HasFactory;

    protected $primaryKey = 'project_id';
    protected $fillable = [
        'subtask',
        'comment',
        'participant_id',
        'password',
        'time_frome',
        'time_to',
        'deleted_at',
        'id',
    ];

}
