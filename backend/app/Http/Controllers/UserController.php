<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index(){
        $listUser = User::with(['Department', 'Status'])->paginate();
        return $listUser;
    }

    public function create(){
        $listDepartments = Department::select([
            'id as value',
            'name as label'
        ])->get();
        $listStatus = Status::select([
            'id as value',
            'name as label'
        ])->get();
        return response()->json(['listDepartments' => $listDepartments, 'listStatus' => $listStatus]);
    }

    public function postCreate(Request $request)
    {
        // $validate = Validator::make($request->input(),[
        //     'username' => 'required|unique:users,username',
        //     'email' => 'required|email|unique:users,email',
        //     'password' => 'required|confirmed',
        //     'status_id' => 'required',
        //     'department_id' => 'required',
        //     'name' => 'required'
        // ]);
        $validate = $request->validate([
            'username' => 'required|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'passwordConfirm' => 'required|same:password',
            'status_id' => 'required',
            'department_id' => 'required',
            'name' => 'required'
        ]);
        // dd(1);
        // return response()->json($validate);
    }
}
