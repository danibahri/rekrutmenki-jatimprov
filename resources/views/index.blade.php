<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.head')
</head>

<body>
    <div class="background">
        <div class="background-image"><img src="{{ url('/image/sumenep.png') }}" alt="logo"></div>
    </div>
    <header>
        @include('layouts.header')
    </header>
    <main>
        @yield('landing-page')
    </main>
    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
