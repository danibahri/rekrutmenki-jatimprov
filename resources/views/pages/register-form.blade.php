@extends('index')

@section('title', 'Form Pendaftaran Komisi Informasi')

@section('content')
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
                            placeholder="Nomor Induk Kependudukan"
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
                            placeholder="Nomor Kartu Keluarga"
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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                        @error('birth_place')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir (Min. 35
                            Tahun) <span class="text-red-800">*</span></label>
                        <input type="date" id="birth_date" name="birth_date"
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

                <div>
                    <label for="registrasion_latter" class="block mb-2 text-sm font-medium text-gray-900">Surat
                        Pendaftaran
                        Bermaterai <span class="text-red-800">*</span></label>
                    <input type="file" id="registrasion_latter" name="registrasion_latter"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                        accept=".pdf" required>
                    @error('registrasion_latter')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Pendidikan -->
                <div class="grid md:grid-cols-2 gap-4">
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
                    <div>
                        <label for="ijazah" class="block mb-2 text-sm font-medium text-gray-900">Ijazah Terakhir <span
                                class="text-red-800">*</span></label>
                        <input type="file" id="ijazah" name="ijazah"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        @error('ijazah')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Dokumen Wajib -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="pas_foto" class="block mb-2 text-sm font-medium text-gray-900">Pas Foto Berwarna 4x6
                            <span class="text-red-800">*</span>
                        </label>
                        <input type="file" id="pas_foto" name="pas_foto"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".jpg,.jpeg,.png" required>
                        @error('pas_foto')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Riwayat Hidup -->
                    <div>
                        <label for="cv" class="block mb-2 text-sm font-medium text-gray-900">Daftar Riwayat
                            Hidup <span class="text-red-800">*</span></label>
                        <input type="file" id="cv" name="cv"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        @error('cv')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Surat Keterangan -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="health_letter" class="block mb-2 text-sm font-medium text-gray-900">Surat Keterangan
                            Sehat & Bebas Narkoba <span class="text-red-800">*</span></label>
                        <input type="file" id="health_letter" name="health_letter"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        <span class="text-red-500 text-sm">Harus dikeluarkan oleh rumah sakit pemerintah</span>
                        @error('health_letter')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="skck" class="block mb-2 text-sm font-medium text-gray-900">SKCK <span
                                class="text-red-800">*</span></label>
                        <input type="file" id="skck" name="skck"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        @error('skck')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Surat Pernyataan -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="non_criminal_statement" class="block mb-2 text-sm font-medium text-gray-900">Surat
                            Pernyataan Tidak Pernah Dipidana <span class="text-red-800">*</span></label>
                        <input type="file" id="non_criminal_statement" name="non_criminal_statement"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        @error('non_criminal_statement')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="non_party_statement" class="block mb-2 text-sm font-medium text-gray-900">Surat
                            Pernyataan Tidak Anggota Parpol <span class="text-red-800">*</span></label>
                        <input type="file" id="non_party_statement" name="non_party_statement"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        @error('non_party_statement')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="release_statement" class="block mb-2 text-sm font-medium text-gray-900">Surat
                            Pernyataan Melepas Jabatan <span class="text-red-800">*</span></label>
                        <input type="file" id="release_statement" name="release_statement"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        @error('release_statement')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="fulltime_statement" class="block mb-2 text-sm font-medium text-gray-900">Surat
                            Pernyataan Bekerja Sepenuh Waktu <span class="text-red-800">*</span></label>
                        <input type="file" id="fulltime_statement" name="fulltime_statement"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept=".pdf" required>
                        @error('fulltime_statement')
                            <p class="text-red-500 text-xs">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <!-- Dokumen ASN (optional) -->
                <div class="border-t pt-4">
                    <h3 class="text-lg font-semibold mb-4">Dokumen Tambahan (Khusus ASN)</h3>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label for="supervisor_permission" class="block mb-2 text-sm font-medium text-gray-900">Izin
                                Atasan Langsung</label>
                            <input type="file" id="supervisor_permission" name="supervisor_permission"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                accept=".pdf">
                        </div>
                        <div>
                            <label for="performance_letter" class="block mb-2 text-sm font-medium text-gray-900">Penilaian
                                Kinerja 2 Tahun</label>
                            <input type="file" id="performance_letter" name="performance_letter"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                                accept=".pdf">
                        </div>
                    </div>
                </div>

                <!-- Pernyataan dan Submit -->
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
                alert('Usia minimal adalah 35 tahun');
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
    <script>
        function validateFileSize(inputId, maxSize) {
            const fileInput = document.getElementById(inputId);
            fileInput.addEventListener('change', function() {
                const file = fileInput.files[0];
                if (file && file.size > maxSize) {
                    alert(`File terlalu besar. Maksimal ukuran file adalah 5MB.`);
                    fileInput.value = '';
                }
            });
        }

        const maxFileSize = 5 * 1024 * 1024;
        validateFileSize('registrasion_latter', maxFileSize);
        validateFileSize('ijazah', maxFileSize);
        validateFileSize('pas_foto', maxFileSize);
        validateFileSize('cv', maxFileSize);
        validateFileSize('health_letter', maxFileSize);
        validateFileSize('skck', maxFileSize);
        validateFileSize('non_criminal_statement', maxFileSize);
        validateFileSize('non_party_statement', maxFileSize);
        validateFileSize('release_statement', maxFileSize);
        validateFileSize('fulltime_statement', maxFileSize);
        validateFileSize('supervisor_permission', maxFileSize);
        validateFileSize('performance_letter', maxFileSize);
    </script>
@endpush
