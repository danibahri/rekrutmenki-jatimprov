@extends('auth.app')

@section('title', 'Login')

@section('content')
    <div class="m-4 sm:m-0 md:bg-transparent md:max-w-screen-lg md:mx-auto">
        <form class="relative max-w-sm mx-auto p-5 mt-6 bg-white sm:my-20 rounded-lg shadow-md" method="POST"
            action="{{ route('login.submit') }}">
            @csrf
            <div class="logo">
                <img src="{{ url('/image/sumekar.png') }}" alt="logo" class="w-20 mx-auto" />
            </div>
            <h1 class="font-semibold text-lg mt-2 mb-5 w-fit mx-auto">Masuk</h1>
            <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="floating_email"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_email"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Email
                    address</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="floating_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Password</label>
            </div>

            @error('email')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50" role="alert">
                    <span class="font-medium">Peringatan!</span> {{ $message }}
                </div>
            @enderror

            {{-- remember --}}
            <div class="relative flex items-center justify-between mb-5">
                <label for="remember" class="text-sm text-gray-500">Ingat saya</label>
                <input type="checkbox" name="remember" id="remember"
                    class="text-blue-700 rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300" />
            </div>

            <div class="relative flex justify-between flex-col md:flex-row md:items-start">
                <a href="{{ route('forgot.password') }}"
                    class="text-blue-700 text-sm font-medium w-fit hover:underline focus:outline-none my-5 md:mb-0">Lupa
                    sandi?</a>
                <button type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
            </div>

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
