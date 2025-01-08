<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function create()
    {
        $home = Home::first();
        if (UserProfile::where('user_id', Auth::id())->exists()) {
            return redirect()->route('home')->with('error', 'Anda sudah terdaftar');
        }
        return view('pages.register-form', compact('home'));
    }

    public function store(Request $request)
    {
        
        if($request->terms == null){
            return back()->withErrors([
                'terms' => 'Anda harus menyetujui syarat dan ketentuan'
            ]);
        }
        
        $messages = [
            'full_name.required' => 'Nama lengkap wajib diisi',
            'full_name.max' => 'Nama lengkap maksimal 255 karakter',
            'birth_place.required' => 'Tempat lahir wajib diisi',
            'birth_date.required' => 'Tanggal lahir wajib diisi',
            'birth_date.date' => 'Format tanggal lahir tidak valid',
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus 16 digit',
            'nik.unique' => 'NIK sudah terdaftar',
            'kk_number.required' => 'Nomor KK wajib diisi',
            'kk_number.digits' => 'Nomor KK harus 16 digit',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'religion.required' => 'Agama wajib dipilih',
            'marital_status.required' => 'Status perkawinan wajib dipilih',
            'nationality.required' => 'Kewarganegaraan wajib diisi',
            'current_address.required' => 'Alamat domisili wajib diisi',
            'permanent_address.required' => 'Alamat asal wajib diisi',
            'phone_number.required' => 'Nomor telepon wajib diisi',
            'phone_number.regex' => 'Format nomor telepon tidak valid',
            'ktp_scan.required' => 'Scan KTP wajib diunggah',
            'kk_scan.required' => 'Scan KK wajib diunggah',
            'ktp_scan.file' => 'Scan KTP harus berupa file',
            'kk_scan.file' => 'Scan KK harus berupa file',
            'ktp_scan.max' => 'Ukuran file scan KTP maksimal 2MB',
            'kk_scan.max' => 'Ukuran file scan KK maksimal 2MB',
            'ktp_scan.mimes' => 'Format file scan KTP harus jpg, jpeg, png, atau pdf',
            'kk_scan.mimes' => 'Format file scan KK harus jpg, jpeg, png, atau pdf',
        ];

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'birth_place' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'nik' => 'required|digits:16|unique:user_profile,nik', 
            'kk_number' => 'required|digits:16', 
            'gender' => 'required|in:male,female',
            'religion' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'marital_status' => 'required|in:single,married,divorced,widowed',
            'nationality' => 'required|string|max:255',
            'current_address' => 'required|string|max:255',
            'permanent_address' => 'required|string|max:255',
            'phone_number' => [
                'required',
                'regex:/^\+62 \d{3}-\d{4}-\d{4}$/',
                'max:18'
            ],
            'ktp_scan' => 'required|file|max:5048|mimes:jpg,jpeg,png,pdf',
            'kk_scan' => 'required|file|max:5048|mimes:jpg,jpeg,png,pdf'
        ], $messages);

        try {
            DB::beginTransaction();

            // Generate unique filenames
            $ktpPath = $request->file('ktp_scan')->storeAs(
                'ktp_scans',
                'ktp_' . Auth::id() . '_' . time() . '.' . $request->file('ktp_scan')->extension(),
                'private'
            );

            $kkPath = $request->file('kk_scan')->storeAs(
                'kk_scans',
                'kk_' . Auth::id() . '_' . time() . '.' . $request->file('kk_scan')->extension(),
                'private'
            );

            // Create profile
            $profile = UserProfile::create([
                'user_id' => Auth::id(),
                'full_name' => $validated['full_name'],
                'birth_place' => $validated['birth_place'],
                'birth_date' => $validated['birth_date'],
                'nik' => $validated['nik'],
                'kk_number' => $validated['kk_number'],
                'gender' => $validated['gender'],
                'religion' => $validated['religion'],
                'marital_status' => $validated['marital_status'],
                'nationality' => $validated['nationality'],
                'current_address' => $validated['current_address'],
                'permanent_address' => $validated['permanent_address'],
                'phone_number' => $validated['phone_number'],
                'ktp_scan_path' => $ktpPath,
                'kk_scan_path' => $kkPath
            ]);

            DB::commit();

            return redirect()->route('home')->with('success', 'Terima kasih telah mendaftar, Formulir pendaftaran berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollback();
            
            // Hapus file yang sudah terupload jika ada error
            if (isset($ktpPath) && Storage::disk('private')->exists($ktpPath)) {
                Storage::disk('private')->delete($ktpPath);
            }
            if (isset($kkPath) && Storage::disk('private')->exists($kkPath)) {
                Storage::disk('private')->delete($kkPath);
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }
}
