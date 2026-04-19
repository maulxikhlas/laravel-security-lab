<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Jalur Insecure (Rentan SQL Injection)
     */
    public function insecureLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        // BAHAYA: Input user langsung digabung ke string query!
        // Hacker bisa memanipulasi string ini.
        $user = DB::select("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

        if (count($user) > 0) {
            return "<h1>Login Berhasil (Insecure)!</h1> Selamat datang: " . $user[0]->email;
        }

        return back()->with('error', 'Login Gagal! Check query-nya lagi.');
    }

    /**
     * Jalur Secure (Best Practice Laravel)
     */
    // ... kode yang sudah ada ...

    // INI JALUR AMAN (Tambahkan ini kalau belum ada)
    public function secureLogin(Request $request)
    {
        // Laravel otomatis membersihkan input di sini (SQLi tidak mempan)
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return "<h1>Login Berhasil (Secure)!</h1> Halo: " . Auth::user()->email;
        }

        return "<h1>Login Gagal!</h1> SQL Injection gagal di jalur ini.";
    }
}