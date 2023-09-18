<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class project_participants extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['updated_at','created_at','project_id','participant_id','role_id','comment','entry_request'];

    public function projects() {
        return $this->belongsTo('App\Models\projects', 'project_id');
    }
}
