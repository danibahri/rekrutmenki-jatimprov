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
        // dd($request->terms);
        if($request->terms == null){
            return back()->withErrors([
                'terms' => 'Anda harus menyetujui syarat dan ketentuan'
            ]);
        }
        
        $messages = [
            'full_name.required' => 'Nama lengkap wajib diisi',
            'full_name.max' => 'Nama lengkap maksimal 70 karakter',
            'nik.required' => 'NIK wajib diisi',
            'nik.digits' => 'NIK harus 16 digit',
            'nik.unique' => 'NIK sudah terdaftar',
            'kk.required' => 'Nomor KK wajib diisi',
            'kk.digits' => 'Nomor KK harus 16 digit',
            'birth_place.required' => 'Tempat lahir wajib diisi',
            'birth_date.required' => 'Tanggal lahir wajib diisi',
            'birth_date.date' => 'Format tanggal lahir tidak valid',
            'birth_date.before' => 'Umur minimal 35 tahun',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'religion.required' => 'Agama wajib dipilih',
            'marital_status.required' => 'Status perkawinan wajib dipilih',
            'address.required' => 'Alamat wajib diisi',
            'education.required' => 'Pendidikan terakhir wajib dipilih',
            'registrasion_latter.required' => 'Surat pendaftaran wajib diunggah',
            'registrasion_latter.mimes' => 'Format file harus PDF',
            'registrasion_latter.max' => 'Ukuran file maksimal 5MB',
            'ijazah.required' => 'Ijazah wajib diunggah',
            'ijazah.mimes' => 'Format file harus PDF',
            'ijazah.max' => 'Ukuran file maksimal 5MB',
            'pas_foto.required' => 'Pas foto wajib diunggah',
            'pas_foto.mimes' => 'Format file harus JPG/JPEG/PNG',
            'pas_foto.max' => 'Ukuran file maksimal 5MB',
            'cv.required' => 'CV wajib diunggah',
            'cv.mimes' => 'Format file harus PDF',
            'cv.max' => 'Ukuran file maksimal 5MB',
            'health_letter.required' => 'Surat kesehatan wajib diunggah',
            'health_letter.mimes' => 'Format file harus PDF',
            'health_letter.max' => 'Ukuran file maksimal 5MB',
            'skck.required' => 'SKCK wajib diunggah',
            'skck.mimes' => 'Format file harus PDF',
            'skck.max' => 'Ukuran file maksimal 5MB',
            'non_criminal_statement.required' => 'Surat pernyataan tidak pernah dipidana wajib diunggah',
            'non_criminal_statement.mimes' => 'Format file harus PDF',
            'non_criminal_statement.max' => 'Ukuran file maksimal 5MB',
            'non_party_statement.required' => 'Surat pernyataan tidak anggota parpol wajib diunggah',
            'non_party_statement.mimes' => 'Format file harus PDF',
            'non_party_statement.max' => 'Ukuran file maksimal 5MB',
            'release_statement.required' => 'Surat pernyataan melepas jabatan wajib diunggah',
            'release_statement.mimes' => 'Format file harus PDF',
            'release_statement.max' => 'Ukuran file maksimal 5MB',
            'fulltime_statement.required' => 'Surat pernyataan bekerja sepenuh waktu wajib diunggah',
            'fulltime_statement.mimes' => 'Format file harus PDF',
            'fulltime_statement.max' => 'Ukuran file maksimal 5MB',
        ];

        // Calculate minimum birth date (35 years ago)
        $minBirthDate = now()->subYears(34)->format('Y-m-d');

        $validated = $request->validate([
            'full_name' => 'required|string|max:70',
            'nik' => 'required|digits:16|unique:user_profile',
            'kk' => 'required|digits:16',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date|before:'.$minBirthDate,
            'gender' => 'required|in:L,P',
            'religion' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'marital_status' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'address' => 'required|string',
            'education' => 'required|in:S1,S2,S3',
            'registrasion_latter' => 'required|file|mimes:pdf|max:5120',
            'ijazah' => 'required|file|mimes:pdf|max:5120',
            'pas_foto' => 'required|file|mimes:jpg,jpeg,png|max:5120',
            'cv' => 'required|file|mimes:pdf|max:5120',
            'health_letter' => 'required|file|mimes:pdf|max:5120',
            'skck' => 'required|file|mimes:pdf|max:5120',
            'non_criminal_statement' => 'required|file|mimes:pdf|max:5120',
            'non_party_statement' => 'required|file|mimes:pdf|max:5120',
            'release_statement' => 'required|file|mimes:pdf|max:5120',
            'fulltime_statement' => 'required|file|mimes:pdf|max:5120',
            'supervisor_permission' => 'nullable|file|mimes:pdf|max:5120',
            'performance_letter' => 'nullable|file|mimes:pdf|max:5120',
        ], $messages);

        try {
            DB::beginTransaction();

            // Handle file uploads
            $files = [
                'registrasion_latter', 'ijazah', 'pas_foto', 'cv', 'health_letter',
                'skck', 'non_criminal_statement', 'non_party_statement',
                'release_statement', 'fulltime_statement', 'supervisor_permission',
                'performance_letter'
            ];

            $filesPaths = [];
            foreach ($files as $file) {
                if ($request->hasFile($file)) {
                    $filesPaths[$file] = $request->file($file)->store(
                        $file.'s',
                        'private'
                    );
                }
            }

            // Create profile
            $profile = UserProfile::create([
                'user_id' => Auth::id(),
                'full_name' => $validated['full_name'],
                'nik' => $validated['nik'],
                'kk' => $validated['kk'],
                'birth_place' => $validated['birth_place'],
                'birth_date' => $validated['birth_date'],
                'gender' => $validated['gender'],
                'religion' => $validated['religion'],
                'marital_status' => $validated['marital_status'],
                'address' => $validated['address'],
                'education' => $validated['education'],
                'registrasion_latter' => $filesPaths['registrasion_latter'] ?? null,
                'ijazah' => $filesPaths['ijazah'] ?? null,
                'pas_foto' => $filesPaths['pas_foto'] ?? null,
                'cv' => $filesPaths['cv'] ?? null,
                'health_letter' => $filesPaths['health_letter'] ?? null,
                'skck' => $filesPaths['skck'] ?? null,
                'non_criminal_statement' => $filesPaths['non_criminal_statement'] ?? null,
                'non_party_statement' => $filesPaths['non_party_statement'] ?? null,
                'release_statement' => $filesPaths['release_statement'] ?? null,
                'fulltime_statement' => $filesPaths['fulltime_statement'] ?? null,
                'supervisor_permission' => $filesPaths['supervisor_permission'] ?? null,
                'performance_letter' => $filesPaths['performance_letter'] ?? null,
            ]);

            DB::commit();

            return redirect()->route('home')->with('success', 'Terima kasih telah mendaftar, Formulir pendaftaran berhasil disimpan');

        } catch (\Exception $e) {
            DB::rollback();
            
            // Delete uploaded files if there's an error
            foreach ($filesPaths as $path) {
                if (Storage::disk('private')->exists($path)) {
                    Storage::disk('private')->delete($path);
                }
            }

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.');
        }
    }
}
