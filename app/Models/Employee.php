<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'job_id',
        'image',
        'age',
        'status',
        'national_id',
        'gender',
        'salary'
    ];


    public function job()
    {
        return $this->belongsTo(Job::class,'job_id');
    }


}
