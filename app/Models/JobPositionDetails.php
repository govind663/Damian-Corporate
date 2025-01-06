<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobPositionDetails extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;
    protected $fillable = [
        'id',
        'job_position_id',
        'requirements',
        'experience',
        'qualification',
        'responsibilities',
        'job_type',
        'job_location',
        'job_description',
        'salary',
        'status',
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

    // ==== Relationship with JobPosition
    public function job_position()
    {
        return $this->belongsTo(JobPosition::class, 'job_position_id', 'id');
    }

}
