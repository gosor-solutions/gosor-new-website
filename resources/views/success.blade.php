<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('landing.success.title') }} - {{ config('app.name') }}</title>

    <!-- Google Fonts: Cairo (Arabic) & Plus Jakarta Sans (English) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#070b13] text-slate-100 antialiased flex items-center justify-center min-h-screen">
    <!-- Global Background Elements -->
    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none">
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-indigo-950/30 via-[#070b13] to-[#070b13]"></div>
        <div class="absolute top-[-10%] inset-s-[20%] w-[500px] h-[500px] rounded-full bg-cyan-600/10 blur-[120px]"></div>
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-size-[4rem_4rem] mask-[radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-15"></div>
    </div>

    <div class="max-w-md w-full px-6 text-center">
        <div class="mb-8 flex justify-center">
            <div class="w-20 h-20 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-400">
                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
        </div>
        
        <h1 class="text-3xl font-bold mb-4 bg-gradient-to-r from-slate-100 to-cyan-100 bg-clip-text text-transparent">
            {{ __('landing.success.title') }}
        </h1>
        
        <p class="text-slate-400 mb-8 leading-relaxed">
            {{ __('landing.success.message') }}
        </p>
        
        <div class="text-sm text-slate-500">
            {{ __('landing.success.redirect_text') }} <span id="countdown" class="font-bold text-cyan-400">5</span> {{ __('landing.success.seconds') }}
        </div>

        <div class="mt-8">
            <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 rounded-xl bg-slate-900/60 hover:bg-slate-900 border border-slate-800 px-6 py-3 font-semibold text-slate-300 hover:text-white transition duration-300">
                {{ __('landing.success.back_home') }}
            </a>
        </div>
    </div>

    <script>
        let count = 5;
        const countdownEl = document.getElementById('countdown');
        const interval = setInterval(() => {
            count--;
            countdownEl.textContent = count;
            if (count <= 0) {
                clearInterval(interval);
                window.location.href = "{{ route('landing') }}";
            }
        }, 1000);
    </script>
</body>
</html>
