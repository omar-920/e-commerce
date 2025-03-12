<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function viewPage(){
        return view('account');
    }



    public function getUsers()
    {
        $users = User::where('role' , '=' , 'user')->get();
        return view('dashboard.pages.users', compact('users'));
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'string|required|max:255|min:3',
            'email' => 'email|required|unique:users,email',
            'password' => 'required|min:6|confirmed'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('viewUsers');
    }
    public function usersEdit(Request $request, $id)
    {

        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255|min:3',
            'email' => 'email',
            'password' => 'required|max:255|min:3',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $user->password,
        ]);
        $user->save();
        return redirect()->route('viewUsers');
    }

    public function usersDelete(Request $request , $id)
    {
        $user = User::findOrFail($id);   
        $user->delete();
        return redirect()->route('viewUsers');
    }



    //Registeration
    public function register(RegisterRequest $request){
        $validatedData=$request->validated();
        $validatedData['password'] = Hash::make($validatedData['password']);
        $user=User::create($validatedData);
        Auth::login($user);
        
        return redirect()->route('viewIndex')->with('success', 'Registered successful!');
    }


     public function login(LoginRequest $request){
        $request->validated();
        if (Auth::attempt($request->only(['email', 'password']))) {
            if (Auth::user()->role == 'admin' || Auth::user()->role == 'auther') {
                
            return redirect()->route('dashboard');
        
            }else {
                
            $request->session()->regenerate();
            return redirect()->route('viewIndex')->with('success', 'Login successful!');
        
            }
            
        }
        return back()->withErrors(['email' => 'Invalid email or password']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        // $msg = "Logout done";
        // return view('index',compact('msg'));
        return redirect()->route('login')->with('success', 'logout successful!');
    }
}
