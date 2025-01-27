<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [ 'employeeID' , 'taskDate' , 'taskDescription' ];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }
}
