<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Chat;
use Illuminate\Validation\Rules\Password;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            
                $user_id=auth()->user()->id;
                $user=User::where("id",'=',$user_id);
                $user->update([
                    'last_seen'=>"now"
                ]);
            return redirect()->route('friend-list');
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Invalid email or password.'])->withInput();
    }



    public function register(Request $request){
        $credentials =$request->validate([
            'f_name'=>['required'],
            's_name'=>['required'],
            'email'=>['required','email','unique:users,email'],
            'password'=>['required', Password::min(8)->letters()->symbols()]
        ]);

        User::create([
            'first_name'=>$credentials['f_name'],
            'second_name'=>$credentials['s_name'],
            'email'=>$credentials['email'],
            'password'=>bcrypt($credentials['password']),
            'friends'=>"[1]",
            'last_seen'=>date('y-m-d H:i:s')
        ]);

        Auth::attempt(['email' => $credentials['email'], 'password' => $credentials['password']]);
        
        return redirect()->route('friend-list');
    }

    
    function logout(){
        $user_id=auth()->user()->id;
        $user=User::where("id",'=',$user_id);
        $user->update([
            'last_seen'=>date('y-m-d H:i:s')
        ]);
        Auth::logout();
        return redirect()->route("login_show");
        
        }
}
