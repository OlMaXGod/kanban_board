<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class phase_participants extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

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

    public function projects() {
        return $this->belongsTo('App\Models\projects', 'project_id');
    }

}
