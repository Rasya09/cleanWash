<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    // =====================================
    // SHOW LOGIN
    // =====================================

    public function showLogin()
    {
        return view('auth.login');
    }



    // =====================================
    // SHOW REGISTER
    // =====================================

    public function showRegister()
    {
        return view('auth.register');
    }



    // =====================================
    // REGISTER
    // =====================================

    public function register(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|numeric|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);


        // =========================
        // CREATE USER
        // =========================

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'role' => 'user',
            'status' => 'active',
            'password' => Hash::make($request->password),
        ]);


        // =========================
        // AUTO LOGIN
        // =========================

        Auth::login($user);


        // =========================
        // REDIRECT
        // =========================

        return redirect('/user/home')
            ->with('success', 'Register berhasil');
    }



    // =====================================
    // LOGIN
    // =====================================

    public function login(Request $request)
    {

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {

            $request->session()->regenerate();

            // =========================
            // ADMIN
            // =========================

            if (Auth::user()->role == 'admin') {

                return redirect('/admin/dashboard');
            }


            // =========================
            // MITRA
            // =========================

            if (Auth::user()->role == 'mitra') {

                return redirect('/mitra/dashboard');
            }


            // =========================
            // USER
            // =========================

            return redirect('/user/home');
        }


        return back()->with(
            'error',
            'Email atau password salah'
        );
    }



    // =====================================
    // LOGOUT
    // =====================================

    public function logout(Request $request)
    {

        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

}