<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectDetails extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'banner_image',
        'project_id',
        'slug',
        'location',
        'location_url',
        'total_constructed_area',
        'project_description',
        'inserted_by',
        'inserted_at',
        'modified_by',
        'modified_at',
        'deleted_by',
        'deleted_at',
    ];

    protected $dates = [
        'inserted_at',
        'modified_at',
        'deleted_at',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
