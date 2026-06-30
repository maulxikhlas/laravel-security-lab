<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // WARNING: VULNERABLE TO SQL INJECTION
    public function insecureLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $user = DB::select("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

        if (count($user) > 0) {
            $userData = $user[0];
            $laravelUser = \App\Models\User::where('email', $userData->email)->first();
            if ($laravelUser) {
                \Illuminate\Support\Facades\Auth::login($laravelUser);
            }

            // Deteksi jika login berhasil menggunakan manipulasi SQL Injection
            if (str_contains($email, "'") || str_contains($email, "OR") || str_contains($email, "or") || str_contains($password, "'")) {
                session(['sqli_detected' => true]);
            } else {
                session(['sqli_detected' => false]);
            }
            
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'ACCESS DENIED: Credentials Invalid (Insecure Path).');
    }

    // SECURE: Uses Parameter Binding
    public function secureLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        // Mengambil data user berdasarkan email menggunakan Parameter Binding agar aman dari SQL Injection
        $users = DB::select("SELECT * FROM users WHERE email = ?", [$email]);

        if (count($users) > 0) {
            $userData = $users[0];
            // Verifikasi password yang di-hash menggunakan Hash::check
            if (\Illuminate\Support\Facades\Hash::check($password, $userData->password)) {
                // Memulai session user menggunakan ID
                \Illuminate\Support\Facades\Auth::loginUsingId($userData->id);
                
                // Pastikan status deteksi dinonaktifkan untuk jalur aman
                session(['sqli_detected' => false]);
                
                return redirect()->route('dashboard');
            }
        }

        return back()->with('error', 'ACCESS DENIED: Credentials Invalid.');
    }
}