<?php

namespace App\Http\Controllers;

use App\Models\Alurpendaftaran;
use App\Models\Home;
use App\Models\Faq;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    public function show()
    {
        $userCount = User::where('role', 'user')->count();
        $home = Home::first();
        $jadwal = Alurpendaftaran::all();
        $faq = Faq::all();

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
        return view('pages.landing', compact('userCount', 'home', 'lastWord', 'remainingText', 'status', 'jadwal','faq'));
    }

    public function loginForm()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }
}
