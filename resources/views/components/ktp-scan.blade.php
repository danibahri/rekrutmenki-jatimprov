@php
    $filePath = Storage::disk('private')->url($getRecord()->ktp_scan_path);
    $extension = pathinfo($filePath, PATHINFO_EXTENSION);
    $isImage = in_array(strtolower($extension), ['jpg', 'jpeg', 'png']);
@endphp
@if ($isImage)
    <!-- Jika file adalah gambar -->
    <a href="{{ $filePath }}" target="_blank" class="text-sm hover:text-blue-700 underline">
        Lihat
    </a>
@else
    <!-- Jika file adalah dokumen -->
    <a href="{{ $filePath }}" download class="text-sm hover:text-blue-700 underline">
        Download
    </a>
@endif
