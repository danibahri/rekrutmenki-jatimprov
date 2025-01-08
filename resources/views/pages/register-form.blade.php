@extends('index')

@section('title', 'Form Pendaftaran')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl font-bold mb-6">Registrasi Data Diri</h2>
            <form action="{{ route('profile.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label for="full_name" class="block mb-2 text-sm font-medium text-gray-900">Nama Lengkap (Sesuai
                        KTP)</label>
                    <input type="text" id="full_name" name="full_name" maxlength="70" placeholder="Nama Lengkap"
                        value="{{ old('full_name') }}"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required>
                </div>
                @error('full_name')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror

                <!-- Tempat & Tanggal Lahir -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="birth_place" class="block mb-2 text-sm font-medium text-gray-900">Tempat Lahir</label>
                        <input type="text" id="birth_place" name="birth_place" placeholder="Tempat Lahir"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    @error('birth_place')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="birth_date" class="block mb-2 text-sm font-medium text-gray-900">Tanggal Lahir</label>
                        <input type="date" id="birth_date" name="birth_date"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    @error('birth_date')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIK & KK -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div>
                        <label for="nik" class="block mb-2 text-sm font-medium text-gray-900">NIK</label>
                        <input type="text" id="nik" name="nik" maxlength="16"
                            placeholder="Nomor Induk Kependudukan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    @error('nik')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="kk_number" class="block mb-2 text-sm font-medium text-gray-900">Nomor KK</label>
                        <input type="text" id="kk_number" name="kk_number" maxlength="16"
                            placeholder="Nomor Kartu Keluarga"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    @error('kk_number')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gender & Agama -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900">Jenis Kelamin</label>
                        <select id="gender" name="gender"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="male">Laki-laki</option>
                            <option value="female">Perempuan</option>
                        </select>
                    </div>
                    @error('gender')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="religion" class="block mb-2 text-sm font-medium text-gray-900">Agama</label>
                        <select id="religion" name="religion"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Buddha">Buddha</option>
                            <option value="Konghucu">Konghucu</option>
                        </select>
                    </div>
                </div>

                <!-- Status & Kewarganegaraan -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="marital_status" class="block mb-2 text-sm font-medium text-gray-900">Status
                            Perkawinan</label>
                        <select id="marital_status" name="marital_status"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                            <option value="single">Belum Kawin</option>
                            <option value="married">Kawin</option>
                            <option value="divorced">Cerai</option>
                            <option value="widowed">Janda</option>
                        </select>
                    </div>
                    <div>
                        <label for="nationality"
                            class="block mb-2 text-sm font-medium text-gray-900">Kewarganegaraan</label>
                        <input type="text" id="nationality" name="nationality" placeholder="Kewarganegaraan"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                            required>
                    </div>
                    @error('nationality')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label for="current_address" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                        Domisili</label>
                    <textarea id="current_address" name="current_address" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required></textarea>
                </div>

                <div>
                    <label for="permanent_address" class="block mb-2 text-sm font-medium text-gray-900">Alamat
                        Asal</label>
                    <textarea id="permanent_address" name="permanent_address" rows="3"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required></textarea>
                </div>

                <!-- Kontak -->
                <div>
                    <label for="phone_number" class="block mb-2 text-sm font-medium text-gray-900">Nomor Telepon</label>
                    <input type="tel" id="phone_number" name="phone_number"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                        required oninput="formatPhoneNumber(this)" onclick="handlePhoneClick(this)"
                        onkeydown="handlePhoneKeydown(event, this)">
                </div>
                @error('phone_number')
                    <p class="text-red-500 text-xs">{{ $message }}</p>
                @enderror

                <!-- Upload Files -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="ktp_scan" class="block mb-2 text-sm font-medium text-gray-900">Scan KTP</label>
                        <input type="file" id="ktp_scan" name="ktp_scan"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept="image/*,.pdf" required>
                    </div>
                    @error('ktp_scan')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                    <div>
                        <label for="kk_scan" class="block mb-2 text-sm font-medium text-gray-900">Scan KK</label>
                        <input type="file" id="kk_scan" name="kk_scan"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
                            accept="image/*,.pdf" required>
                    </div>
                    @error('kk_scan')
                        <p class="text-red-500 text-xs">{{ $message }}</p>
                    @enderror
                </div>

                {{-- terms --}}
                <div class="flex items-start my-5">
                    <div class="flex items-center h-5">
                        <input id="terms" type="checkbox" name="terms" required
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800" />
                    </div>
                    <label for="terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Dengan mengisi
                        dan mengirimkan formulir pendaftaran ini, Anda menyatakan bahwa seluruh informasi yang diberikan
                        adalah benar, akurat, dan lengkap. Anda juga menyetujui <a href="#"
                            class="text-blue-600 hover:underline dark:text-blue-500">syarat dan ketentuan yang
                            berlaku.</a></label>
                </div>
                @error('terms')
                    <p class="text-xs text-red-600">{{ $message }}</p>
                @enderror

                <button type="submit"
                    class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                    Submit
                </button>
            </form>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function formatPhoneNumber(input) {
            // Store cursor position
            let cursorPosition = input.selectionStart;
            let previousLength = input.value.length;

            // Remove non-digit characters except '+'
            let value = input.value.replace(/[^\d+]/g, '');

            // Ensure number starts with +62
            if (!value.startsWith('+62')) {
                value = '+62' + value.replace(/^[+62]*/, '');
                cursorPosition += 3;
            }

            // Remove additional + symbols
            value = value.replace(/(?!^)\+/g, '');

            // Format number
            let formattedNumber = '';
            if (value.length > 0) {
                formattedNumber = value.substring(0, 3);
                let remainingNumbers = value.substring(3);

                if (remainingNumbers.length > 0) {
                    formattedNumber += ' ';
                    formattedNumber += remainingNumbers.substring(0, 3);

                    if (remainingNumbers.length > 3) {
                        formattedNumber += '-';
                        formattedNumber += remainingNumbers.substring(3, 7);

                        if (remainingNumbers.length > 7) {
                            formattedNumber += '-';
                            formattedNumber += remainingNumbers.substring(7, 11);
                        }
                    }
                }
            }

            // Limit length
            if (formattedNumber.length > 18) {
                formattedNumber = formattedNumber.substring(0, 18);
            }

            // Update input value
            input.value = formattedNumber;

            // Adjust cursor position
            let lengthDiff = formattedNumber.length - previousLength;
            cursorPosition = Math.max(3, cursorPosition + lengthDiff);
            input.setSelectionRange(cursorPosition, cursorPosition);
        }

        function handlePhoneClick(input) {
            if (input.selectionStart < 3) {
                input.setSelectionRange(3, 3);
            }
        }

        function handlePhoneKeydown(event, input) {
            if (event.key === 'Backspace' && input.selectionStart <= 4) {
                event.preventDefault();
            }
        }

        // Initialize phone input when DOM is loaded
        document.addEventListener('DOMContentLoaded', function() {
            const phoneInput = document.getElementById('phone_number');

            // Set initial +62 if empty
            if (!phoneInput.value) {
                phoneInput.value = '+62 ';
            }
        });
    </script>
@endpush
