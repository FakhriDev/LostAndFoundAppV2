<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register(Request $request){
        dd($request);
        $validation = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required',
            'contact' =>'required|numeric|min:5',
            'password' => 'required|min:6',
            'photo' => 'required|image|mimes:jpeg,png,jpg,image|nullable|max:1999'
        ]);
        if($request->hasFile('photo')){
            $fileNamaWithExt = $request->file('photo')->getClientOriginalName();
            $filename =pathinfo($fileNamaWithExt, PATHINFO_FILENAME);
            $ext = $request->file('photo')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$ext;
            $path = $request->file('photo')->storeAs('/photos', $fileNameToStore);
            }else{
            }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->photo = $fileNameToStore;
        $user->password = bcrypt($request['password']);
        $user->save();
        return redirect('/login')->with('success', 'Create Account.');
        
    }
    public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if  (Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->withErrors([
            'email' => 'Login failed!',
        ]);
        
        
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/index')->with('success', 'Your Logout.');
        
    }
}
