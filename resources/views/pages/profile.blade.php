@extends('index')

@section('title', 'Profile')

@section('content')
    <div class="md:w-1/2 mx-auto p-8">
        <div class="bg-white shadow-lg rounded-lg p-8 flex flex-col md:flex-row space-y-8 md:space-y-0 md:space-x-8">
            <div class="flex flex-col justify-center items-center md:items-start">
                <img src="{{ asset('image/avatar-15.png') }}" alt="User Avatar"
                    class="md:w-48 w-28 rounded-full border-4 border-gray-200 shadow-lg">
            </div>
            <form class="flex-1" method="POST" action="{{ route('profile.update') }}" id="form">
                @csrf
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Profil Pengguna</h3>
                <div class="space-y-4">
                    <div class="name">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 ">Nama</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md ">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                                </svg>
                            </span>
                            <input type="text" id="name" value="{{ $user->name }}" name="name"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  "
                                placeholder="">
                        </div>
                        @error('name')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="email">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 ">
                            Email</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 16">
                                    <path
                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                    <path
                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                </svg>
                            </div>
                            <input type="text" id="email" value="{{ $user->email }}" name="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  "
                                placeholder=" ">
                        </div>
                        @error('email')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="phone_number">
                        <label for="nomor_tlp" class="block mb-2 text-sm font-medium text-gray-900 ">Nomor Telepon</label>
                        <div class="flex">
                            <span
                                class="inline-flex items-center px-2 text-sm text-gray-900 bg-gray-200 border rounded-e-0 border-gray-300 border-e-0 rounded-s-md ">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </span>
                            <input type="tel" id="nomor_tlp" name="nomor_tlp" value="{{ $user->nomor_tlp }}"
                                class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  "
                                placeholder=" ">
                        </div>
                        @error('nomor_tlp')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="new_password">
                        <label for="new_password" class="block mb-2 text-sm font-medium text-gray-900 ">New Password</label>
                        <div class="flex">
                            <input type="password" id="new_password" name="new_password"
                                class="rounded-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  "
                                placeholder=" ">
                        </div>
                        <span>
                            <small class="text-gray-500">Kosongkan jika tidak ingin mengganti password</small>
                        </span>
                        @error('new_password')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" id="update"
                        class="hidden bg-green-600 px-6 py-2 text-white rounded-lg hover:bg-green-700 transition duration-300 w-full">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('update').addEventListener('click', function() {
            let name = document.getElementById('name').value;
            let email = document.getElementById('email').value;
            let phone = document.getElementById('nomor_tlp').value;
            let password = document.getElementById('new_password').value;

            if (name === '' || email === '' || phone === '') {
                Swal.fire({
                    title: "Peringatan!",
                    text: "Semua kolom harus diisi",
                    icon: "warning",
                    confirmButtonText: "OK",
                    showCloseButton: true,
                });
            }
        });
        document.getElementById('name').addEventListener('input', function() {
            document.getElementById('update').classList.remove('hidden');
        });
        document.getElementById('email').addEventListener('input', function() {
            document.getElementById('update').classList.remove('hidden');
        });
        document.getElementById('nomor_tlp').addEventListener('input', function() {
            document.getElementById('update').classList.remove('hidden');
        });
        document.getElementById('new_password').addEventListener('input', function() {
            document.getElementById('update').classList.remove('hidden');
        });
    </script>
@endpush
