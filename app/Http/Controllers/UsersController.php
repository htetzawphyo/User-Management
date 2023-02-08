<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index() 
    {
        return view('user_management.users.list');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $name = $request->user_name;
        $email = $request->user_email;
        $role = $request->user_role;
        dd($name,$email,$role);
    }

    public function edit()
    {

    }

    public function update()
    {
        dd('user successfully updated.');
    }

    public function delete()
    {
        dd('user successfully deleted.');
    }
}
