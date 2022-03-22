<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile($id)
    {   
        $user= User::findOrFail($id);
        
        return view('profile.index',[
            'user' => $user
        ]);

    }
    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request,[
            'name' => ['required', 'string', 'max:255', 'min:4'],
        ]);

        if ($request->has('email'))
        {
            
        }

    }
}
