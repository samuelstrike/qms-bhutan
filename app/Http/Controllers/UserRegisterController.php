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
            'roles' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        $role =$request->input('roles');
        
        $gewogs = $request->input('gewog');

        $current = $user->id; 

        $user->assignRole($role); 

        if($request->has('admin')){
             $dzongkhag = DB::table('dzongkhags')
                            ->join('gewogs', 'gewogs.dzongkhag_id', '=','dzongkhags.id')
                            ->select('gewogs.dzongkhag_id','gewogs.id')
                            ->get();
            foreach($dzongkhag as $dzo){                     
                DB::table('gewog_user_mappings')->insert([
                        'user_id' => $current,
                        'dzongkhag_id' => $dzo->dzongkhag_id,
                        'gewog_id' => $dzo->id
                        ]);
                    }                      

        } else 
            {
                $this->validate($request,[
                    'dzongkhag' => ['required'],
                    'gewog' => ['required'],
                ]);
                foreach($gewogs as $value )
                {
                    DB::table('gewog_user_mappings')->insert([
                        'user_id' => $current,
                        'dzongkhag_id'=>$request->dzongkhag,
                        'gewog_id' => $value
                    ]);
                }
            }   
               
         $user->save();
           

        return redirect()->route('register-user.index')
            ->with('flash_message',
            'User '. $user->name.' Created Successfully!');

    }

    public function destroy($id){
        
        $user = User::findOrFail($id);

        $user->gewogmappings()->delete();
        $user->delete();

        return redirect()->route('register-user.index')
        ->with('flash_message',
        'User '.$user->name. ' Deleted successfully');
    }
    public function edit($id)
    {
        $user = User::with('roles')->findOrFail($id);


        $gewog = DB::table('gewog_user_mappings')
                    
                    ->join('gewogs','gewogs.id', '=','gewog_user_mappings.gewog_id')    
                    ->select( 'gewogs.gewog_name','gewog_id')
                    ->where('user_id', $id)
                    ->get();
        $dzongkhag = DB::table('gewog_user_mappings')
                    ->where('user_id', $id)
                    ->pluck('dzongkhag_id')
                    ->last();
       
        
        return view('users.edit',[
            'user' => $user,
            'gewog' => $gewog,
            'dzo' =>$dzongkhag
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        
        $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'dzongkhag' => ['required'],
            'gewog' => ['required'],
            'roles' => ['required'],
            // 'password' => ['string', 'min:8', 'confirmed'],
        ]);

        $name = $request->name;
        $email = $request->has('email') ? $request->email : $user->email;
        
        //$password= $request->has('password') ? Hash::make($request->password) : $user->password;
        $role = $request->roles;

        $data = [
            "name" => $name,
            "email" => $email,
            //"password" =>$password
        ];

        $user->syncRoles($role);
        
        $gewogs = $request->gewog;
        
        DB::table('gewog_user_mappings')->where('user_id', $id)->delete();
        foreach($gewogs as $value )
            {  
                DB::table('gewog_user_mappings')  
                    ->insert([
                        'user_id' => $id,
                        'dzongkhag_id'=>$request->dzongkhag,
                        'gewog_id' => $value,
                        ]
                    );
            }
        
        User::updateOrCreate(['id' => $id], $data);
        
       
        return redirect()->route('register-user.index')
        ->with('flash_message',
         'User '.$user->name. ' updated Successfully');
    

    }
}
