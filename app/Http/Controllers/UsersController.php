<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index() 
    {
        $users = User::with('roles')->get();
        $roles = Role::with('permissions')->get();
        // dd($users[0]->roles->name);
        return view('user_management.users.list', compact('users', 'roles'));
    }

    public function store(UserCreateRequest $request)
    {
        
        if(Auth::user()->roles->id != 1){
            return back()->with('message', 'Unauthorize');
        }

        $user = new User();
        $user->name = $request->full_name;
        $user->username = $request->user_name;
        $user->role_id = $request->user_role;
        $user->phone = $request->user_phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->user_password);
        $user->gender = $request->user_gender;
        if($request->active) {
            $user->is_active = 1;
        }else {
            $user->is_active = 0;
        }

        $user->save();

        return redirect('users')->with('message', 'User Created Successfully');
    }

    public function add()
    {
        
        if(Auth::user()->roles->id != 1){
            return back()->with('message', 'Unauthorize');
        }

        $roles = Role::with('permissions')->get();
        return view('user_management.users.user-add', compact('roles'));
    }

    public function edit(User $user)
    {
        
        if(Auth::user()->roles->id != 1){
            return back()->with('message', 'Unauthorize');
        }

        $roles = Role::with('permissions')->get();
        return view('user_management.users.edit', compact('roles', 'user'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {   
        
        if(Auth::user()->roles->id != 1){
            return back()->with('message', 'Unauthorize');
        }

        $user->name = $request->full_name;
        $user->username = $request->user_name;
        $user->role_id = $request->user_role;
        $user->phone = $request->user_phone;
        $user->email = $request->email;
        if($request->user_password){
            $user->password = Hash::make($request->user_password);
        }
        $user->gender = $request->user_gender;
        if($request->active) {
            $user->is_active = 1;
        }else {
            $user->is_active = 0;
        }

        $user->save();

        return redirect('users')->with('message', 'User Updated Successfully');
    }

    public function delete(User $user)
    {
        
        if(Auth::user()->roles->id != 1){
            return back()->with('message', 'Unauthorize');
        }

        $user->delete();

        return back()->with('message', 'Deleted Successfully.');
    }
}
