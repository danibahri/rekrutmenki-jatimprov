<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Home;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\Persyaratan;
use Illuminate\Support\Str;

class UserProfileController extends Controller
{
    public function create()
    {
        $home = Home::first();
        $persyaratan = Persyaratan::all();
        if (UserProfile::where('user_id', Auth::id())->exists()) {
            return redirect()->route('home')->with('success', 'Anda sudah terdaftar');
        }
        return view('pages.register-form', compact('home', 'persyaratan'));
    }

    public function store(Request $request)
    {
        $filePathsToDelete = [];
        $persyaratan = Persyaratan::all();
        $minBirthDate = now()->subYears(35)->format('Y-m-d');
        
        $rules = [
            'full_name' => 'required|string|max:70',
            'nik' => 'required|digits:16|unique:user_profile',
            'kk' => 'required|digits:16',
            'birth_place' => 'required|string',
            'birth_date' => 'required|date|before:' . $minBirthDate,
            'gender' => 'required|in:L,P',
            'religion' => 'required|in:Islam,Kristen,Katolik,Hindu,Buddha,Konghucu',
            'marital_status' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'education' => 'required|in:S1,S2,S3',
            'address' => 'required|string|max:255',
            'terms' => 'required|accepted',
        ];
    
        foreach ($persyaratan as $p) {
            $acceptedFileTypes = is_array($p->accepted_file_types) 
                ? $p->accepted_file_types 
                : json_decode($p->accepted_file_types, true);
            $mimeTypes = [];
            foreach ($acceptedFileTypes as $type) {
                switch ($type) {
                    case '.pdf':
                        $mimeTypes[] = 'pdf';
                        break;
                    case '.jpg':
                    case '.jpeg':
                        $mimeTypes[] = 'jpeg';
                        break;
                    case '.png':
                        $mimeTypes[] = 'png';
                        break;
                }
            }
        
            $validationRule = 'file|mimes:' . str_replace('/', '', implode(',', $mimeTypes)) . '|max:' . $p->max_size;
            $rules['persyaratan_' . $p->id] = $p->status === 'wajib' ? "required|{$validationRule}" : $validationRule;
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
            'birth_date.before' => 'Umur minimal 35 tahun',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'religion.required' => 'Agama wajib dipilih',
            'marital_status.required' => 'Status perkawinan wajib dipilih',
            'education.required' => 'Pendidikan terakhir wajib dipilih',
            'address.required' => 'Alamat wajib diisi',
            'address.max' => 'Alamat maksimal 255 karakter',
            'terms.required' => 'Anda harus menyetujui pernyataan',
            'terms.accepted' => 'Anda harus menyetujui pernyataan',
        ];
    
        foreach ($persyaratan as $p) {
            $messages['persyaratan_' . $p->id . '.required'] = "Dokumen {$p->heading} wajib diunggah";
            $messages['persyaratan_' . $p->id . '.file'] = "Dokumen {$p->heading} harus berupa file";
            $messages['persyaratan_' . $p->id . '.mimes'] = "Dokumen {$p->heading} harus berupa file " . implode(', ', $p->accepted_file_types);
            $messages['persyaratan_' . $p->id . '.max'] = "Dokumen {$p->heading} maksimal " . ($p->max_size / 1024) . "MB"; // Convert KB to MB for display
        }
        $validated = $request->validate($rules, $messages);
            
        try {
            DB::beginTransaction();
            $userProfile = UserProfile::create([
                'user_id' => Auth::id(),
                'full_name' => $validated['full_name'],
                'nik' => $validated['nik'],
                'kk' => $validated['kk'],
                'birth_place' => $validated['birth_place'],
                'birth_date' => $validated['birth_date'],
                'gender' => $validated['gender'],
                'religion' => $validated['religion'],
                'marital_status' => $validated['marital_status'],
                'education' => $validated['education'],
                'address' => $validated['address'],
            ]);
    
            foreach ($persyaratan as $p) {
                if ($request->hasFile('persyaratan_' . $p->id)) {
                    $file = $request->file('persyaratan_' . $p->id);
                    $filename = time() . '_' . $p->id . '_' . Auth::id() . '_' . $file->getClientOriginalName();
                    $folderPath = 'persyaratan/' . Str::slug($p->heading);
                    $path = Storage::disk('private')->putFileAs(
                        $folderPath,
                        $file,
                        $filename
                    );
            
                    $filePathsToDelete[] = $path;
                    $userProfile->persyaratans()->attach($p->id, [
                        'file_path_user' => $path
                    ]);
                }
            }
            
            DB::commit();
            return redirect()->route('home')->with('success', 'Profil dan dokumen persyaratan berhasil disimpan');
        
        } catch (\Exception $e) {
            DB::rollBack();
            foreach ($filePathsToDelete as $filePath) {
                if (Storage::disk('private')->exists($filePath)) {
                    Storage::disk('private')->delete($filePath);
                }
            }
    
            return redirect()->back()
                ->withInput()
                ->with('error', 'Terjadi kesalahan. Silakan coba lagi.');
        }
    }  
}
