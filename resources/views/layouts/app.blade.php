<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'When and What — your daily activity summary. Connect Trakt, Strava, ListenBrainz, and check in to places to see a beautiful rundown of your day.')">

    <title>@yield('title', 'When and What') — Your Day, Summarized</title>

    {{-- Favicons --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}">

    {{-- Bootstrap 5 --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/d1f6020a28.js" crossorigin="anonymous"></script>

    {{-- Inter font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- App styles --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles
    @stack('styles')
</head>

<body>

    @include('partials.nav')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Bootstrap 5 JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @livewireScripts
    @stack('scripts')
</body>

</html>
