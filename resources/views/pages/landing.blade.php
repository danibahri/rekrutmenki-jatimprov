@extends('index')

@section('title', 'Informasi Rekrutmen')

@section('content')
    {{-- HALAMAN AWAL --}}
        <div class="relative flex flex-col md:flex-row gap-4">
            <div class="absolute flex justify-center items-center w-full h-screen bg-gradient-to-t from-black to-transparent">
                <div class="max-w-screen-lg p-4 w-full md:w-1/2 z-10 ">
                    <h1 class="text-3xl font-semibold text-white mb-3">Rekrutmen Komisi <span
                            class="text-blue-700">Informasi</span>
                    </h1>
                    <p class="text-white">Panitia Seleksi Rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2021-2025
                        mengundang warga negara Republik Indonesia yang telah memenuhi syarat untuk mendaftarkan diri melalui
                        rekrutmen terbuka dalam rangka rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2021-2025
                        berdasarkan Undang-Undang Nomor 14 Tahun 2008 tentang Keterbukaan Informasi Publik.</p>
                    <div class="flex gap-2">
                        <div class="flex items-center justify-center w-1/2 mt-4">
                            <a href="#"
                                class="flex justify-center items-center w-full py-2 bg-blue-700 rounded-lg text-white text-center border-2 border-blue-700 hover:border-2 hover:border-blue-800 hover:bg-blue-600">Daftar
                                Sekarang <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-hand-index-thumb mx-2" viewBox="0 0 16 16">
                                    <path
                                        d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                                </svg></a>
                        </div>
                        <div class="flex items-center justify-center w-1/2 mt-4">
                            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" type="button"
                                class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50"
                                id="menu-button" aria-expanded="true" aria-haspopup="true">
                                Pengumuman
                                <svg class="-mr-1 size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor"
                                    aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div id="dropdown" class="hidden z-10 bg-white divide-y divide-gray-100 rounded-lg w-44 md:w-72">
                                <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownDefaultButton">
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Dashboard</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Settings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Earnings</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 hover:bg-gray-100">Sign
                                            out</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-4">
                        <div class="card bg-gray-100 p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900 text-center">Status</h2>
                            <hr>
                            <p class="flex justify-center items-center text-gray-500 mt-3"><span
                                    class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">Di
                                    tutup</span>
                            </p>
                        </div>
                        <div class="card bg-gray-100 p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900 text-center">Pendaftaran</h2>
                            <hr>
                            <p class="text-gray-500">Terakhir : 21 September 2021</p>
                        </div>
                        <div class="card bg-gray-100 p-4 rounded-lg shadow-md">
                            <h2 class="text-lg font-semibold text-gray-900 text-center">Pendaftar</h2>
                            <hr>
                            <p class="flex justify-center items-center text-gray-500 mt-3"><span
                                    class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">1.800</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-full">
                <img src="{{ url('/image/work.jpg') }}" alt="logo" class="shadow-md w-full h-screen object-cover">
                {{-- <div class="absolute inset-x-0 bottom-0 h-3/4 bg-black"></div> --}}
            </div>
        </div>

<div class="content max-w-screen-lg mx-auto p-4 py-6 lg:py-8">
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
    <div id="tab-persyaratan" class="tab-content card w-full bg-white p-5 rounded-b-lg shadow-md hidden">
        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Persyaratan</h2>
        <ul class="list-decimal pl-6 space-y-2">
            <li>
                Formulir pendaftaran yang ditandatangani dan bermeterai Rp.10.000,00
                <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
            </li>
            <li>
                Daftar Riwayat Hidup (DRH) sesuai dengan format yang disediakan oleh Panitia Seleksi
                <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
            </li>
            <li>Pasfoto berwarna terbaru ukuran 4 X 6</li>
            <li>Kartu Tanda Penduduk (KTP) dan Kartu Keluarga (KK)</li>
            <li>
                Surat Pernyataan tidak pernah dipidana karena melakukan tindak pidana dengan ancaman hukuman 5 (lima) tahun atau lebih dan/atau tidak sedang dalam menjalani proses hukum pidana
                <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
            </li>
            <li>
                Surat Pernyataan bersedia melepaskan keanggotaan dan jabatannya dalam Badan Publik apabila diangkat menjadi anggota Komisi Informasi Kabupaten Sumenep
                <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
            </li>
            <li>
                Surat Pernyataan bersedia bekerja penuh
                <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
            </li>
            <li>
                Surat keterangan sehat termasuk pernyataan bebas narkoba dari rumah sakit pemerintah
                <span class="italic">(diserahkan setelah dinyatakan lulus seleksi administrasi)</span>
            </li>
            <li>
                Surat Pernyataan bersedia mengundurkan diri apabila di kemudian hari ditemukan dokumen yang disampaikan terbukti tidak benar yang ditandatangani di atas meterai Rp.10.000,00
                <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
            </li>
        </ul>
    </div>


    {{-- TAB KETENTUAN --}}
    <div id="tab-ketentuan" class="tab-content card w-full bg-white p-5 rounded-b-lg shadow-md hidden">
        <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Ketentuan</h2>
        <ul class="list-decimal pl-6 space-y-2">
            <li>Berkas administrasi pelamar yang diproses untuk mengikuti tahap seleksi berikutnya adalah berkas yang lengkap sesuai dengan ketentuan yang dipersyaratkan.</li>
            <li>Proses dan tahapan seleksi ini TIDAK DIKENAKAN BIAYA ATAU PUNGUTAN DALAM BENTUK APAPUN.</li>
            <li>Setiap perkembangan informasi seleksi ini akan disampaikan melalui laman
                <a href="https://seleksi.sumenepkab.go.id" class="text-blue-600 hover:underline">https://seleksi.sumenepkab.go.id</a>. Kelalaian tidak mengikuti perkembangan informasi menjadi tanggung jawab pelamar.
            </li>
            <li>Seluruh biaya akomodasi dan transportasi selama melaksanakan proses seleksi ditanggung oleh pelamar.</li>
            <li>Pelamar yang memberikan keterangan/data dengan tidak benar, maka keikutsertaan/ kelulusan sebagai peserta/ pelamar dapat digugurkan secara sepihak oleh Panitia.</li>
            <li>Keputusan Panitia Seleksi Rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2025-2029 bersifat mutlak dan tidak dapat diganggu gugat sesuai ketentuan perundang-undangan.</li>
            <li>Dalam membutuhkan penjelasan terkait teknis administratif, dapat menghubungi Sekretariat Panitia Seleksi Rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2025-2029 melalui fitur Kontak dalam laman
                <a href="https://seleksi.sumenepkab.go.id" class="text-blue-600 hover:underline">https://seleksi.sumenepkab.go.id</a> atau di alamat e-mail:
                <a href="mailto:sumenep.ppidutama@gmail.com" class="text-blue-600 hover:underline">sumenep.ppidutama@gmail.com</a>.
            </li>
        </ul>
    </div>
    <div id="accordion-open" class="mt-8 bg-white rounded-xl" data-accordion="open">
        <h2 id="accordion-open-heading-1">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200" data-accordion-target="#accordion-open-body-1" aria-expanded="true" aria-controls="accordion-open-body-1">
                <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                    </svg> What is Flowbite?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-1" class="hidden" aria-labelledby="accordion-open-heading-1">
            <div class="p-5 border border-b-0 border-gray-200">
                <p class="mb-2 text-gray-500 dark:text-gray-400">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
                <p class="text-gray-500">Check out this guide to learn how to <a href="/docs/getting-started/introduction/" class="text-blue-600 dark:text-blue-500 hover:underline">get started</a> and start developing websites even faster with components on top of Tailwind CSS.</p>
            </div>
        </div>
        <h2 id="accordion-open-heading-2">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200" data-accordion-target="#accordion-open-body-2" aria-expanded="false" aria-controls="accordion-open-body-2">
                <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                    </svg>Is there a Figma file available?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-2" class="hidden" aria-labelledby="accordion-open-heading-2">
            <div class="p-5 border border-b-0 border-gray-200">
                <p class="mb-2 text-gray-500">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
                <p class="text-gray-500">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
            </div>
        </div>
        <h2 id="accordion-open-heading-3">
            <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200" data-accordion-target="#accordion-open-body-3" aria-expanded="false" aria-controls="accordion-open-body-3">
                <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path>
                    </svg> What are the differences between Flowbite and Tailwind UI?</span>
                <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5" />
                </svg>
            </button>
        </h2>
        <div id="accordion-open-body-3" class="hidden" aria-labelledby="accordion-open-heading-3">
            <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
                <p class="mb-2 text-gray-500 dark:text-gray-400">The main difference is that the core components from Flowbite are open source under the MIT license, whereas Tailwind UI is a paid product. Another difference is that Flowbite relies on smaller and standalone components, whereas Tailwind UI offers sections of pages.</p>
                <p class="mb-2 text-gray-500 dark:text-gray-400">However, we actually recommend using both Flowbite, Flowbite Pro, and even Tailwind UI as there is no technical reason stopping you from using the best of two worlds.</p>
                <p class="mb-2 text-gray-500 dark:text-gray-400">Learn more about these technologies:</p>
                <ul class="ps-5 text-gray-500 list-disc dark:text-gray-400">
                    <li><a href="https://flowbite.com/pro/" class="text-blue-600 dark:text-blue-500 hover:underline">Flowbite Pro</a></li>
                    <li><a href="https://tailwindui.com/" rel="nofollow" class="text-blue-600 dark:text-blue-500 hover:underline">Tailwind UI</a></li>
                </ul>
            </div>
        </div>
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
