<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $listUser = User::with(['Departments', 'Status'])->paginate();
        return $listUser;
    }
}
