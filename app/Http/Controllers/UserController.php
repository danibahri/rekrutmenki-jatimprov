<?php

namespace App\Http\Controllers;

use App\Models\Alurpendaftaran;
use App\Models\Home;
use App\Models\UserProfile;
use App\Models\Faq;
use App\Models\Ketentuan;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Persyaratan;
use App\Models\PasswordResetToken;
use App\Models\Pengumuman;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function show()
    {
        $userCount = User::where('role', 'user')->count();
        $home = Home::first();
        $jadwal = Alurpendaftaran::all();
        $faq = Faq::all();
        $ketentuan = Ketentuan::all();
        $persyaratan = Persyaratan::all();
        $pengumuman = Pengumuman::all();

        $heading = $home->heading;
        $words = explode(' ', $heading);
        $lastWord = array_pop($words);
        $remainingText = implode(' ', $words); 

        $currentDate = Carbon::now();
        $status = 'closed';
        if ($currentDate->gt(Carbon::parse($home->open_pendaftaran)) && $currentDate->lt(Carbon::parse($home->exp_pendaftaran))) {
            $status = 'open';
        }
        return view('pages.landing', compact('userCount', 'home', 'lastWord', 'remainingText', 'status', 'jadwal','faq','ketentuan','persyaratan', 'pengumuman'));
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function forgot_password()
    {
        return view('auth.forgot-password');
    }

    public function downloadFile($type, $id)
    {
        if (!in_array($type, ['pengumuman', 'persyaratan', 'ketentuan'])) {
            abort(404, 'Tipe file tidak valid');
        }

        $model = match ($type) {
            'pengumuman' => Pengumuman::class,
            'persyaratan' => Persyaratan::class,
            'ketentuan' => Ketentuan::class,
            default => abort(404, 'Tipe file tidak valid'),
        };

        try {
            $file = $model::findOrFail($id);
            
            if (!Storage::disk('public')->exists($file->file_path)) {
                abort(404, 'File tidak ditemukan');
            }
            
            $path = storage_path('app/public/' . $file->file_path);
            $fileName = basename($file->file_path);
            
            return response()->download($path, $fileName);
        } catch (\Exception $e) {
            abort(404, 'File tidak ditemukan');
        }
    }
    
    
    public function register()
    {
        return view('auth.register');
    }

    public function countdown()
    {     
        $home = Home::first();
        return view('pages.countdown', compact('home'));
    }
}
