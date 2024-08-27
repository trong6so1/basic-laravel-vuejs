<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    public $fillable = [
        'id',
        'username',
        'password',
        'name',
        'email',
        'department_id',
        'status_id',
        'change_password_at',
        'login_at'
    ];

    public function Department(){
        return $this->belongsTo(Department::class, 'department_id' , 'id');
    }

    public function Status(){
        return $this->belongsTo(Status::class, 'status_id' , 'id');
    }
}
