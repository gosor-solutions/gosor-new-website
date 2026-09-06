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
    <meta name="theme-color" id="meta-theme-color" content="#070b13">

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
<body class="bg-slate-50 dark:bg-[#070b13] relative text-slate-800 dark:text-slate-100 antialiased overflow-x-hidden selection:bg-cyan-500 selection:text-slate-900 transition-colors duration-200">

    {{-- Global Background Elements --}}
    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none">
        {{-- Main background radial glow --}}
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-sky-100/50 via-slate-50 to-slate-50 dark:from-indigo-950/30 dark:via-[#070b13] dark:to-[#070b13]"></div>

        {{-- Glowing Orbs --}}
        <div class="absolute top-[-10%] inset-s-[20%] w-[500px] h-[500px] rounded-full bg-cyan-400/10 dark:bg-cyan-600/10 blur-[120px] animate-pulse-glow"></div>
        <div class="absolute bottom-[20%] inset-e-[-10%] w-[600px] h-[600px] rounded-full bg-indigo-400/10 dark:bg-indigo-600/10 blur-[130px] animate-pulse-glow" style="animation-delay: -3s;"></div>

        {{-- Background Grid --}}
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#cbd5e1_1px,transparent_1px),linear-gradient(to_bottom,#cbd5e1_1px,transparent_1px)] dark:bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-size-[4rem_4rem] mask-[radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-25 dark:opacity-15"></div>
    </div>

    @yield('content')

    @stack('scripts')
</body>
</html>
