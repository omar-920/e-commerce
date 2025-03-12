<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function viewDashboard()
    {
        return view('dashboard.pages.home');
    }

    public function viewAdmins()
    {
        $admins = User::where('role' , '=' , 'admin')->get();
        return view('dashboard.pages.admins', compact('admins'));
    }

    public function storeAdmin(Request $request)
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
            'role' => 'admin'
        ]);
        return redirect()->route('viewAdmins');
    }
    public function adminsEdit(Request $request, $id)
    {

        $admin = User::findOrFail($id);

        $request->validate([
            'name' => 'string|max:255|min:3',
            'email' => 'email',
            'password' => 'required|max:255|min:3',
        ]);
        $admin->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->filled('password') ? Hash::make($request->password) : $admin->password,
        ]);
        $admin->save();
        return redirect()->route('viewAdmins');
    }

    public function adminsDelete(Request $request , $id)
    {
        $admin = User::findOrFail($id);   
        $admin->delete();
        return redirect()->route('viewAdmins');
    }
}
