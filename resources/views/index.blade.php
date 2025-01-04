<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body class="bg-gray-100">
    <div class="top" id="top"></div>
    <div class="background">
        <div class="background-image"><img src="{{ url('/image/sumenep.png') }}" alt="logo"></div>
    </div>
    <main>
        @include('layouts.header')
        @yield('content')
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
    <div class="button-top">
        <a href="#top"
            class="fixed bottom-5 right-5 z-50 p-1 rounded-lg border-2 border-blue-500 bg-blue-700 md:bottom-10 md:right-10"><svg
                xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                class="bi bi-caret-up text-white" viewBox="0 0 16 16">
                <path
                    d="M3.204 11h9.592L8 5.519zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659" />
            </svg></a>
    </div>
    @stack('scripts')
</body>

</html>
