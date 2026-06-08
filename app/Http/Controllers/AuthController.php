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

        $request->merge([
            'full_phone' => '62' . $request->phone
        ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => [
                'required',
                'regex:/^[1-9][0-9]{8,14}$/'
            ],
            'full_phone' => 'unique:users,phone',
            'password' => 'required|min:8|confirmed'
        ], [
            'full_phone.unique' => 'Nomor telepon ini sudah terdaftar. Silakan gunakan nomor lain.',
            'email.unique' => 'Email ini sudah terdaftar. Silakan gunakan email lain.',
        ]);


        // =========================
        // CREATE USER
        // =========================

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => '62' . $request->phone,
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

                return redirect('/user/home');
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
