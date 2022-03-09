<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

class UserRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $users = User::all();
        $roles = Role::all();

        return view('users.index',[
            'users' => $users,
            'roles' =>$roles
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'dzongkhag' => ['required', 'numeric'],
            'gewog' => ['required', 'numeric'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $role =$request->input('roles');

        $current = $user->id; 

        $user->assignRole($role); 

        
        $user->save();
        

        if ($current){

            DB::table('gewog_user_mappings')->insert([
                'user_id' => $current,
                'dzongkhag_id'=>$request->input('dzongkhag'),
                'gewog_id' => $request->input('gewog')
            ]);
        }

        return redirect()->route('register-user.index')
            ->with('flash_message',
            'User '. $user->name.' Create Successfully!');

    }

    public function destroy($id){
        
        $user = User::findOrFail($id);

        $user->gewogmappings()->delete();
        $user->delete();

        return redirect()->route('register-user.index')
        ->with('flash_message',
        'User Deleted');
    }
}
