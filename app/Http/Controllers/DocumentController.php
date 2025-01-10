<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Gate;




class DocumentController extends Controller
{
    public function viewDocument($type, $id)
    {
        $profile = UserProfile::findOrFail($id);
        
        $allowedTypes = [
            'registrasion_latter', 'ijazah', 'pas_foto', 'cv', 
            'health_letter', 'skck', 'non_criminal_statement',
            'non_party_statement', 'release_statement', 
            'fulltime_statement', 'supervisor_permission',
            'performance_letter'
        ];

        if (!in_array($type, $allowedTypes)) {
            abort(404);
        }

        $path = $profile->$type;
        
        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return response()->file(storage_path('app/private/' . $path));
    }

    public function download($type, $id)
    {
        $profile = UserProfile::findOrFail($id);
        
        $allowedTypes = [
            'registrasion_latter', 'ijazah', 'pas_foto', 'cv', 
            'health_letter', 'skck', 'non_criminal_statement',
            'non_party_statement', 'release_statement', 
            'fulltime_statement', 'supervisor_permission',
            'performance_letter'
        ];

        if (!in_array($type, $allowedTypes)) {
            abort(404);
        }

        $path = $profile->$type;
        
        if (!Storage::disk('private')->exists($path)) {
            abort(404);
        }

        return response()->download(storage_path('app/private/' . $path));
    }
}
