<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $listUser = User::with(['Department', 'Status'])->paginate();
        return $listUser;
    }
}
