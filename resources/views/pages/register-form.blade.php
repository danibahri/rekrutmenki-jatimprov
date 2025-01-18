@extends('index')

@section('title', 'Form Pendaftaran Komisi Informasi')

@section('content')
    <x-alert />
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <div class="container flex mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6">Registrasi Calon Anggota Komisi Informasi</h2>
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <!-- Data Diri -->
                <div>
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap (Sesuai
                        KTP) <span class="text-red-800">*</span></label>
                    <input type="text" id="full_name" name="full_name" maxlength="70" placeholder="Nama Lengkap"
                        value="{{ old('full_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                    @error('full_name')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIK & KK -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK <span
                                class="text-red-800">*</span></label>
                        <input type="text" id="nik" name="nik" maxlength="16"
                            placeholder="Nomor Induk Kependudukan" value="{{ old('nik') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        @error('nik')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="kk" class="block mb-2 text-sm font-medium text-gray-900">Nomor KK <span
                                class="text-red-800">*</span></label>
                        <input type="text" id="kk" name="kk" maxlength="16"
                            placeholder="Nomor Kartu Keluarga" value="{{ old('kk') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        @error('kk')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Tempat & Tanggal Lahir -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="birth_place" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir <span
                                class="text-red-800">*</span></label>
                        <input type="text" id="birth_place" name="birth_place" placeholder="Tempat Lahir"
                            value="{{ old('birth_place') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        @error('birth_place')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir (Min. 35
                            Tahun) <span class="text-red-800">*</span></label>
                        <input type="date" id="birth_date" name="birth_date" value="{{ old('birth_date') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        @error('birth_date')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Gender, Agama, Status Perkawinan -->
                <div class="grid md:grid-cols-3 gap-4">
                    <div>
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin <span
                                class="text-red-800">*</span></label>
                        <select id="gender" name="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="religion" class="block mb-2 text-sm font-medium text-gray-900">Agama <span
                                class="text-red-800">*</span></label>
                        <select id="religion" name="religion" value="{{ old('religion') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="">Pilih Agama</option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                        @error('religion')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="marital_status" class="block mb-2 text-sm font-medium text-gray-900">Status
                            Perkawinan <span class="text-red-800">*</span></label>
                        <select id="marital_status" name="marital_status" value="{{ old('marital_status') }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="">Pilih Status</option>
                            <option value="Belum Kawin">Belum Kawin</option>
                            <option value="Kawin">Kawin</option>
                            <option value="Cerai Hidup">Cerai Hidup</option>
                            <option value="Cerai Mati">Cerai Mati</option>
                        </select>
                        @error('marital_status')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Pendidikan --}}
                <div>
                    <label for="education" class="block mb-2 text-sm font-medium text-gray-900">Pendidikan
                        Terakhir <span class="text-red-800">*</span></label>
                    <select id="education" name="education"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                        <option value="">Pilih Pendidikan</option>
                        <option value="S1">S1</option>
                        <option value="S2">S2</option>
                        <option value="S3">S3</option>
                    </select>
                    @error('education')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900">Alamat Lengkap <span
                            class="text-red-800">*</span></label>
                    <textarea id="address" name="address" rows="3" placeholder="Alamat sesuai KTP" maxlength="255"
                        value="{{ old('address') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required></textarea>
                    @error('address')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Persyaratan --}}
                <div class="grid md:grid-cols-2 gap-4">
                    @foreach ($persyaratan as $persyaratan)
                        @php
                            $acceptedFileTypes = is_array($persyaratan->accepted_file_types)
                                ? $persyaratan->accepted_file_types
                                : json_decode($persyaratan->accepted_file_types, true);
                            $acceptTypes = implode(',', $acceptedFileTypes);
                        @endphp
                        <div>
                            <label for="persyaratan_{{ $persyaratan->id }}"
                                class="block mb-2 text-sm font-medium text-gray-900">{{ $persyaratan->heading }}
                                @if ($persyaratan->status == 'wajib')
                                    <span class="text-red-800">*</span>
                                @endif
                            </label>
                            <input type="file" id="persyaratan_{{ $persyaratan->id }}"
                                name="persyaratan_{{ $persyaratan->id }}" accept="{{ $acceptTypes }}"
                                {{ $persyaratan->status == 'wajib' ? 'required' : '' }}
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none">
                            @if ($persyaratan->file_path != null)
                                <p class="text-sm mt-1">
                                    <a href="{{ route('download-file', ['type' => 'persyaratan', 'id' => $persyaratan->id]) }}"
                                        class="text-blue-600 hover:underline">(Unduh
                                        Template)</a>
                                </p>
                            @endif
                            @error("persyaratan_$persyaratan->id")
                                <p class="text-red-500 text-xs">{{ $message }}</p>
                            @enderror
                        </div>
                    @endforeach
                </div>

                <div class="flex items-start my-6">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" name="terms" required
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300">
                    </div>
                    <label for="terms" class="ms-2 text-sm font-medium text-gray-900">
                        Saya menyatakan bahwa seluruh informasi dan dokumen yang saya berikan adalah benar dan dapat
                        dipertanggung jawabkan. Saya bersedia mengundurkan diri apabila dikemudian hari ditemukan
                        ketidak benaran dalam dokumen yang saya sampaikan.
                    </label>
                </div>
                @error('terms')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Submit Pendaftaran
                </button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('birth_date').addEventListener('change', function() {
            const birthDate = new Date(this.value);
            const today = new Date();
            let age = today.getFullYear() - birthDate.getFullYear();
            const monthDiff = today.getMonth() - birthDate.getMonth();

            if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < birthDate.getDate())) {
                age--;
            }

            if (age < 35) {
                Swal.fire({
                    title: "Peringatan!",
                    text: "umur anda minimal harus 35 tahun",
                    icon: "warning",
                    confirmButtonText: "OK",
                    showCloseButton: true,
                });
                this.value = '';
            }
        });

        document.getElementById('nik').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);
        });

        document.getElementById('kk').addEventListener('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '').slice(0, 16);
        });
    </script>
@endpush
