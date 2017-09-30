<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title',
        'description',
        'salary',
        'city',
        'country',
        'type_job_id',
        'user_id'
    ];

    public function typeJob ()
    {
        return $this->belongsTo(TypeJob::class, 'type_job_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'jobs_categories', 'job_id')->withTimestamps();
    }
}
