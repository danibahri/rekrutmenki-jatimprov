<?php

namespace App\Http\Controllers;

use App\Mail\ResetPasswordMail;
use App\Models\PasswordResetToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

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
            'password' => ['required', 'min:8', 'confirmed'], 
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
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);
        if($request->terms == null){
            return back()->withErrors([
                'terms' => 'Anda harus menyetujui syarat dan ketentuan'
            ]);
        }
        $credentials['password'] = bcrypt($credentials['password']);
    
        User::create($credentials);
        return redirect()->route('home')->with('success', 'Registrasi berhasil');
    }

    // Forgot Password
    public function forgot_password_submit(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'exists:users,email'],
        ], [
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Format email tidak valid',
            'email.exists' => 'Email tidak terdaftar',
        ]);

        $token = bin2hex(random_bytes(32));

        PasswordResetToken::updateOrCreate(
            [
                'email' => $request->email
            ], 
            [
                'token' => $token,
                'created_at' => now(),
            ]
        );
        try {
            Mail::to($request->email)->send(new ResetPasswordMail($token));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal mengirim email reset password. Coba lagi nanti.');
        }
        return back()->with('success', 'Email reset password telah dikirim');
    }

    // Reset Password Form
    public function reset_password($token)
    {
        try {
            $passwordReset = PasswordResetToken::where('token', $token)
                ->where('created_at', '>', now()->subMinutes(30))
                ->first();
    
            if (!$passwordReset) {
                abort(404, 'Token tidak valid atau sudah kadaluarsa');
            }
    
            $userExists = User::where('email', $passwordReset->email)->exists();
            if (!$userExists) {
                $passwordReset->delete(); 
                abort(404, 'Token tidak valid');
            }
    
            return view('auth.reset-password', compact('token'));
    
        } catch (\Exception $e) {
            abort(404, 'Terjadi kesalahan saat memproses token');
        }
    }

    // Reset Password
    public function reset_password_submit(Request $request)
    {
        $request->validate([
            'password' => ['required', 'min:8', 'confirmed'],
            'token' => ['required'],
        ], [
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);
    
        $token = DB::table('password_reset_tokens')
            ->where('token', $request->token)
            ->first();

        if (!$token) {
            return back()->withErrors([
                'token' => 'Token tidak valid'
            ]);
        }
    
        $user = User::where('email', $token->email)->first();
        if (!$user) {
            return back()->withErrors([
                'token' => 'Token tidak valid'
            ]);
        }
    
        try {
            DB::beginTransaction();
            
            $user->forceFill([
                'password' => Hash::make($request->password)
            ])->save();
    
            DB::table('password_reset_tokens')->where('token', $request->token)->delete();
    
            DB::commit();
            return redirect()->route('home')->with('success', 'Password berhasil direset');
        } catch (\Exception $e) {
            DB::rollback();

            return back()->withErrors([
                'error' => 'Terjadi kesalahan saat mereset password'
            ]);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
