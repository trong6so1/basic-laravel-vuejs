<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Status;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        User::create([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'department_id' => $request['department_id'],
            'status_id' => $request['status_id'],
            'password' => Hash::make($request['password']),
        ]);
        // dd(1);
        // return response()->json($validate);
    }

    public function getUSer($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    public function editUser(Request $request, $id)
    {
        $validate = $request->validate([
            'username' => 'required|unique:users,username,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'status_id' => 'required',
            'department_id' => 'required',
            'name' => 'required'
        ]);

        User::find($id)->update([
            'username' => $request['username'],
            'name' => $request['name'],
            'email' => $request['email'],
            'department_id' => $request['department_id'],
            'status_id' => $request['status_id'],
        ]);
        if($request["changePassword"] == true)
        {
            $validate = $request->validate([
                'password' => 'required',
                'passwordConfirm' => 'required|same:password',
            ]);
            User::find($id)->update([
                'password' => Hash::make($request['password']),
                "change_password_at" => Carbon::now()
            ]);
        }
    }

    public function delete($id)
    {
        User::find($id)->delete();
    }
}
