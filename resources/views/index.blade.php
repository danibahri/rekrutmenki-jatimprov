<!DOCTYPE html>
<html lang="en">

<head>
    @include('partials.head')
</head>

<body class="bg-gray-100">
    <x-alert />
    <div class="top" id="top"></div>
    <div class="background">
        <div class="background-image"><img src="{{ url('/image/sumenep.png') }}" alt="logo"></div>
    </div>
    <main>
        @include('partials.header')
        @yield('content')
    </main>
    <footer>
        @include('partials.footer')
    </footer>
    <div id="buttonTop"
        class="hidden fixed bottom-5 right-5 z-50 p-1 bg-blue-700 rounded-lg border-2 border-blue-500 shadow-md hover:bg-blue-800 transition-all">
        <a href="#top" class="flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="text-white"
                viewBox="0 0 16 16">
                <path
                    d="M3.204 11h9.592L8 5.519zm-.753-.659 4.796-5.48a1 1 0 0 1 1.506 0l4.796 5.48c.566.647.106 1.659-.753 1.659H3.204a1 1 0 0 1-.753-1.659" />
            </svg>
        </a>
    </div>
    @stack('scripts')
    <script>
        const buttonTop = document.getElementById("buttonTop");
        window.addEventListener("scroll", () => {
            if (window.scrollY > 100) {
                buttonTop.classList.remove("hidden");
                buttonTop.classList.add("block");
            } else {
                buttonTop.classList.remove("block");
                buttonTop.classList.add("hidden");
            }
        });
    </script>
</body>
@include('sweetalert::alert')

</html>
