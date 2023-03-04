<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Role;
use App\Models\User;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\Documents;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('CreateUser', ['only' => ['store', 'add']]);
        $this->middleware('ReadUser', ['only' => ['index']]);
        $this->middleware('UpdateUser', ['only' => ['edit', 'update']]);
        $this->middleware('DeleteUser', ['only' => ['delete']]);
    }

    public function index(Request $request) 
    {
        $roles = Role::with('permissions')->get();
        $query = User::with('roles')->orderBy('id');

        if($request->search) {
            $query->where(function ($q1) use ($request) {
               $q1->where('name', 'like', '%'. $request->search .'%')
                    ->orwhere('username', 'like', '%'. $request->search . '%');
            });
        }

        $users = $query->paginate(15);
        return view('user_management.users.list', compact('users', 'roles'));
    }

    public function store(UserCreateRequest $request)
    {
        DB::beginTransaction();
        try{
            if($request->hasFile('profile_image')){
                $file = $request->file('profile_image');
                $img_name = time() . '_' . $request->file('profile_image')->getClientOriginalName();
                Storage::put('profile-image/' . $img_name, file_get_contents($file));
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
    
            if($request->hasFile('profile_image')){
                $image = new Image();
                $image->path = $img_name;
                $user->image()->save($image);
            }
            DB::commit();
            return redirect('users')->with('message', 'User Created Successfully');
        } catch(Exception $e){
            DB::rollBack();
            return back()->with('message', $e->getMessage());
        }
        
    }

    public function add()
    {
        $roles = Role::with('permissions')->get();
        return view('user_management.users.user-add', compact('roles'));
    }

    public function edit(User $user, Request $request)
    {
        $roles = Role::with('permissions')->get();
        $query = Documents::with('user')->orderBy('id');

        if($request->doc_search){
            $query->where(function ($q1) use ($request) {
                $q1->where('title', 'like', '%'. $request->doc_search .'%');
            });
        }

        $documents = $query->where('user_id', '=', $user->id)->paginate(10);
      
        return view('user_management.users.view', compact('roles', 'user', 'documents'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        DB::beginTransaction();
        try{
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

            // BEGIN UPDATE PROFILE
            if($request->hasFile('profile_image')){
                $file = $request->file('profile_image');
                $img_name = time() . '_' . $request->file('profile_image')->getClientOriginalName();
                Storage::put('profile-image/' . $img_name, file_get_contents($file));
            }

            if($request->avatar_remove == 1 && $user->image){
                $image = $user->image;
                Storage::delete('profile-image/'.$image->path);
                $image->delete();
            }

            if($request->hasFile('profile_image')){
                $image = $user->image;
                if($image) {
                    Storage::delete('profile-image/'.$image->path);
                } else {
                    $image = new Image();
                }
                $image->path = $img_name;
                $user->image()->save($image);
            }
    
            DB::commit();
            return back()->with('message', 'User Updated Successfully');
        } catch(Exception $e) {
            DB::rollBack();
            return back();
        }        
    }

    public function delete(User $user)
    {
        DB::beginTransaction();
        try {
            $image = $user->image;
            Storage::delete('profile-image/'.$image->path);
            $user->delete();

            if($user->documents){
                foreach($user->documents as $doc){
                    if(Storage::exists('documents/'. $doc->file_path)){
                        Storage::delete('documents/'. $doc->file_path);
                    }
                    if(Storage::disk('do')->exists('hzp/'. $doc->file_path)){
                        Storage::disk('do')->delete('hzp/'.$doc->file_path);
                    }
                    $doc->delete();
                }
            }

            DB::commit();
            return back()->with('message', 'Deleted Successfully.');
        }catch(Exception $e) {
            DB::rollBack();
            return back()->with('message', $e->getMessage());
        }        
    }
}
