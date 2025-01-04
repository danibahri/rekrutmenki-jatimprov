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
        @yield('content')
    </main>

    @stack('scripts')
</body>

</html>
