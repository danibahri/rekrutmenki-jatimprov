@extends('auth.app')

@section('title', 'Reset Password')

@section('content')
    <div class="m-4 sm:m-0 md:bg-transparent md:max-w-screen-lg md:mx-auto">
        <div class="relative max-w-sm mx-auto p-8 mt-6 bg-white sm:my-20 rounded-lg shadow-md">
            <!-- Logo Header -->
            <div class="logo mb-6">
                <img src="{{ url('/image/sumekar.png') }}" alt="logo" class="w-24 mx-auto" />
            </div>

            <!-- Main Content -->
            <div class="text-center mb-8">
                <h1 class="font-bold text-2xl text-gray-800 mb-2">Reset Password</h1>
                <p class="text-gray-600 mb-6">Kami menerima permintaan untuk mereset password akun Anda</p>

                <!-- Timer Counter -->
                <div class="bg-blue-50 rounded-lg p-4 mb-6">
                    <p class="text-sm text-gray-600 mb-2">Link akan kadaluarsa dalam:</p>
                    <p class="font-mono text-blue-600 font-semibold">30:00 menit</p>
                </div>
            </div>

            <!-- Action Button -->
            <div class="mb-8">
                <a href="{{ route('reset.password', ['token' => $token]) }}"
                    class="block w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white text-center font-medium rounded-lg transition duration-200 ease-in-out transform hover:scale-[1.02]">
                    Reset Password
                </a>
            </div>

            <!-- Security Notice -->
            <div class="text-center text-sm text-gray-600">
                <p class="mb-4">Jika Anda tidak meminta reset password, abaikan email ini atau hubungi kami untuk keamanan
                    akun Anda.</p>

                <div class="border-t pt-4">
                    <p class="font-medium text-gray-800 mb-1">Keamanan Akun</p>
                    <ul class="list-disc text-left pl-4 text-gray-600 space-y-1">
                        <li>Jangan bagikan link ini ke siapapun</li>
                        <li>Pastikan Anda mengakses dari perangkat yang aman</li>
                        <li>Link hanya berlaku untuk satu kali penggunaan</li>
                    </ul>
                </div>
            </div>

            <!-- Footer -->
            <div class="mt-8 pt-4 border-t text-center text-sm text-gray-500">
                <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                <p class="mt-2">
                    Butuh bantuan?
                    <a href="{{ route('home') }}" class="text-blue-600 hover:underline">Hubungi kami</a>
                </p>
            </div>
        </div>
    </div>
@endsection
