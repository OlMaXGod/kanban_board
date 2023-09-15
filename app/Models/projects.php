<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class projects extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * Атрибуты, которые должны быть преобразованы в дату
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['name','comment','type','access','who_changed'];

    public function project_phase() {
        return $this->hasMany('App\Models\project_phase', 'project_id');
    }
    
    public function phase_participants() {
        return $this->hasMany('App\Models\phase_participants', 'project_id');
    }
    
    public function project_participants() {
        return $this->hasMany('App\Models\project_participants', 'project_id');
    }

    // this is a recommended way to declare event handlers
    public static function boot() {
        parent::boot();

        // before delete() method call this
        static::deleting(function($project) {
            $project->project_phase()->delete();
            $project->phase_participants()->delete();
            $project->project_participants()->delete();
        });
    }
}
