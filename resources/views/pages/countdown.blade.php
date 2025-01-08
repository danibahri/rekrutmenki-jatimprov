@extends('index')

@section('title', 'Countdown')

@section('content')
    <!-- Countdown Container -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 to-purple-100 p-4">
        <div
            class="max-w-md w-full bg-white backdrop-blur-lg bg-opacity-95 shadow-2xl rounded-2xl p-8 text-center border-2 border-blue-200 transition-transform duration-300">
            <h1
                class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent mb-4 animate-fade-in">
                Hitung Mundur</h1>
            <p class="text-sm text-gray-600 mb-8">Pendaftaran dibuka pada</p>
            <div id="countdown" class="grid grid-cols-2 md:grid-cols-4 gap-6 text-blue-700">
                <!-- Days -->
                <div class="transform hover:scale-110 transition-transform duration-200">
                    <div class="bg-gradient-to-b from-blue-50 to-blue-100 rounded-lg p-4 shadow-lg">
                        <span id="days"
                            class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">00</span>
                        <span class="block text-sm font-medium text-gray-600 mt-2">Hari</span>
                    </div>
                </div>
                <!-- Hours -->
                <div class="transform hover:scale-110 transition-transform duration-200">
                    <div class="bg-gradient-to-b from-blue-50 to-blue-100 rounded-lg p-4 shadow-lg">
                        <span id="hours"
                            class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">00</span>
                        <span class="block text-sm font-medium text-gray-600 mt-2">Jam</span>
                    </div>
                </div>
                <!-- Minutes -->
                <div class="transform hover:scale-110 transition-transform duration-200">
                    <div class="bg-gradient-to-b from-blue-50 to-blue-100 rounded-lg p-4 shadow-lg">
                        <span id="minutes"
                            class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">00</span>
                        <span class="block text-sm font-medium text-gray-600 mt-2">Menit</span>
                    </div>
                </div>
                <!-- Seconds -->
                <div class="transform hover:scale-110 transition-transform duration-200">
                    <div class="bg-gradient-to-b from-blue-50 to-blue-100 rounded-lg p-4 shadow-lg">
                        <span id="seconds"
                            class="text-4xl font-extrabold bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">00</span>
                        <span class="block text-sm font-medium text-gray-600 mt-2">Detik</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fade-in 0.8s ease-out;
        }

        @keyframes pulse-subtle {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }
    </style>
@endsection

@push('scripts')
    <script>
        const countdownDate = new Date("{{ $home->open_pendaftaran }}").getTime();
        const expDate = new Date("{{ $home->exp_pendaftaran }}").getTime();

        console.log('Countdown Date:', countdownDate);
        console.log('Expiration Date:', expDate);

        const addLeadingZero = (number) => {
            return number < 10 ? `0${number}` : number;
        };

        const interval = setInterval(() => {
            const now = new Date().getTime();
            const distance = countdownDate - now;
            const expDistance = expDate - now;

            // Jika sudah melewati tanggal expired
            if (expDistance < 0) {
                clearInterval(interval);
                document.getElementById("countdown").innerHTML =
                    `<div class="col-span-full text-center">
                            <p class="text-2xl font-bold bg-gradient-to-r from-red-600 to-red-800 bg-clip-text text-transparent animate-bounce">
                                Pendaftaran Ditutup!
                            </p>
                        </div>
                        <div class="mt-4 col-span-full text-center">
                            <a href="{{ route('home') }}" class="inline-block px-6 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors">
                                Kembali ke Home
                            </a>
                        </div>`;
                return;
            }
            // Jika sudah dimulai tapi belum expired
            else if (distance < 0) {
                clearInterval(interval);
                document.getElementById("countdown").innerHTML =
                    `<div class="col-span-full text-center">
                            <p class="text-2xl font-bold bg-gradient-to-r from-green-600 to-blue-600 bg-clip-text text-transparent animate-bounce">
                                Pendaftaran Dibuka!
                            </p>
                        </div>
                        <div class="mt-4 col-span-full text-center">
                            <a href="{{ route('home') }}" class="inline-block px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
                                Daftar Sekarang
                            </a>
                        </div>`;
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById("days").textContent = addLeadingZero(days);
            document.getElementById("hours").textContent = addLeadingZero(hours);
            document.getElementById("minutes").textContent = addLeadingZero(minutes);
            document.getElementById("seconds").textContent = addLeadingZero(seconds);
        }, 1000);
    </script>
@endpush
