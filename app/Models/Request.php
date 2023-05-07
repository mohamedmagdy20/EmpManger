<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'requests';

    protected $fillable = [
        'type',
        'employee_id',
        'status',
        'description',
        'request_status',
        'created_by',
        'created_at'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class,'employee_id');
    }
    
}
