<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login',[
            'title' => 'Victoria | Login'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);
        
        if (Auth::attempt($credentials)) {
            if (Auth::user()->role == "admin") {
                // admin
                return redirect('/admin/appointment');
            } else 
            if (Auth::user()->role == "doctor") {
                // doctor
                return redirect('/doctor/appointment');
            } else {
                return redirect('/');
            }
        } else {
            return redirect('/admin/login')->with('error', 'Username atau password salah');
        }
    }
    
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|string|unique:users,username',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'role' => 'user'
        ]);

        Auth::login($user);
        return redirect('/');
    }

    public function destroy()
    {
        Auth::logout();
        return redirect('/login');
    }
}
