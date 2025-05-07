<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Csárda') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
</head>
<body class="bg-white text-gray-900 font-sans">
@include('partials.navbar')

<main>
    @yield('content')
</main>
<footer class="bg-[#f9f9f5] border-t border-gray-200 py-10 px-6 text-center text-sm text-gray-700">
    <div class="max-w-4xl mx-auto space-y-2">
        <h3 class="text-lg font-semibold text-gray-800">Kecskeméti Csárda & Borház</h3>
        <p>
            <a href="tel:+3676488686" class="hover:underline">+36 76 488 686</a> &nbsp;|&nbsp;
            <a href="tel:+36704538910" class="hover:underline">+36 70 453 8910</a>
        </p>
        <p>
            <a href="mailto:csarda.kecskemeti@gmail.com" class="hover:underline">csarda.kecskemeti@gmail.com</a>
        </p>
    </div>
</footer>
</body>
</html>
