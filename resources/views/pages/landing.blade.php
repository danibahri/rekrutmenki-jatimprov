@extends('index')

@section('title', 'Informasi Rekrutmen')

@section('content')
    <div class="content max-w-screen-lg mx-auto p-4 py-6 lg:py-8">
        {{-- HALAMAN AWAL --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="info">
                <h1 class="text-3xl font-semibold text-gray-900">Rekrutmen Komisi <span class="text-blue-700">Informasi</span>
                </h1>
                <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quidem
                    voluptates. Quisquam, quidem voluptates.</p>
                <div class="flex items-center justify-center w-full mt-4">
                    <a href="#"
                        class="flex justify-center items-center w-full py-2 bg-blue-700 rounded-lg text-white text-center border-2 hover:border-2 hover:border-blue-800 hover:bg-blue-600">Daftar
                        Sekarang <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-hand-index-thumb mx-2" viewBox="0 0 16 16">
                            <path
                                d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                        </svg></a>
                </div>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-4">
                    <div class="card bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900 text-center">Status</h2>
                        <hr>
                        <p class="flex justify-center items-center text-gray-500 mt-3"><span
                                class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">Di
                                tutup</span>
                        </p>
                    </div>
                    <div class="card bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900 text-center">Pendaftaran</h2>
                        <hr>
                        <p class="text-gray-500">Terakhir : 21 September 2021</p>
                    </div>
                    <div class="card bg-white p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900 text-center">Pendaftar</h2>
                        <hr>
                        <p class="flex justify-center items-center text-gray-500 mt-3"><span
                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">1.800</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="img">
                <img src="{{ url('/image/work.jpg') }}" alt="logo" class="rounded-lg shadow-md">
            </div>
        </div>

        {{-- TABS NAVIGATION --}}
        <div class="text-sm font-medium text-center text-gray-500 border-b border-gray-200 mt-8">
            <ul class="flex flex-wrap -mb-px">
                <li class="me-2">
                    <button data-tab-target="#tab-jadwal"
                        class="tab-link inline-block p-4 text-blue-600 border-b-2 border-blue-600 rounded-t-lg active"
                        aria-current="page">Jadwal</button>
                </li>
                <li class="me-2">
                    <button data-tab-target="#tab-persyaratan"
                        class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Persyaratan</button>
                </li>
                <li class="me-2">
                    <button data-tab-target="#tab-ketentuan"
                        class="tab-link inline-block p-4 border-b-2 border-transparent rounded-t-lg hover:text-gray-600 hover:border-gray-300">Ketentuan</button>
                </li>
            </ul>
        </div>


        {{-- TAB PENDAFTARAN --}}
        <div class="tab-content card w-full bg-white p-5 rounded-b-lg shadow-md" id="tab-jadwal">
            <h1 class="font-semibold text-xl">Alur <span class="text-blue-700">Pendaftaran</span></h1>
            <div class="mt-5">
                <ol class="relative border-s border-gray-200 mx-2">
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900">Penerimaan Pendaftaran
                        </h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on January 13th,
                            2022</time>
                        <p class="text-base font-normal text-gray-500">Get access to over 20+ pages including a
                            dashboard layout, charts, kanban board, calendar, and pre-order E-commerce & Marketing pages.
                        </p>

                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Seleksi Administrasi</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Pengumuman Hasil Seleksi Administrasi</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Tes Potensi</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Penggumuman Hasil Tes Potensi</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed
                            in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Psikotes dan Dinamika Kelompok</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed
                            in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Pengumuman Hasil Psikotes dan Dinamika
                            Kelompok</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed
                            in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Seleksi Wawancara</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed
                            in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Pengumuman Hasil Wawancara</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed
                            in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Pengumuman Calon Komisi Informasi</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed
                            in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                    <li class="mb-10 ms-6">
                        <span
                            class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                            <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                            </svg>
                        </span>
                        <h3 class="mb-1 text-lg font-semibold text-gray-900">Pengumuman Hasil Seleksi</h3>
                        <time class="block mb-2 text-sm font-normal leading-none text-gray-400">Released on December 7th,
                            2021</time>
                        <p class="text-base font-normal text-gray-500">All of the pages and components are first designed
                            in
                            Figma and we keep a parity between the two versions even as we update the project.</p>
                    </li>
                </ol>
            </div>
        </div>

        {{-- TAB PERSYARATAN --}}
        <div id="tab-persyaratan" class="tab-content p-4 hidden">
            <h2 class="text-lg font-semibold">Persyaratan</h2>
            <p>Konten untuk tab Persyaratan.</p>
        </div>

        {{-- TAB KETENTUAN --}}
        <div id="tab-ketentuan" class="tab-content p-4 hidden">
            <h2 class="text-lg font-semibold">Ketentuan</h2>
            <p>Konten untuk tab Ketentuan.</p>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const tabs = document.querySelectorAll(".tab-link");
            const contents = document.querySelectorAll(".tab-content");

            tabs.forEach(tab => {
                tab.addEventListener("click", function() {
                    // Hapus kelas aktif dari semua tab
                    tabs.forEach(t => t.classList.remove("text-blue-600", "border-blue-600",
                        "active"));
                    // Tambahkan kelas aktif ke tab yang diklik
                    this.classList.add("text-blue-600", "border-blue-600", "active");

                    // Sembunyikan semua konten
                    contents.forEach(content => content.classList.add("hidden"));
                    // Tampilkan konten yang sesuai
                    const target = document.querySelector(this.dataset.tabTarget);
                    target.classList.remove("hidden");
                });
            });
        });
    </script>
@endpush
