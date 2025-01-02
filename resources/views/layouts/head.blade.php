<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="icon" href="{{ url('/image/sumekar.png') }}" type="image/svg+xml" style="object-fit:contain">
<title>@yield('title')</title>
<style>
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

    header {
        position: relative;
        z-index: 1;
    }

    main {
        position: relative;
        z-index: 1;
    }

    footer {
        position: relative;
        z-index: 1;
    }
</style>
