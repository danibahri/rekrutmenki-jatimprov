<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;



class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        $remember = $request->has('remember');
    
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login berhasil');
        }

        return back()->withErrors([
            'email' => 'Email dan password yang dimasukkan tidak sesuai.'
        ])->onlyInput('email');
        

    }

    // Register
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required','unique:users'],
            'nomor_tlp' => ['required', 'regex:/^\+62\s\d{3}-\d{4}-\d{4}$/','max:18'], 
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'], 
        ], [
            'name.required' => 'Nama wajib diisi',
            'name.unique' => 'Nama sudah terdaftar',
            'nomor_tlp.required' => 'Nomor telepon wajib diisi',
            'nomor_tlp.max' => 'Nomor telepon maksimal 18 digit',
            'nomor_tlp.regex' => 'Nomor telepon harus menggunakan format Indonesia, dimulai dengan +62 dan terdiri dari 9-13 digit',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'password.required' => 'Password wajib diisi',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
            'password.min' => 'Password minimal 8 karakter',
        ]);
        if($request->terms == null){
            return back()->withErrors([
                'terms' => 'Anda harus menyetujui syarat dan ketentuan'
            ]);
        }
        $credentials['password'] = bcrypt($credentials['password']);
    
        // $user = User::create($credentials);
        User::create($credentials);
        // Auth::login($user);
        return redirect()->route('home')->with('success', 'Registrasi berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect()->route('login');
    }
}
