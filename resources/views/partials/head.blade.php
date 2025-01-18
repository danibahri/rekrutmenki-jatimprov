<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="icon" href="{{ asset('image/sumekar.png') }}" type="image/png">
<title>@yield('title')</title>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<style>
    :root {
        scroll-behavior: smooth;
    }

    .background {
        display: flex;
        position: fixed;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 100vh;
        z-index: -1;
    }

    .background-image img {
        width: 100vh;
        object-fit: contain;
        filter: grayscale(100%);
        opacity: 0.1;
    }
</style>
