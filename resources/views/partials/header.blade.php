<nav class="bg-white sticky w-full z-20 top-0 start-0 border-b border-gray-200">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4 relative">
        <div class="flex items-center space-x-3 rtl:space-x-reverse gap-6">
            <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ url('/image/sumekar.png') }}" class="h-12" alt="Sumenep">
            </a>
            <div class="items-center hidden w-full md:flex md:w-auto">
                <ul
                    class="flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-1 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                    <li>
                        <a href="#jadwal-nav"
                            class="block py-2 px-3 text-gray-900 rounded md:px-4 md:py-2 hover:bg-gray-100"
                            aria-current="page">Jadwal</a>
                    </li>
                    <li>
                        <a href="#accordion-open"
                            class="block py-2 px-3 text-gray-900 rounded md:px-4 md:py-2 hover:bg-gray-100">FAQ</a>
                    </li>
                </ul>
            </div>
        </div>
        @if (empty(Auth::check()))
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="button flex">
                    <a href="{{ route('login') }}"
                        class="block py-2 px-3 text-gray-900 rounded border-solid border-2 hover:border-gray-300 md:border-none hover:bg-gray-100 md:hover:bg-transparent md:hover:text-gray-500 md:p-0">Masuk</a>
                    <span class="mx-1 my-2 hidden md:block md:my-0">/</span>
                    <span class="mx-1 md:mx-0"></span>
                    <a href="{{ route('register') }}"
                        class="block py-2 px-3 bg-blue-700 text-white rounded border-solid border-2 hover:border-blue-800 hover:bg-blue-500 md:border-none md:text-black md:bg-white md:hover:bg-transparent md:hover:text-gray-500 md:p-0">Daftar</a>
                </div>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
        @else
            <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                <div class="button flex">
                    <a href="{{ route('logout') }}"
                        class="block py-2 px-3 text-gray-900 rounded border-solid border-2 hover:border-gray-200 md:border-none hover:bg-gray-100 md:hover:bg-transparent md:p-0 md:hover:bg-gray-300 md:px-3 md:py-2">Keluar</a>
                </div>
                <button data-collapse-toggle="navbar-sticky" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
                    aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
            </div>
        @endif
        <div class="absolute top-16 z-10 left-0 items-center justify-between hidden w-full md:hidden md:w-auto md:order-1"
            id="navbar-sticky">
            <ul
                class="flex flex-col gap-2 p-4 md:p-0 mt-4 font-medium border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-white">
                <li>
                    <a href="#"
                        class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-gray-900 md:hover:text-blue-700 md:p-0"
                        aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#accordion-open"
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0">FAQ</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
