<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman registrasi.
     */
    public function register(Request $request)
    {
        return view('auth.register');
    }

    /**
     * Menyimpan data registrasi baru.
     */
    public function store(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:250',
            'email' => 'required|email|max:250|unique:users,email',
            'password' => 'required|min:8' // Ganti 'max' menjadi 'min' untuk panjang minimal password
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        $request->session()->regenerate();

        return redirect()->route('auth.dashboard')
            ->withSuccess('Anda Telah Registrasi dan Login!');
    }

    /**
     * Menampilkan halaman login.
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Proses autentikasi pengguna.
     */
    public function authentication(Request $request)
    {
        // Validasi form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Proses autentikasi
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('auth.dashboard');
        }

        // Jika proses autentikasi gagal, redirect ke halaman login
        return back()->withErrors([
            'email' => 'Email Tidak Ditemukan',
        ])->withInput('email');
    }

    /**
     * Menampilkan halaman dashboard.
     */
    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }
        return redirect()->route('auth.login');
    }

    /**
     * Logout pengguna.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login');
    }
}
