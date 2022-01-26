<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class CustomAuthController extends Controller
{
    public function customLogin(Request $request)
    {
        Session::flush();
        Auth::logout();

        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            
            $userData = User::where('email', $credentials['email'])->first();
            $request->session()->put([
                'user_id' => $userData['id'],
                'username' => $userData['name'],
                'user_email' => $userData['email'],    
            ]);

            return redirect()->intended('shortenlink')
                        ->with('message', 'Signed in');
        }
  
        session()->flash('invalid', 'Login details are not valid');
        return redirect("/");
    }

    public function customRegistration(Request $request)
    {
        Session::flush();
        Auth::logout();
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);

        $userData = User::where('email', $data['email'])->first();
        $request->session()->put([
            'user_id' => $userData['id'],
            'username' => $userData['name'],
            'user_email' => $userData['email'],    
        ]);

        return redirect("shortenlink")->withSuccess('You have signed-in');
    }

    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
    
    public function signOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('/');
    }
}
