<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table  = 'jobs';
    
    protected $fillable =[
        'name',
        'description',
        'created_by'
    ];


    public function employess()
    {
        return $this->hasMany(Employee::class,'job_id');
    }
}
