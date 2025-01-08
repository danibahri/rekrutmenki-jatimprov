@extends('index')

@section('title', 'Informasi Rekrutmen')

@section('content')
    {{-- HALAMAN AWAL --}}
    <div class="relative flex flex-col md:flex-row gap-4">
        <div
            class="absolute flex justify-center items-center w-full h-screen bg-black bg-opacity-50 bg-gradient-to-t from-black to-transparent">
            <div class="max-w-screen-lg p-4 w-full z-10 ">
                <h1 class="text-3xl font-semibold text-white mb-3">{{ $remainingText }} <span
                        class="text-blue-700">{{ $lastWord }}</span>
                </h1>
                <p class="text-white">{{ $home->summary }}</p>
                <div class="flex gap-2 md:w-1/2">
                    @if (empty(Auth::check()))
                        <div class="flex items-center justify-center w-1/2 mt-4">
                            <a href="{{ route('register') }}"
                                class="flex justify-center items-center w-full py-2 bg-blue-700 rounded-lg text-white text-center border-2 border-blue-700 hover:border-2 hover:border-blue-800 hover:bg-blue-600">Daftar
                                Sekarang <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-hand-index-thumb mx-2" viewBox="0 0 16 16">
                                    <path
                                        d="M6.75 1a.75.75 0 0 1 .75.75V8a.5.5 0 0 0 1 0V5.467l.086-.004c.317-.012.637-.008.816.027.134.027.294.096.448.182.077.042.15.147.15.314V8a.5.5 0 0 0 1 0V6.435l.106-.01c.316-.024.584-.01.708.04.118.046.3.207.486.43.081.096.15.19.2.259V8.5a.5.5 0 1 0 1 0v-1h.342a1 1 0 0 1 .995 1.1l-.271 2.715a2.5 2.5 0 0 1-.317.991l-1.395 2.442a.5.5 0 0 1-.434.252H6.118a.5.5 0 0 1-.447-.276l-1.232-2.465-2.512-4.185a.517.517 0 0 1 .809-.631l2.41 2.41A.5.5 0 0 0 6 9.5V1.75A.75.75 0 0 1 6.75 1M8.5 4.466V1.75a1.75 1.75 0 1 0-3.5 0v6.543L3.443 6.736A1.517 1.517 0 0 0 1.07 8.588l2.491 4.153 1.215 2.43A1.5 1.5 0 0 0 6.118 16h6.302a1.5 1.5 0 0 0 1.302-.756l1.395-2.441a3.5 3.5 0 0 0 .444-1.389l.271-2.715a2 2 0 0 0-1.99-2.199h-.581a5 5 0 0 0-.195-.248c-.191-.229-.51-.568-.88-.716-.364-.146-.846-.132-1.158-.108l-.132.012a1.26 1.26 0 0 0-.56-.642 2.6 2.6 0 0 0-.738-.288c-.31-.062-.739-.058-1.05-.046zm2.094 2.025" />
                                </svg></a>
                        </div>
                    @else
                        <div class="flex items-center justify-center w-1/2 mt-4">
                            <a href="{{ route('register') }}"
                                class="flex justify-center items-center w-full py-2 bg-blue-700 rounded-lg text-white text-center border-2 border-blue-700 hover:border-2 hover:border-blue-800 hover:bg-blue-600">Registrasi
                                Sekarang</a>
                        </div>
                    @endif
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
                        <div id="dropdown" class="hidden z-10 bg-white divide-y divide-gray-100 rounded-lg w-44 md:w-64">
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
                <div class="grid grid-cols-2 md:grid-cols-3 gap-3 mt-8">
                    <div class="card bg-gray-100 p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900 text-center">Status</h2>
                        <hr>
                        @if ($status == 'open')
                            <p class="flex justify-center items-center text-gray-500 mt-3"><span
                                    class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">Dibuka</span>
                            </p>
                        @else
                            <p class="flex justify-center items-center text-gray-500 mt-3"><span
                                    class="bg-red-100 text-red-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">Ditutup</span>
                            </p>
                        @endif

                    </div>
                    <div class="card bg-gray-100 p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900 text-center">Pendaftaran</h2>
                        <hr>
                        @php
                            use Carbon\Carbon;
                        @endphp
                        <p class="text-gray-500 text-sm text-center mt-1">
                            {{ Carbon::parse($home->open_pendaftaran)->format('d M Y') }} -
                            {{ Carbon::parse($home->exp_pendaftaran)->format('d M Y') }}
                        </p>
                    </div>
                    <div class="card bg-gray-100 p-4 rounded-lg shadow-md">
                        <h2 class="text-lg font-semibold text-gray-900 text-center">Pendaftar</h2>
                        <hr>
                        <p class="flex justify-center items-center text-gray-500 mt-3"><span
                                class="bg-green-100 text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded">{{ $userCount }}</span>
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

    <div class="content max-w-screen-lg mx-auto p-4 py-6 lg:py-8" id="jadwal-nav">
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

        {{-- TAB ALUR PENDAFTARAN --}}
        <div class="tab-content card w-full bg-white p-5 rounded-b-lg shadow-md" id="tab-jadwal">
            <h1 class="font-semibold text-2xl pb-2">Alur <span class="text-blue-700">Pendaftaran</span></h1>
            <hr>
            <div class="mt-5">
                <ol class="relative border-s border-gray-200 mx-2">
                    @foreach ($jadwal as $jadwal)
                        <li class="mb-10 ms-6">
                            <span
                                class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white">
                                <svg class="w-2.5 h-2.5 text-blue-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                                </svg>
                            </span>
                            <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900">{{ $jadwal->heading }}
                            </h3>
                            <time
                                class="block mb-2 text-sm font-normal leading-none text-gray-400">{{ Carbon::parse($jadwal->date)->format('d M Y') }}</time>
                            <p class="text-base font-normal text-gray-500">{{ $jadwal->summary }}</p>
                        </li>
                    @endforeach
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
                    Surat Pernyataan tidak pernah dipidana karena melakukan tindak pidana dengan ancaman hukuman 5 (lima)
                    tahun atau lebih dan/atau tidak sedang dalam menjalani proses hukum pidana
                    <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
                </li>
                <li>
                    Surat Pernyataan bersedia melepaskan keanggotaan dan jabatannya dalam Badan Publik apabila diangkat
                    menjadi anggota Komisi Informasi Kabupaten Sumenep
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
                    Surat Pernyataan bersedia mengundurkan diri apabila di kemudian hari ditemukan dokumen yang disampaikan
                    terbukti tidak benar yang ditandatangani di atas meterai Rp.10.000,00
                    <a href="#" class="text-blue-600 hover:underline">(Unduh Format)</a>
                </li>
            </ul>
        </div>

        {{-- TAB KETENTUAN --}}
        <div id="tab-ketentuan" class="tab-content card w-full bg-white p-5 rounded-b-lg shadow-md hidden">
            <h2 class="text-2xl font-semibold mb-4 border-b pb-2">Ketentuan</h2>
            <ul class="list-decimal pl-6 space-y-2">
                <li>Berkas administrasi pelamar yang diproses untuk mengikuti tahap seleksi berikutnya adalah berkas yang
                    lengkap sesuai dengan ketentuan yang dipersyaratkan.</li>
                <li>Proses dan tahapan seleksi ini TIDAK DIKENAKAN BIAYA ATAU PUNGUTAN DALAM BENTUK APAPUN.</li>
                <li>Setiap perkembangan informasi seleksi ini akan disampaikan melalui laman
                    <a href="https://seleksi.sumenepkab.go.id"
                        class="text-blue-600 hover:underline">https://seleksi.sumenepkab.go.id</a>. Kelalaian tidak
                    mengikuti perkembangan informasi menjadi tanggung jawab pelamar.
                </li>
                <li>Seluruh biaya akomodasi dan transportasi selama melaksanakan proses seleksi ditanggung oleh pelamar.
                </li>
                <li>Pelamar yang memberikan keterangan/data dengan tidak benar, maka keikutsertaan/ kelulusan sebagai
                    peserta/ pelamar dapat digugurkan secara sepihak oleh Panitia.</li>
                <li>Keputusan Panitia Seleksi Rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2025-2029 bersifat
                    mutlak dan tidak dapat diganggu gugat sesuai ketentuan perundang-undangan.</li>
                <li>Dalam membutuhkan penjelasan terkait teknis administratif, dapat menghubungi Sekretariat Panitia Seleksi
                    Rekrutmen Calon Anggota Komisi Informasi Pusat Periode 2025-2029 melalui fitur Kontak dalam laman
                    <a href="https://seleksi.sumenepkab.go.id"
                        class="text-blue-600 hover:underline">https://seleksi.sumenepkab.go.id</a> atau di alamat e-mail:
                    <a href="mailto:sumenep.ppidutama@gmail.com"
                        class="text-blue-600 hover:underline">sumenep.ppidutama@gmail.com</a>.
                </li>
            </ul>
        </div>

        {{-- ACCORDING --}}
        <div id="accordion-open" class="mt-8 bg-white shadow-sm" data-accordion="open">
            @php
                $count = 1;
            @endphp
            @foreach ($faq as $faq)
                <h2 id="accordion-open-heading-{{ $count }}" class="rounded-t-xl">
                    <button type="button"
                        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border focus:ring-4 focus:ring-gray-200"
                        data-accordion-target="#accordion-open-body-{{ $count }}"
                        aria-controls="accordion-open-body-{{ $count }}">
                        <span class="flex items-center"><svg class="w-5 h-5 me-2 shrink-0" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                    clip-rule="evenodd"></path>
                            </svg>{{ $faq->heading }}
                        </span>
                        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 5 5 1 1 5" />
                        </svg>
                    </button>
                </h2>
                <div id="accordion-open-body-{{ $count }}" class="hidden"
                    aria-labelledby="accordion-open-heading-{{ $count }}">
                    <div class="p-5 border border-b-0 bg-white">
                        <p class="mb-2 text-black">{!! $faq->summary !!}</p>
                    </div>
                </div>
                @php
                    $count++;
                @endphp
            @endforeach
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
