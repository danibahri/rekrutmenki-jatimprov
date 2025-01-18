@extends('auth.app')

@section('title', 'Lupa Sandi')

@section('content')
    <x-alert />
    <div class="m-4 sm:m-0 md:bg-transparent md:max-w-screen-lg md:mx-auto">
        <form class="relative max-w-sm mx-auto p-5 mt-6 bg-white sm:my-20 rounded-lg shadow-md" method="POST"
            action="{{ route('forgot.password.submit') }}">
            @csrf
            <div class="logo">
                <img src="{{ url('/image/sumekar.png') }}" alt="logo" class="w-20 mx-auto" />
            </div>
            <h1 class="font-semibold text-lg mt-2 mb-5 w-fit mx-auto">Lupa Sandi</h1>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="floating_email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                    address</label>
            </div>
            @error('email')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <span class="font-medium">Peringatan!</span> {{ $message }}
                </div>
            @enderror
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                <span class="font-medium">Peringatan!</span> Masukkan Email yang terdaftar.
            </div>
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm md:w-full w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            <div class="relative">
                <p class="text-center text-sm mt-5">Belum punya akun? <a href="{{ route('register') }}"
                        class="text-blue-700 font-medium hover:underline">Daftar</a></p>
            </div>
            <div class="absolute left-0 mt-10 w-full bg-white p-5 rounded-lg shadow-md">
                <p>Butuh bantuan ?

                    <a href="{{ route('home') }}"
                        class="text-blue-700 text-sm font-medium w-fit hover:underline focus:outline-none my-5 md:mb-0">Kembali
                        ke beranda</a>
                </p>
            </div>
        </form>
    </div>
@endsection
