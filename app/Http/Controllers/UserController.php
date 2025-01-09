<?php

namespace App\Http\Controllers;

use App\Models\Alurpendaftaran;
use App\Models\Home;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\UserProfile;
use App\Models\Faq;
use App\Models\Ketentuan;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use App\Models\Persyaratan;

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

        // split heading
        $heading = $home->heading;
        $words = explode(' ', $heading);
        $lastWord = array_pop($words);
        $remainingText = implode(' ', $words); 

        // status pendaftaran
        $currentDate = Carbon::now();
        $status = 'closed';
        if ($currentDate->gt(Carbon::parse($home->open_pendaftaran)) && $currentDate->lt(Carbon::parse($home->exp_pendaftaran))) {
            $status = 'open';
        }
        return view('pages.landing', compact('userCount', 'home', 'lastWord', 'remainingText', 'status', 'jadwal','faq','ketentuan','persyaratan'));
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function generatePdf($id){
        $user = UserProfile::findOrFail($id);
        // dd($user);
        // $pdf = Pdf::loadView('pdf.user', compact('user'));
        // return $pdf->download('user-'.$user->user_id.'.pdf');
        return view('pdf.user', compact('user'));
    }

    public function register()
    {
        return view('auth.register');
    }

    public function countdown()
    {     
        $home = Home::first();
        // dd(Home::first()->open_pendaftaran);
        return view('pages.countdown', compact('home'));
    }
}
