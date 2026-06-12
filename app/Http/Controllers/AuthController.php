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
            'name' => 'required|string|min:3|max:32',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => [
                'required',
                'numeric',
                'digits_between:9,15'
            ],
            'password' => 'required|min:8|max:50|confirmed'
        ],[
            'name.required' => 'Nama wajib diisi.',
            'name.min' => 'Nama minimal 3 karakter.',
            'name.max' => 'Nama maksimal 32 karakter.',

            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email terlalu panjang.',
            'email.unique' => 'Email sudah digunakan.',

            'phone.required' => 'Nomor HP wajib diisi.',
            'phone.numeric' => 'Nomor HP hanya boleh berisi angka.',
            'phone.digits_between' => 'Nomor HP harus terdiri dari 12 sampai 15 digit setelah +62.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.max' => 'Password maksimal 50 karakter.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
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
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:8|max:50',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.max' => 'Email terlalu panjang.',

            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
            'password.max' => 'Password maksimal 50 karakter.',
        ]);

        if (!Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {

            return back()
                ->withInput()
                ->with('error', 'Email atau password salah.');
        }

        $request->session()->regenerate();

        return redirect('/user/home')
            ->with('success', 'Login berhasil.');
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