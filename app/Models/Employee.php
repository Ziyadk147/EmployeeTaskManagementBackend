<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = ['email' , 'firstName' , 'lastName'];

    public function Task()
    {
        return $this->hasMany(Task::class);
    }
}
