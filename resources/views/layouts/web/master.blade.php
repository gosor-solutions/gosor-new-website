<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Instant Theme Detection to prevent FOUC --}}
    <script>
        (function() {
            try {
                const storedTheme = localStorage.getItem('theme');
                if (storedTheme === 'light') {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.add('light');
                } else {
                    document.documentElement.classList.add('dark');
                    document.documentElement.classList.remove('light');
                }
            } catch (e) {
                document.documentElement.classList.add('dark');
            }
        })();
    </script>

    {{-- Primary Meta Tags --}}
    <title>@yield('title', config('app.name'))</title>
    <meta name="title" content="@yield('title', config('app.name'))">
    <meta name="description" content="@yield('description', '')">
    <link rel="canonical" href="{{ url()->current() }}">

    @stack('meta')

    {{-- Theme Color --}}
    <meta name="theme-color" id="meta-theme-color" content="#283891">

    @stack('head')

    {{-- Devicon CDN --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />

    {{-- Performance: Preconnect to external origins --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://cdn.jsdelivr.net">

    {{-- Google Fonts: Cairo (Arabic) & Plus Jakarta Sans (English) --}}
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Vite Styles & Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white dark:bg-[#06080e] relative text-slate-800 dark:text-slate-100 antialiased overflow-x-hidden selection:bg-[#283891] selection:text-white transition-colors duration-200">

    {{-- Global Clean Background Elements (No multi-color gradients, no blur halos) --}}
    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none">
        {{-- Subtle geometric dot pattern --}}
        <div class="absolute inset-0 bg-white dark:bg-[#06080e]"></div>
        <div class="absolute inset-0 opacity-[0.035] dark:opacity-[0.05]" style="background-image: radial-gradient(#283891 1px, transparent 1px); background-size: 24px 24px;"></div>
    </div>

    @yield('content')

    @stack('scripts')
</body>
</html>
