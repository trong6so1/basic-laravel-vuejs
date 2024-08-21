<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function Departments(){
        return $this->belongsTo(Department::class, 'department_id' , 'id');
    }

    public function Status(){
        return $this->belongsTo(Status::class, 'status_id' , 'id');
    }
}
