@extends('layouts.web.master')

@php
    $sameAs = array_values(array_filter([
        $settings['facebook'] ?? null,
        $settings['linkedin'] ?? null,
    ]));

    $schema = [
        '@context'     => 'https://schema.org',
        '@type'        => 'Organization',
        'name'         => 'Gosor Solutions',
        'url'          => url('/'),
        'logo'         => asset('images/gosor/logo/logo.png'),
        'contactPoint' => [
            '@type'             => 'ContactPoint',
            'telephone'         => '01550099355',
            'contactType'       => 'customer service',
            'areaServed'        => 'EG',
            'availableLanguage' => ['Arabic', 'English'],
        ],
    ];

    if (!empty($sameAs)) {
        $schema['sameAs'] = $sameAs;
    }
@endphp

@section('title', __('landing.hero.badge') . ' - ' . __('landing.hero.title'))

@push('meta')
    <meta name="description" content="{{ __('landing.hero.subtitle') }}">
    <link rel="alternate" hreflang="en" href="{{ url('/?lang=en') }}">
    <link rel="alternate" hreflang="ar" href="{{ url('/?lang=ar') }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ __('landing.hero.badge') }} - {{ __('landing.hero.title') }}">
    <meta property="og:description" content="{{ __('landing.hero.subtitle') }}">
    <meta property="og:image" content="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ __('landing.hero.badge') }} - {{ __('landing.hero.title') }}">
    <meta property="twitter:description" content="{{ __('landing.hero.subtitle') }}">
    <meta property="twitter:image" content="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}">
    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 w-full border-b border-slate-200/80 dark:border-slate-900 bg-white/80 dark:bg-[#0f1231] backdrop-blur-md transition-all duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center gap-2 group">
                        <!-- Stylized SVG GOSOR Logo -->
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions Logo" class="h-40 w-auto logo-themed"/>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex space-x-1 lg:space-x-2 rtl:space-x-reverse items-center">
                    <a href="#home" class="px-3 py-2 text-sm font-medium text-cyan-600 dark:text-cyan-400 hover:text-cyan-500 dark:hover:text-cyan-300 transition duration-150">{{ __('landing.nav.home') }}</a>
                    <a href="#about" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition duration-150">{{ __('landing.nav.about') }}</a>
                    <a href="#services" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition duration-150">{{ __('landing.nav.services') }}</a>
                    <a href="#products" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition duration-150">{{ __('landing.nav.products') }}</a>
                    <a href="#goals" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition duration-150">{{ __('landing.nav.goals') }}</a>
                    <a href="#contact" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition duration-150">{{ __('landing.nav.contact') }}</a>
                </nav>

                <!-- Action buttons (Theme Toggle + Locale + CTA) -->
                <div class="hidden md:flex items-center gap-3">
                    <!-- Theme Mode Toggle Button -->
                    <button type="button" id="theme-toggle-btn" aria-label="Toggle theme" class="inline-flex items-center justify-center w-10 h-10 rounded-lg bg-slate-100 dark:bg-slate-950/40 border border-slate-200 dark:border-slate-900 text-slate-600 dark:text-slate-300 hover:text-cyan-500 dark:hover:text-cyan-400 transition duration-150 shadow-sm dark:shadow-none">
                        <!-- Sun icon (shown in dark mode) -->
                        <svg class="w-5 h-5 hidden dark:block text-amber-300 hover:rotate-45 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <!-- Moon icon (shown in light mode) -->
                        <svg class="w-5 h-5 block dark:hidden text-indigo-600 hover:-rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Language Selector Dropdown Toggle -->
                    <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                        <button type="button" id="lang-dropdown-btn" class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 transition duration-150 rounded-lg bg-slate-100 dark:bg-slate-950/40 border border-slate-200 dark:border-slate-900 shadow-sm dark:shadow-none">
                            <x-eva-globe-outline class="w-5 h-5"/>
                            <span>{{ app()->getLocale() === 'ar' ? 'Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©' : 'En' }}</span>
                            <x-feathericon-chevron-down class="w-4 h-4"/>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="lang-dropdown-menu" class="hidden absolute right-0 rtl:left-0 mt-2 w-32 origin-top-right rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-2xl ring-1 ring-black/5 focus:outline-none z-50">
                            <div class="py-1">
                                <a href="{{ url('/?lang=en') }}" class="flex items-center px-4 py-2.5 text-sm {{ app()->getLocale() === 'en' ? 'text-cyan-600 dark:text-cyan-400 bg-slate-100 dark:bg-slate-850 font-semibold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-white' }}">English</a>
                                <a href="{{ url('/?lang=ar') }}" class="flex items-center px-4 py-2.5 text-sm {{ app()->getLocale() === 'ar' ? 'text-cyan-600 dark:text-cyan-400 bg-slate-100 dark:bg-slate-850 font-semibold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-white' }}">Ø§Ù„Ø¹Ø±Ø¨ÙŠØ©</a>
                            </div>
                        </div>
                    </div>

                    <!-- Get Started Primary Action Button -->
                    <a href="#contact" class="relative group overflow-hidden rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 p-px font-semibold text-white shadow-lg shadow-cyan-500/20 transition duration-300 hover:shadow-cyan-500/35 hover:scale-102">
                        <span class="block px-5 py-2.5 rounded-[11px] bg-slate-900/90 text-white dark:bg-slate-950/80 group-hover:bg-transparent transition duration-300 text-sm">
                            {{ __('landing.nav.get_started') }}
                        </span>
                    </a>
                </div>

                <!-- Hamburger Mobile Menu Icon & Mobile Theme Switcher -->
                <div class="flex md:hidden items-center gap-2">
                    <!-- Mobile Theme Toggle Button -->
                    <button type="button" id="mobile-theme-toggle-btn" aria-label="Toggle theme" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-900/60 text-slate-600 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400">
                        <svg class="w-5 h-5 hidden dark:block text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Fast Switch Language Button (Mobile inline toggle) -->
                    <a href="{{ url('/?lang=' . (app()->getLocale() === 'en' ? 'ar' : 'en')) }}" class="p-2 rounded-lg bg-slate-100 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-900/60 text-slate-700 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 text-xs font-semibold uppercase tracking-wider">
                        {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
                    </a>

                    <button type="button" id="mobile-menu-btn" class="relative w-10 h-10 flex items-center justify-center rounded-lg bg-slate-100 dark:bg-slate-950/60 border border-slate-200 dark:border-slate-900/60 text-slate-700 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200 dark:hover:bg-slate-900 transition duration-150">
                        <span class="sr-only">Open main menu</span>
                        <div class="relative w-6 h-5">
                            <span class="burger-span top-0"></span>
                            <span class="burger-span top-2"></span>
                            <span class="burger-span top-4"></span>
                        </div>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Menu (Drawer style) -->
        <div class="md:hidden border-t border-slate-200 dark:border-slate-900/80 bg-white/95 dark:bg-[#070b13]/95 backdrop-blur-lg px-4 overflow-hidden" id="mobile-menu-panel" style="max-height: 0; opacity: 0; transition: all 0.3s ease-in-out;">
            <div class="py-4 space-y-2">
                <a href="#home" class="block rounded-lg px-3 py-2 text-base font-medium text-cyan-600 dark:text-cyan-400 bg-cyan-50 dark:bg-slate-900/40">{{ __('landing.nav.home') }}</a>
                <a href="#about" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.about') }}</a>
                <a href="#services" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.services') }}</a>
                <a href="#products" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.products') }}</a>
                <a href="#goals" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.goals') }}</a>
                <a href="#contact" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-cyan-600 dark:hover:text-cyan-400 hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.contact') }}</a>
                
                <div class="pt-4 border-t border-slate-200 dark:border-slate-900 flex justify-center">
                    <a href="#contact" class="w-full text-center rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 px-5 py-3 font-semibold text-white shadow-lg shadow-cyan-500/20">
                        {{ __('landing.nav.get_started') }}
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        
        <!-- Hero Section -->
        <section id="home" class="relative pt-12 pb-24 md:pt-20 md:pb-32 overflow-hidden">
            <!-- Figma specified background image placeholder -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('images/gosor/hero.png') }}" alt="Gosor Solutions - Innovating Digital Horizons" class="w-full h-full opacity-20 dark:opacity-50 mix-blend-multiply dark:mix-blend-normal object-cover pointer-events-none" />
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-4xl mx-auto">
                    
                    <!-- Decorative Badge -->
                    {{-- <span data-aos="fade-down" class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-cyan-600 dark:text-cyan-400 border border-cyan-500/20 uppercase mb-8">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-500 dark:bg-cyan-400 animate-ping"></span>
                        {{ __('landing.hero.badge') }}
                    </span> --}}

                    <!-- Large Title with custom gradients -->
                    <h1 data-aos="zoom-out" data-aos-delay="200" class="text-4xl font-extrabold sm:text-6xl lg:text-7xl leading-tight sm:leading-none tracking-tight mb-8">
                        <span class="bg-gradient-to-r from-slate-900 via-cyan-900 to-indigo-900 dark:from-slate-100 dark:via-cyan-100 dark:to-indigo-200 bg-clip-text text-transparent">
                            {{ __('landing.hero.title') }}
                        </span>
                    </h1>

                    <!-- Paragraph Subtitle -->
                    <p data-aos="fade-up" data-aos-delay="400" class="text-lg sm:text-xl text-slate-600 dark:text-slate-400 max-w-2xl mx-auto leading-relaxed mb-10">
                        {{ __('landing.hero.subtitle') }}
                    </p>

                    <!-- Call to Action Buttons -->
                    <div data-aos="fade-up" data-aos-delay="600" class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-20">
                        <!-- Primary CTA -->
                        <a href="#contact" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 px-6 py-4 font-semibold text-white shadow-xl shadow-cyan-500/25 transition duration-300 hover:shadow-cyan-500/40 hover:scale-102">
                            <span>{{ __('landing.hero.cta_start') }}</span>
                            <!-- Dynamic Arrow based on direction -->
                            <svg class="h-5 w-5 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>

                        <!-- Secondary CTA -->
                        <a href="#services" class="inline-flex items-center justify-center rounded-xl bg-white hover:bg-slate-100 border border-slate-200 text-slate-700 hover:text-slate-900 shadow-sm dark:bg-slate-900/60 dark:hover:bg-slate-900 dark:backdrop-blur-md dark:border-slate-800 px-6 py-4 font-semibold dark:text-slate-300 dark:hover:text-white transition duration-300">
                            {{ __('landing.hero.cta_explore') }}
                        </a>
                    </div>

                    <!-- Statistics grid matching second screenshot -->
                    <div data-aos="fade-up" data-aos-delay="800" class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto border-t border-slate-200 dark:border-slate-900 pt-16">
                        @foreach([
                                ['value' => '100+', 'label' => __('landing.hero.stats.projects')],
                                ['value' => '50+', 'label' => __('landing.hero.stats.clients')],
                                ['value' => '50+', 'label' => __('landing.hero.stats.team')],
                                ['value' => '95%', 'label' => __('landing.hero.stats.satisfaction')],
                            ] as $stat)
                                    <div class="flex flex-col items-center">
                                        @php
                                            preg_match('/(\d+)(.*)/', $stat['value'], $matches);
                                            $number = $matches[1] ?? 0;
                                            $suffix = $matches[2] ?? '';
                                        @endphp
                                        <span class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white count-up" 
                                              data-target="{{ $number }}" 
                                              data-suffix="{{ $suffix }}">0{{ $suffix }}</span>
                                        <span class="text-xs sm:text-sm text-slate-500 dark:text-white/70 font-medium mt-2 text-center">{{ $stat['label'] }}</span>
                                    </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <!-- About Us / Who We Are Section -->
        <section id="about" class="py-20 bg-slate-100/60 dark:bg-[#101133] relative overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    {{-- <span class="inline-flex items-center gap-1.5 rounded-full bg-sky-500/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-sky-600 dark:text-sky-400 border border-sky-500/20 uppercase mb-4">
                        {{ __('landing.about.badge') }}
                    </span> --}}
                    <h2 class="text-4xl font-extrabold sm:text-5xl text-slate-900 dark:text-slate-100 tracking-tight mb-6">
                        {{ __('landing.about.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-300 leading-relaxed text-base sm:text-lg">
                        {{ __('landing.about.description') }}
                    </p>
                </div>

                <!-- Mission & Vision Cards -->
                <div class="grid md:grid-cols-2 gap-10 max-w-5xl mx-auto mb-24">
                    
                    <!-- Mission Card -->
                    <div data-aos="fade-right" class="relative rounded-3xl bg-white dark:bg-slate-950/30 border border-slate-200/80 dark:border-slate-800/80 p-8 hover:border-cyan-500/40 dark:hover:border-cyan-500/30 transition duration-300 flex flex-col group overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-2xl dark:shadow-black/60 text-center">
                        <div class="mb-8 overflow-hidden rounded-2xl">
                            <img src="{{ asset('images/gosor/about/mission.png') }}" alt="{{ __('landing.about.mission_title') }}" class="w-full h-auto object-cover pointer-events-none" loading="lazy" />
                        </div>
                        <div class="flex flex-col items-center">
                            <h3 class="text-3xl font-extrabold text-slate-900 dark:text-slate-100 group-hover:text-cyan-600 dark:group-hover:text-cyan-400 transition mb-4">
                                {{ __('landing.about.mission_title') }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-350 text-sm sm:text-base leading-relaxed max-w-md">
                                {{ __('landing.about.mission_text') }}
                            </p>
                        </div>
                    </div>

                    <!-- Vision Card -->
                    <div data-aos="fade-left" class="relative rounded-3xl bg-white dark:bg-slate-950/30 border border-slate-200/80 dark:border-slate-800/80 p-8 hover:border-indigo-500/40 dark:hover:border-indigo-500/30 transition duration-300 flex flex-col group overflow-hidden shadow-xl shadow-slate-200/50 dark:shadow-2xl dark:shadow-black/60 text-center">
                        <div class="mb-8 overflow-hidden rounded-2xl">
                            <img src="{{ asset('images/gosor/about/vision.png') }}" alt="{{ __('landing.about.vision_title') }}" class="w-full h-auto object-cover pointer-events-none" loading="lazy" />
                        </div>
                        <div class="flex flex-col items-center">
                            <h3 class="text-3xl font-extrabold text-slate-900 dark:text-slate-100 group-hover:text-indigo-600 dark:group-hover:text-indigo-400 transition mb-4">
                                {{ __('landing.about.vision_title') }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-350 text-sm sm:text-base leading-relaxed max-w-md">
                                {{ __('landing.about.vision_text') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Core Values Section -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-900 dark:text-slate-100 tracking-tight mb-4">
                        {{ __('landing.values.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400">
                        {{ __('landing.values.subtitle') }}
                    </p>
                </div>

                <div class="flex flex-col md:flex-row justify-center gap-6 max-w-7xl mx-auto">
                    @foreach([
                            ['text' => __('landing.values.items.quality'), 'icon' => @svg('iconsax-lin-medal', 'w-10 h-10'), "color" => "text-indigo-600 dark:text-indigo-400"],
                            ['text' => __('landing.values.items.innovation'), 'icon' => @svg('iconoir-light-bulb', 'w-10 h-10'), "color" => "text-sky-600 dark:text-sky-400"],
                            ['text' => __('landing.values.items.customer_satisfaction'), 'icon' => @svg('bi-people', 'w-10 h-10'), "color" => "text-red-600 dark:text-red-400"],
                            ['text' => __('landing.values.items.teamwork'), 'icon' => @svg('lucide-handshake', 'w-10 h-10'), "color" => "text-orange-600 dark:text-orange-400"],
                            ['text' => __('landing.values.items.transparency'), 'icon' => @svg('fluentui-shield-16-o', 'w-10 h-10'), "color" => "text-pink-600 dark:text-pink-400"]
                        ] as $index => $value)
                                <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" class="flex flex-col items-center gap-4 bg-white dark:bg-slate-900/40 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl min-w-60 hover:border-cyan-500/40 transition duration-300 shadow-md shadow-slate-200/50 dark:shadow-none">
                                    <div class="w-20 h-20 rounded-xl bg-slate-50 dark:bg-slate-600/30 flex items-center justify-center border border-slate-200 dark:border-slate-800 p-4 {{$value['color']}}">
                                        {{$value['icon']}}
                                    </div>
                                    <span class="text-base font-bold text-slate-800 dark:text-slate-200 tracking-wide uppercase text-center">{{ $value['text'] }}</span>
                                </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Our Services Section -->
        <section id="services" class="py-24 bg-slate-50 dark:bg-[#101133] relative overflow-hidden transition-colors duration-200">
            <!-- Glowing background gradient -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-blue-900/10 dark:from-blue-900/20 via-transparent to-transparent z-0 pointer-events-none"></div>
            <div class="absolute top-[20%] left-[10%] w-[500px] h-[500px] rounded-full bg-blue-600/5 dark:bg-blue-600/10 blur-[130px] pointer-events-none"></div>
            <div class="absolute bottom-[20%] right-[10%] w-[600px] h-[600px] rounded-full bg-indigo-600/5 dark:bg-indigo-600/10 blur-[140px] pointer-events-none"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-4xl mx-auto mb-20" data-aos="fade-up">
                    {{-- <span class="inline-flex items-center gap-1.5 rounded-full bg-sky-500/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-sky-600 dark:text-sky-400 border border-sky-500/20 uppercase mb-4">
                        {{ __('landing.services.badge') }}
                    </span> --}}
                    <h2 class="text-4xl font-extrabold sm:text-5xl lg:text-6xl text-slate-900 dark:text-slate-100 tracking-tight mb-6">
                        {{ __('landing.services.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-base sm:text-lg max-w-3xl mx-auto">
                        {{ __('landing.services.subtitle') }}
                    </p>
                </div>

                <!-- Services Grid (3 columns desktop, responsive) -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @php
                        $serviceIcons = [
                            'web' => '<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-.778.099-1.533.284-2.253m0 0A17.919 17.919 0 0 0 12 10.5a17.918 17.918 0 0 0 8.716-2.253"/></svg>',
                            'mobile' => '<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/></svg>',
                            'ecommerce' => '<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 0 0-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 0 0-16.536-1.84M7.5 14.25 5.106 5.272M6 20.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Zm12.75 0a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0Z"/></svg>',
                            'education' => '<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.57 50.57 0 0 0-2.658-.813A5.905 5.905 0 0 1 8 3.743 6.002 6.002 0 0 1 12 1.5c1.47 0 2.783.528 3.79 1.4L18 3.743a5.905 5.905 0 0 1 6.877 5.59c-.43.14-.863.272-1.3.393m-19.317 0A48.636 48.636 0 0 1 12 12.75c2.914 0 5.688-.507 8.258-1.428m0 0a50.603 50.603 0 0 0 2.658-.813M21 14.25v2.625c0 1.242-1.008 2.25-2.25 2.25H5.25A2.25 2.25 0 0 1 3 16.875V14.25"/></svg>',
                            'erp_crm' => '<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.25 21h19.5m-18-18v18m10.5-18v18m6-13.5V21M6.75 6.75h.75m-.75 3h.75m-.75 3h.75m3-6h.75m-.75 3h.75m-.75 3h.75M6.75 21v-3.375c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21M3 3h18v3H3V3Z"/></svg>',
                            'ai' => '<svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 18a3.75 3.75 0 0 0 .495-7.467 5.99 5.99 0 0 0-1.925 3.546 5.974 5.974 0 0 1-2.133-1A3.75 3.75 0 0 0 12 18Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9.75 9.75c0 .071 0 .141.002.211a5.986 5.986 0 0 0 3.748-3.748 3.75 3.75 0 1 0-3.75 3.537Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3"/></svg>',
                        ];
                    @endphp

                    @foreach($services as $index => $service)
                        <!-- Service Card -->
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="relative rounded-4xl bg-white dark:bg-slate-950/40 border border-slate-200/80 dark:border-slate-800/80 p-10 hover:border-blue-500/40 dark:hover:border-blue-500/30 transition-all duration-300 group flex flex-col justify-between shadow-xl shadow-slate-200/60 dark:shadow-2xl dark:shadow-black/60">
                            <div>
                                <!-- Icon Container -->
                                <div class="w-14 h-14 rounded-2xl bg-blue-600 text-white flex items-center justify-center mb-8 shadow-lg shadow-blue-600/20">
                                    {!! $serviceIcons[$service->icon] ?? $serviceIcons['web'] !!}
                                </div>

                                <!-- Title -->
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mb-4 group-hover:text-blue-600 dark:group-hover:text-cyan-400 transition">
                                    {{ $service->name }}
                                </h3>

                                <!-- Description -->
                                <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed mb-8">
                                    {{ $service->description }}
                                </p>
                            </div>

                            <!-- Bottom border/glow accent line -->
                            <div class="w-14 h-1.5 bg-blue-600/80 rounded-full"></div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section id="why-us" class="py-24 bg-slate-100/60 dark:bg-[#111133] relative overflow-hidden transition-colors duration-200">
            <!-- Glowing background gradient -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-indigo-900/10 dark:from-indigo-900/15 via-transparent to-transparent z-0 pointer-events-none"></div>
            <div class="absolute top-[20%] right-[10%] w-[500px] h-[500px] rounded-full bg-indigo-600/5 dark:bg-indigo-600/10 blur-[130px] pointer-events-none"></div>
            <div class="absolute bottom-[20%] left-[10%] w-[600px] h-[600px] rounded-full bg-cyan-600/5 dark:bg-cyan-600/10 blur-[140px] pointer-events-none"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
                    {{-- <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-500/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-indigo-600 dark:text-indigo-400 border border-indigo-500/20 uppercase mb-4">
                        {{ __('landing.why_us.badge') }}
                    </span> --}}
                    <h2 class="text-4xl font-extrabold sm:text-5xl text-slate-900 dark:text-slate-100 tracking-tight mb-6">
                        {{ __('landing.why_us.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-base sm:text-lg">
                        {{ __('landing.why_us.subtitle') }}
                    </p>
                </div>

                @php
                    $whyUsCards = [
                        [
                            'key' => 'expertise',
                            'image' => 'specialized_expertise.png',
                            'color' => 'text-cyan-600 dark:text-cyan-400',
                            'bg_bar' => 'bg-cyan-500',
                            'border_hover' => 'hover:border-cyan-500/40',
                            'bullet_border' => 'border-cyan-500/50',
                            'bullet_bg' => 'bg-cyan-500 dark:bg-cyan-400',
                        ],
                        [
                            'key' => 'solutions',
                            'image' => 'integrated_solutions.png',
                            'color' => 'text-rose-600 dark:text-rose-400',
                            'bg_bar' => 'bg-rose-500',
                            'border_hover' => 'hover:border-rose-500/40',
                            'bullet_border' => 'border-rose-500/50',
                            'bullet_bg' => 'bg-rose-500 dark:bg-rose-400',
                        ],
                        [
                            'key' => 'tech',
                            'image' => 'advanced_technologies.png',
                            'color' => 'text-indigo-600 dark:text-indigo-400',
                            'bg_bar' => 'bg-indigo-500',
                            'border_hover' => 'hover:border-indigo-500/40',
                            'bullet_border' => 'border-indigo-500/50',
                            'bullet_bg' => 'bg-indigo-500 dark:bg-indigo-400',
                        ],
                        [
                            'key' => 'pricing',
                            'image' => 'competitve_pricing.png',
                            'color' => 'text-purple-600 dark:text-purple-400',
                            'bg_bar' => 'bg-purple-500',
                            'border_hover' => 'hover:border-purple-500/40',
                            'bullet_border' => 'border-purple-500/50',
                            'bullet_bg' => 'bg-purple-500 dark:bg-purple-400',
                        ],
                        [
                            'key' => 'support',
                            'image' => 'continuous_support.png',
                            'color' => 'text-amber-600 dark:text-orange-400',
                            'bg_bar' => 'bg-orange-500',
                            'border_hover' => 'hover:border-orange-500/40',
                            'bullet_border' => 'border-orange-500/50',
                            'bullet_bg' => 'bg-orange-500 dark:bg-orange-400',
                        ],
                        [
                            'key' => 'partnership',
                            'image' => 'true_partnership.png',
                            'color' => 'text-fuchsia-600 dark:text-fuchsia-400',
                            'bg_bar' => 'bg-fuchsia-500',
                            'border_hover' => 'hover:border-fuchsia-500/40',
                            'bullet_border' => 'border-fuchsia-500/50',
                            'bullet_bg' => 'bg-fuchsia-500 dark:bg-fuchsia-400',
                        ],
                    ];
                @endphp

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @foreach($whyUsCards as $index => $card)
                        @php
                            $item = __('landing.why_us.items.' . $card['key']);
                        @endphp
                        <div data-aos="zoom-in-up" data-aos-delay="{{ ($index % 3) * 100 }}" class="relative rounded-4xl bg-white dark:bg-slate-950/40 border border-slate-200/80 dark:border-slate-800/80 p-8 sm:p-10 transition-all duration-300 group flex flex-col justify-between shadow-xl shadow-slate-200/60 dark:shadow-2xl dark:shadow-black/60 {{ $card['border_hover'] }}">
                            <div>
                                <!-- Top Accent Bar -->
                                <div class="w-14 h-1.5 {{ $card['bg_bar'] }} rounded-full mb-6"></div>

                                <!-- Title -->
                                <h3 class="text-2xl font-bold mb-4 tracking-tight {{ $card['color'] }}">
                                    {{ $item['title'] }}
                                </h3>

                                <!-- Description -->
                                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed">
                                    {{ $item['description'] }}
                                </p>

                                <!-- Image Container -->
                                <div class="flex justify-center my-8 h-40 relative">
                                    <img src="{{ asset('images/gosor/why_us/'.$card['image']) }}" alt="{{ $item['title'] }}" class="h-full object-contain pointer-events-none transition duration-500 group-hover:scale-105" loading="lazy" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Our Products / Ready Systems Section -->
        <section id="products" class="py-20 border-t border-slate-200 dark:border-slate-900/60 bg-gradient-to-b from-indigo-50/70 to-slate-100 dark:bg-radial dark:bg-top dark:from-[#32326e] dark:to-[#101336] relative transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    {{-- <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-cyan-600 dark:text-cyan-400 border border-cyan-500/20 uppercase mb-4">
                        {{ __('landing.products.badge') }}
                    </span> --}}
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-900 dark:text-slate-100 tracking-tight mb-6">
                        {{ __('landing.products.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed sm:text-lg">
                        {{ __('landing.products.subtitle') }}
                    </p>
                </div>

                <!-- Products Grid -->
                <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                    @foreach($platforms as $index => $platform)
                        <div data-aos="{{ $index % 2 === 0 ? 'fade-right' : 'fade-left' }}" data-project-title="{{ $platform->name }}" class="relative rounded-3xl bg-white dark:bg-slate-900/35 border border-slate-200/80 dark:border-slate-800/80 p-8 hover:border-indigo-500/40 dark:hover:border-indigo-500/25 transition duration-300 flex flex-col justify-between group overflow-hidden shadow-xl shadow-slate-200/60 dark:shadow-2xl dark:shadow-black/60 cursor-pointer">
                            <div>
                                <!-- Product Icon and Title Row -->
                                @php
                                    $platformIcons = [
                                        // Edu-Bridge: graduation cap
                                        0 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482.065C3.807 5.886 7.741 3.75 12 3.75c4.26 0 8.193 2.137 10.522 5.397M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />',
                                        // HR Management: users/people
                                        1 => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z" />',
                                    ];
                                    $iconPath = $platformIcons[$index] ?? $platformIcons[0];
                                @endphp
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center group-hover:bg-indigo-600 group-hover:text-white transition duration-300">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {!! $iconPath !!}
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 group-hover:text-indigo-600 dark:group-hover:text-cyan-400 transition">
                                        {{ $platform->name }}
                                    </h3>
                                </div>

                                <!-- Description -->
                                <p class="text-slate-600 dark:text-slate-400 text-sm leading-relaxed mb-8">
                                    {{ $platform->description }}
                                </p>

                                <!-- Features list -->
                                @if($platform->features && is_array($platform->features))
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-4 mb-8">
                                    @foreach($platform->features as $featureItem)
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-indigo-500/80 shadow-[0_0_8px_rgba(99,102,241,0.5)]"></span>
                                            <span class="text-xs text-slate-700 dark:text-slate-300 font-medium">{{ $featureItem['feature'] ?? $featureItem }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <!-- Full width button -->
                            @if(str_contains(strtolower($platform->name ?? ''), 'hr') || $index === 1)
                                <a href="{{ route('gosor-hr') }}" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-emerald-600 to-teal-600 hover:from-emerald-500 hover:to-teal-500 px-5 py-4 font-semibold text-white transition duration-200 shadow-lg shadow-emerald-600/20">
                                    <span>{{ app()->getLocale() === 'ar' ? 'استكشف نظام Gosor HR' : 'Explore Gosor HR System' }}</span>
                                    <svg class="h-4 w-4 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            @elseif(str_contains(strtolower($platform->name ?? ''), 'edu') || str_contains(strtolower($platform->name ?? ''), 'bridge') || $index === 0)
                                <a href="{{ route('edu-bridge') }}" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-gradient-to-r from-indigo-600 via-purple-600 to-cyan-500 hover:from-indigo-500 hover:to-cyan-400 px-5 py-4 font-semibold text-white transition duration-200 shadow-lg shadow-indigo-600/20">
                                    <span>{{ app()->getLocale() === 'ar' ? 'استكشف منصة Edu Bridge وتطبيق الطلاب' : 'Explore Edu Bridge & Student App' }}</span>
                                    <svg class="h-4 w-4 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            @else
                                <a href="#contact" data-project-title="{{ $platform->name }}" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-indigo-600/90 hover:bg-indigo-600 px-5 py-4 font-semibold text-white transition duration-200 shadow-lg shadow-indigo-600/10">
                                    <span>{{ __('landing.nav.get_started') }}</span>
                                    <svg class="h-4 w-4 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Technologies We Use Section -->
        <section class="py-24 bg-slate-50 dark:bg-[#111133] relative overflow-hidden transition-colors duration-200">
            <!-- Glowing background elements inside the section -->
            <div class="absolute inset-0 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-indigo-900/5 dark:from-indigo-900/10 via-transparent to-transparent z-0 pointer-events-none"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-900 dark:text-slate-100 tracking-tight mb-6">
                        {{ __('landing.tech.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed">
                        {{ __('landing.tech.subtitle') }}
                    </p>
                </div>
            </div>

            @php
                $technologies = [
                    ['name' => 'Laravel',      'logo' => '<i class="devicon-laravel-original colored text-5xl"></i>',                                                         'glow' => 'rgba(255,80,50,0.35)'],
                    ['name' => 'React',         'logo' => '<i class="devicon-react-original colored text-5xl"></i>',                                                          'glow' => 'rgba(97,218,251,0.35)'],
                    ['name' => 'Next.js',       'logo' => '<i class="devicon-nextjs-plain dark:text-white text-slate-900 text-5xl"></i>',                                    'glow' => 'rgba(200,200,200,0.25)'],
                    ['name' => 'Flutter',       'logo' => '<img alt="flutter" width="52" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/flutter/flutter-original.svg" />', 'glow' => 'rgba(83,215,249,0.35)'],
                    ['name' => '.NET',          'logo' => '<i class="devicon-dot-net-plain colored text-5xl"></i>',                                                          'glow' => 'rgba(95,0,210,0.35)'],
                    ['name' => 'TypeScript',    'logo' => '<img alt="typescript" width="52" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-original.svg" />', 'glow' => 'rgba(49,120,198,0.35)'],
                    ['name' => 'Go',            'logo' => '<i class="devicon-go-original-wordmark colored text-5xl"></i>',                                                   'glow' => 'rgba(0,173,216,0.35)'],
                    ['name' => 'MySQL',         'logo' => '<img alt="mysql" width="68" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original-wordmark.svg" />', 'glow' => 'rgba(0,116,168,0.35)'],
                    ['name' => 'Figma',         'logo' => '<img alt="figma" width="44" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/figma/figma-original.svg" />', 'glow' => 'rgba(162,89,255,0.35)'],
                    ['name' => 'Data Analysis', 'logo' => '<svg width="52" height="52" viewBox="0 0 48 48" fill="none"><rect width="48" height="48" rx="12" fill="#06b6d4" fill-opacity="0.15"/><path d="M12 36V28M20 36V20M28 36V24M36 36V16" stroke="#38bdf8" stroke-width="3.5" stroke-linecap="round"/><path d="M12 24L20 16L28 20L36 12" stroke="#06b6d4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="36" cy="12" r="3" fill="#06b6d4"/></svg>', 'glow' => 'rgba(6,182,212,0.35)'],
                    ['name' => 'AI',            'logo' => '<svg width="52" height="52" viewBox="0 0 48 48" fill="none"><rect width="48" height="48" rx="12" fill="#a855f7" fill-opacity="0.15"/><rect x="14" y="14" width="20" height="20" rx="6" stroke="#a855f7" stroke-width="2.5"/><circle cx="24" cy="24" r="4" fill="#818cf8"/><path d="M20 9V14M28 9V14M20 34V39M28 34V39M9 20H14M9 28H14M34 20H39M34 28H39" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round"/></svg>', 'glow' => 'rgba(168,85,247,0.35)'],
                ];
            @endphp

            <!-- Static tech cards grid -->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-wrap justify-center gap-5" data-aos="fade-up" data-aos-delay="100">
                    @foreach($technologies as $index => $tech)
                        <div class="tech-card-item group w-36 h-44 relative cursor-pointer"
                             style="--glow: {{ $tech['glow'] }}"
                             data-aos="zoom-in" data-aos-delay="{{ $index * 60 }}">
                            <!-- Card -->
                            <div class="absolute inset-0 rounded-2xl
                                        bg-white dark:bg-gradient-to-b dark:from-[#1c1d54] dark:via-[#101132] dark:to-[#06071f]
                                        border border-slate-200/80 dark:border-indigo-500/20
                                        shadow-md dark:shadow-xl dark:shadow-black/50
                                        transition-all duration-300
                                        group-hover:shadow-[0_0_24px_var(--glow)] group-hover:border-[color:var(--glow)]">
                            </div>
                            <!-- Top inner glow (dark) -->
                            <div class="absolute inset-0 rounded-2xl pointer-events-none hidden dark:block
                                        bg-[radial-gradient(ellipse_at_top,rgba(99,102,241,0.18),transparent_60%)]"></div>
                            <!-- Hover color bloom -->
                            <div class="absolute inset-0 rounded-2xl pointer-events-none
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-300
                                        bg-[radial-gradient(ellipse_at_center,var(--glow),transparent_65%)]"></div>
                            <!-- Gloss -->
                            <div class="absolute inset-0 rounded-2xl pointer-events-none hidden dark:block
                                        opacity-0 group-hover:opacity-100 transition-opacity duration-300
                                        bg-gradient-to-br from-white/8 via-transparent to-transparent"></div>
                            <!-- Content -->
                            <div class="absolute inset-0 flex flex-col items-center justify-center gap-3 p-4">
                                <div class="transition-transform duration-300 group-hover:scale-110 group-hover:-translate-y-1 flex items-center justify-center">
                                    {!! $tech['logo'] !!}
                                </div>
                                <span class="text-sm font-semibold text-slate-700 dark:text-slate-200 text-center leading-tight">
                                    {{ $tech['name'] }}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        @if(!empty($partners) && count($partners) > 0)
        <!-- Our Partners / Companies Section (Static Grid, Larger Logos) -->
        <section class="py-24 bg-slate-100/60 dark:bg-[#101133] border-t border-slate-200 dark:border-slate-900/60 overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mb-14">
                <div class="text-center max-w-3xl mx-auto" data-aos="fade-up">
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-900 dark:text-slate-100 tracking-tight mb-4">
                        {{ __('landing.partners.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-base sm:text-lg">
                        {{ __('landing.partners.subtitle') }}
                    </p>
                </div>
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap items-center justify-center gap-6 sm:gap-8" data-aos="fade-up">
                    @foreach($partners as $partner)
                        <div class="h-28 sm:h-32 w-48 sm:w-56 px-6 py-5 rounded-3xl bg-white dark:bg-slate-900/50 border border-slate-200/80 dark:border-slate-800/80 hover:border-cyan-500/50 dark:hover:border-cyan-500/40 flex items-center justify-center group transition-all duration-300 dark:shadow-none hover:shadow-xl hover:-translate-y-1">
                            <img src="{{ $partner->logo_url ?? asset('images/gosor/partners/' . basename($partner->logo)) }}" alt="{{ $partner->name }}"
                                 class="max-h-20 sm:max-h-24 w-auto max-w-full object-contain pointer-events-none transition-transform duration-300 group-hover:scale-110"
                                 loading="lazy"
                                 onerror="this.parentElement.style.display='none'" />
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        <!-- Our Strategic Goals Section -->
        <section id="goals" class="py-24 bg-slate-100/60 dark:bg-[#111133] relative overflow-hidden transition-colors duration-200">
            <!-- Ambient glows for the section -->
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] rounded-full bg-indigo-600/5 blur-[120px] pointer-events-none"></div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
                    {{-- <span class="inline-flex items-center gap-1.5 rounded-full bg-sky-500/10 border border-sky-500/30 px-4 py-1.5 text-xs font-semibold tracking-wider text-sky-600 dark:text-sky-400 uppercase mb-6 shadow-inner">
                        {{ __('landing.goals.badge') }}
                    </span> --}}
                    <h2 class="text-4xl font-extrabold sm:text-5xl text-slate-900 dark:text-slate-100 tracking-tight mb-6">
                        {{ __('landing.goals.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 text-base sm:text-lg max-w-2xl mx-auto leading-relaxed">
                        {{ __('landing.goals.subtitle') }}
                    </p>
                </div>

                <!-- Strategic Goals Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8 max-w-7xl mx-auto">
                    @php
                        $goalMeta = [
                            'sustainability' => [
                                'image' => 'sustainability.png',
                                'gradient' => 'from-orange-500/[0.04] to-transparent',
                                'glow' => 'bg-orange-500/10',
                                'border' => 'border-orange-500/10 hover:border-orange-500/30 shadow-orange-500/5',
                            ],
                            'satisfaction' => [
                                'image' => 'customer_satisfaction.png',
                                'gradient' => 'from-purple-500/[0.04] to-transparent',
                                'glow' => 'bg-purple-500/10',
                                'border' => 'border-purple-500/10 hover:border-purple-500/30 shadow-purple-500/5',
                            ],
                            'innovation' => [
                                'image' => 'innovation.png',
                                'gradient' => 'from-pink-500/[0.04] to-transparent',
                                'glow' => 'bg-pink-500/10',
                                'border' => 'border-pink-500/10 hover:border-pink-500/30 shadow-pink-500/5',
                            ],
                            'quality' => [
                                'image' => 'quality.png',
                                'gradient' => 'from-cyan-500/[0.04] to-transparent',
                                'glow' => 'bg-cyan-500/10',
                                'border' => 'border-cyan-500/10 hover:border-cyan-500/30 shadow-cyan-500/5',
                            ]
                        ];
                    @endphp

                    @foreach(['sustainability', 'satisfaction', 'innovation', 'quality'] as $index => $key)
                        <div data-aos="flip-left" data-aos-delay="{{ $index * 150 }}" class="relative group rounded-4xl bg-white dark:bg-gradient-to-b {{ $goalMeta[$key]['gradient'] }} dark:bg-[#080c1e]/40 border border-slate-200/90 {{ $goalMeta[$key]['border'] }} px-6 py-10 hover:-translate-y-2 transition-all duration-500 flex flex-col justify-between items-center text-center h-120 shadow-xl shadow-slate-200/60 dark:shadow-2xl dark:shadow-black/60 overflow-hidden">
                            <!-- Glowing orb on hover behind the image -->
                            <div class="absolute -bottom-16 left-1/2 -translate-x-1/2 w-48 h-48 rounded-full {{ $goalMeta[$key]['glow'] }} blur-[50px] opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>

                            <div class="flex flex-col items-center">
                                <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight mb-5 group-hover:text-slate-950 dark:group-hover:text-white transition duration-300">
                                    {{ __('landing.goals.items.' . $key . '.title') }}
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed max-w-70 mx-auto">
                                    {{ __('landing.goals.items.' . $key . '.description') }}
                                </p>
                            </div>

                            <!-- Image Container centered at the bottom -->
                            <div class="w-full flex items-center justify-center h-40 mt-auto relative z-10 pb-2">
                                <img src="{{ asset('images/gosor/goals/'.$goalMeta[$key]['image']) }}" alt="{{ __('landing.goals.items.' . $key . '.title') }}" class="h-full object-contain pointer-events-none group-hover:scale-105 transition-transform duration-500" loading="lazy" />
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Let's Start a Conversation / Contact Section (Screenshot 2 layout) -->
        <section id="contact" class="py-20 bg-gradient-to-b from-indigo-50/60 to-slate-100 dark:bg-radial dark:bg-top dark:from-[#32326e] dark:to-[#111133] relative overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    {{-- <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-cyan-600 dark:text-cyan-400 border border-cyan-500/20 uppercase mb-4 font-sans">
                        {{ __('landing.contact.badge') }}
                    </span> --}}
                    <h2 class="text-4xl font-extrabold text-slate-900 dark:text-slate-100 tracking-tight mb-4">
                        {{ __('landing.contact.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed max-w-2xl mx-auto">
                        {{ __('landing.contact.subtitle') }}
                    </p>
                </div>

                <!-- Two-Column Contact Setup -->
                <div class="grid lg:grid-cols-5 gap-12 max-w-6xl mx-auto items-start">
                    
                    <!-- Left Side Details: Location, Phone, Website, Follow Us Cards -->
                    <div class="lg:col-span-2 space-y-6" data-aos="fade-right">
                        <!-- Location Card -->
                        <div class="relative rounded-2xl bg-white dark:bg-slate-900/40 border border-slate-200/80 dark:border-slate-800/80 p-5 flex items-center gap-4 hover:border-cyan-500/40 dark:hover:border-cyan-500/20 transition-all duration-300 shadow-md shadow-slate-200/50 dark:shadow-none">
                            <div class="w-11 h-11 rounded-xl bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center shrink-0">
                                <x-akar-location class="w-6 h-6"/>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.location_title') }}</span>
                                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 mt-0.5 block">{{ $settings['location'] ?? __('landing.contact.details.location_val') }}</span>
                            </div>
                        </div>

                        <!-- Phone Card -->
                        <div class="relative rounded-2xl bg-white dark:bg-slate-900/40 border border-slate-200/80 dark:border-slate-800/80 p-5 flex items-center gap-4 hover:border-cyan-500/40 dark:hover:border-cyan-500/20 transition-all duration-300 shadow-md shadow-slate-200/50 dark:shadow-none">
                            <div class="w-11 h-11 rounded-xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0">
                                <x-heroicon-o-phone class="w-6 h-6"/>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.phone_title') }}</span>
                                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 mt-0.5 block font-sans">{{ $settings['phone'] ?? __('landing.contact.details.phone_val') }}</span>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="relative rounded-2xl bg-white dark:bg-slate-900/40 border border-slate-200/80 dark:border-slate-800/80 p-5 flex items-center gap-4 hover:border-cyan-500/40 dark:hover:border-cyan-500/20 transition-all duration-300 shadow-md shadow-slate-200/50 dark:shadow-none">
                            <div class="w-11 h-11 rounded-xl bg-pink-500/10 text-pink-600 dark:text-pink-400 flex items-center justify-center shrink-0">
                                <x-eva-email-outline class="w-6 h-6"/>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.web_title') }}</span>
                                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 mt-0.5 block font-sans">{{ $settings['email'] ?? __('landing.contact.details.web_val') }}</span>
                            </div>
                        </div>

                        <!-- Follow Us Card -->
                        <div class="relative rounded-2xl bg-white dark:bg-slate-900/40 border border-slate-200/80 dark:border-slate-800/80 p-5 flex flex-col gap-3 hover:border-cyan-500/40 dark:hover:border-cyan-500/20 transition-all duration-300 shadow-md shadow-slate-200/50 dark:shadow-none">
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.follow') }}</span>
                            <div class="flex items-center gap-3 mt-1">
                                @if(isset($settings['facebook']) && $settings['facebook'])
                                <a aria-label="facebook" href="{{ $settings['facebook'] }}" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-950 border border-slate-200 dark:border-slate-850 hover:border-cyan-500/40 hover:text-cyan-600 dark:hover:text-cyan-400 text-slate-600 dark:text-slate-300 flex items-center justify-center transition duration-150">
                                    <x-fab-facebook class="w-6 h-6"/>
                                </a>
                                @endif
                                @if(isset($settings['linkedin']) && $settings['linkedin'])
                                <a aria-label="linkedin" href="{{ $settings['linkedin'] }}" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-slate-950 border border-slate-200 dark:border-slate-850 hover:border-cyan-500/40 hover:text-cyan-600 dark:hover:text-cyan-400 text-slate-600 dark:text-slate-300 flex items-center justify-center transition duration-150">
                                    <x-fab-linkedin class="w-6 h-6"/>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Input Form -->
                    <div class="lg:col-span-3 rounded-3xl bg-white dark:bg-slate-900/30 border border-slate-200/80 dark:border-slate-800/80 p-8 backdrop-blur-md shadow-2xl shadow-slate-200/70 dark:shadow-2xl dark:shadow-black/60 relative" data-aos="fade-left">
                        <!-- Subtle border flare -->
                        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-cyan-500/20 to-transparent"></div>

                        @if(session('success'))
                            <div class="mb-4 p-4 text-sm text-green-700 dark:text-green-400 bg-green-500/10 border border-green-500/20 rounded-xl">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form id="contact-form" action="{{ route('contact.store') }}" method="POST" class="space-y-5">
                            @csrf
                            <input type="hidden" name="_form_time" value="{{ encrypt(time()) }}">
                            <div style="display:none !important; visibility:hidden !important; opacity:0 !important; position:absolute !important; left:-9999px !important;">
                                <input type="text" name="_hp_company_website" tabindex="-1" autocomplete="off" value="" />
                            </div>

                            <!-- Name & Email Inputs Row -->
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.name') }}</label>
                                    <input type="text" name="name" required placeholder="{{ __('landing.contact.form.name_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-200 dark:border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.email') }}</label>
                                    <input type="email" name="email" required placeholder="{{ __('landing.contact.form.email_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-200 dark:border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150 font-sans">
                                </div>
                            </div>

                            <!-- Phone & Company Inputs Row -->
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.phone') }}</label>
                                    <input type="tel" name="phone" placeholder="{{ __('landing.contact.form.phone_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-200 dark:border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150 font-sans">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.company') }}</label>
                                    <input type="text" name="company" placeholder="{{ __('landing.contact.form.company_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-200 dark:border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150">
                                </div>
                            </div>

                            <!-- Project Type Dropdown Select -->
                            <div>
                                <label for="project_type" class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.project_type') }}</label>
                                <div class="relative">
                                    <input type="text" id="project_type" name="project_type" placeholder="{{ __('landing.contact.form.project_type') }}" class="w-full rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-200 dark:border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-300">
                                </div>
                            </div>

                            <!-- Message Textarea -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.message') }}</label>
                                <textarea name="message" required rows="4" placeholder="{{ __('landing.contact.form.message_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-slate-950/80 border border-slate-200 dark:border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150 resize-none"></textarea>
                            </div>

                            <!-- Form Submit Action -->
                            <div>
                                <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 px-6 py-4 font-semibold text-white shadow-lg shadow-cyan-500/20 hover:scale-101 hover:shadow-cyan-500/35 transition duration-150 text-center cursor-pointer">
                                    {{ __('landing.contact.form.send') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <!-- Footer Section (Screenshot 1 Layout) -->
    <footer class="bg-slate-100 dark:bg-[#111133] border-t border-slate-200 dark:border-slate-900 pt-20 pb-8 text-slate-600 dark:text-slate-400 relative overflow-hidden transition-colors duration-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10" data-aos="fade-up">
            
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 pb-16 border-b border-slate-200 dark:border-slate-900">
                
                <!-- Column 1: Logo & description & Newsletter -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center w-80 h-40">
                        <img src="{{ asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions Logo Footer" class="w-full h-full object-cover logo-themed">
                    </div>

                    <p class="text-sm text-slate-600 dark:text-slate-400 max-w-sm leading-relaxed">
                        {{ __('landing.footer.desc') }}
                    </p>

                    <!-- Subscribe Newsletter Field -->
                    <div class="space-y-3 pt-2">
                        <span class="block text-xs font-semibold text-slate-700 dark:text-slate-300 uppercase tracking-wider">{{ __('landing.footer.newsletter') }}</span>
                        <form onsubmit="event.preventDefault(); alert('Subscribed successfully! / ØªÙ… Ø§Ù„Ø§Ø´ØªØ±Ø§Ùƒ Ø¨Ù†Ø¬Ø§Ø­!');" class="flex gap-2 max-w-md">
                            <input type="email" required placeholder="{{ __('landing.footer.newsletter_placeholder') }}" class="w-full min-w-0 rounded-xl bg-white dark:bg-slate-950/80 border border-slate-200 dark:border-slate-900 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-2.5 text-sm text-slate-900 dark:text-slate-200 placeholder-slate-400 dark:placeholder-slate-650 outline-none transition duration-150 font-sans">
                            <button type="submit" class="shrink-0 rounded-xl bg-indigo-600 hover:bg-indigo-500 hover:shadow-indigo-600/20 shadow-lg px-5 py-2.5 text-sm font-semibold text-white transition duration-150 cursor-pointer">
                                {{ __('landing.footer.subscribe') }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Column 2: Quick Links (Nav links) -->
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.links_title1') }}</h3>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#home" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.nav.home') }}</a></li>
                        <li><a href="{{ route('edu-bridge') }}" class="hover:text-indigo-600 dark:hover:text-indigo-400 transition font-bold text-indigo-600 dark:text-indigo-400">Edu Bridge (LMS & App)</a></li>
                        <li><a href="{{ route('gosor-hr') }}" class="hover:text-emerald-600 dark:hover:text-emerald-400 transition font-bold text-emerald-600 dark:text-emerald-400">Gosor HR</a></li>
                        <li><a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.nav.services') }}</a></li>
                        <li><a href="#products" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.nav.products') }}</a></li>
                        <li><a href="{{ route('privacy-policy') }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.footer.privacy_policy') }}</a></li>
                        <li><a href="#contact" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.nav.contact') }}</a></li>
                    </ul>
                </div>

                <!-- Column 3: Quick Links (Services links) -->
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.links_title2') }}</h3>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.services.items.web.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.services.items.mobile.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.services.items.ecommerce.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.services.items.education.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.services.items.erp_crm.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-600 dark:hover:text-cyan-400 transition">{{ __('landing.services.items.ai.title') }}</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Info -->
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.contact_title') }}</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center gap-3">
                            <x-heroicon-o-phone class="w-6 h-6 text-indigo-500"/>
                            <span class="font-sans">01550099355</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-eva-email-outline class="w-6 h-6 text-pink-500"/>
                            <span class="font-sans">info@gosorsolutions.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-akar-location class="w-6 h-6 text-cyan-500"/>
                            <span>Cairo, Egypt</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Row: Copyright + Policy + socials -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6 pt-8 text-xs sm:text-sm">
                <div class="flex flex-wrap items-center justify-center sm:justify-start gap-3">
                    <span>&copy; {{ date('Y') }} {{ __('landing.footer.rights') }}</span>
                    <span>•</span>
                    <a href="{{ route('privacy-policy') }}" class="hover:text-cyan-600 dark:hover:text-cyan-400 underline-offset-4 hover:underline transition">
                        {{ __('landing.footer.privacy_policy') }}
                    </a>
                </div>
                
                <!-- Social media circular buttons -->
                <div class="flex items-center gap-3">
                    <!-- Facebook -->
                    @if(isset($settings['facebook']) && $settings['facebook'])
                    <a aria-label="facebook" href="{{ $settings['facebook'] }}" class="w-9 h-9 rounded-full bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-900 hover:border-cyan-500/40 hover:text-cyan-600 dark:hover:text-cyan-400 text-slate-600 dark:text-slate-400 flex items-center justify-center transition duration-150 shadow-sm dark:shadow-none">
                        <x-fab-facebook class="w-5 h-5"/>
                    </a>
                    @endif
                    <!-- LinkedIn -->
                    @if(isset($settings['linkedin']) && $settings['linkedin'])
                    <a aria-label="linkedin" href="{{ $settings['linkedin'] }}" class="w-9 h-9 rounded-full bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-900 hover:border-cyan-500/40 hover:text-cyan-600 dark:hover:text-cyan-400 text-slate-600 dark:text-slate-400 flex items-center justify-center transition duration-150 shadow-sm dark:shadow-none">
                        <x-fab-linkedin class="w-5 h-5"/>
                    </a>
                    @endif
                    @if(isset($settings['email']) && $settings['email'])
                    <a aria-label="email" href="mailto:{{ $settings['email']  }}" class="w-9 h-9 rounded-full bg-white dark:bg-slate-950 border border-slate-200 dark:border-slate-900 hover:border-cyan-500/40 hover:text-cyan-600 dark:hover:text-cyan-400 text-slate-600 dark:text-slate-400 flex items-center justify-center transition duration-150 shadow-sm dark:shadow-none">
                         <x-eva-email-outline class="w-5 h-5"/>
                    </a>
                    @endif
                </div>
            </div>
            
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    @if(isset($settings['whatsapp']) && $settings['whatsapp'])
    <a aria-label="whatsapp" href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp']) }}" target="_blank" 
       class="fixed bottom-6 right-6 z-50 flex h-14 w-14 items-center justify-center rounded-full text-white shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2"
       style="background-color: #25D366; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);">
        <x-fab-whatsapp class="w-10 h-10"/>
    </a>
    @endif

    <!-- Interactive Scripts (Locale menu, Theme toggle & Mobile menu togglers) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Theme Toggle Logic
            function updateThemeColorMeta(isDark) {
                const meta = document.getElementById('meta-theme-color');
                if (meta) {
                    meta.setAttribute('content', isDark ? '#070b13' : '#f8fafc');
                }
            }

            function toggleTheme() {
                const isDark = document.documentElement.classList.contains('dark');
                if (isDark) {
                    document.documentElement.classList.remove('dark');
                    document.documentElement.classList.add('light');
                    localStorage.setItem('theme', 'light');
                    updateThemeColorMeta(false);
                } else {
                    document.documentElement.classList.add('dark');
                    document.documentElement.classList.remove('light');
                    localStorage.setItem('theme', 'dark');
                    updateThemeColorMeta(true);
                }
            }

            const themeBtn = document.getElementById('theme-toggle-btn');
            if (themeBtn) {
                themeBtn.addEventListener('click', toggleTheme);
            }

            const mobileThemeBtn = document.getElementById('mobile-theme-toggle-btn');
            if (mobileThemeBtn) {
                mobileThemeBtn.addEventListener('click', toggleTheme);
            }

            // Language dropdown toggle
            const dropdownBtn = document.getElementById('lang-dropdown-btn');
            const dropdownMenu = document.getElementById('lang-dropdown-menu');
            
            if (dropdownBtn && dropdownMenu) {
                dropdownBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdownMenu.classList.toggle('hidden');
                });
                
                document.addEventListener('click', function() {
                    dropdownMenu.classList.add('hidden');
                });
            }

            // Mobile menu drawer toggle
            const mobileBtn = document.getElementById('mobile-menu-btn');
            const mobilePanel = document.getElementById('mobile-menu-panel');

            if (mobileBtn && mobilePanel) {
                mobileBtn.addEventListener('click', function() {
                    const isOpen = mobileBtn.classList.toggle('open');
                    
                    if (isOpen) {
                        mobilePanel.style.maxHeight = mobilePanel.scrollHeight + 'px';
                        mobilePanel.style.opacity = '1';
                        mobilePanel.style.marginTop = '0';
                    } else {
                        mobilePanel.style.maxHeight = '0';
                        mobilePanel.style.opacity = '0';
                        mobilePanel.style.marginTop = '0';
                    }
                });

                // Close menu when clicking on a link
                const mobileLinks = mobilePanel.querySelectorAll('a');
                mobileLinks.forEach(link => {
                    link.addEventListener('click', () => {
                        mobileBtn.classList.remove('open');
                        mobilePanel.style.maxHeight = '0';
                        mobilePanel.style.opacity = '0';
                    });
                });
            }

            // AJAX Form Submission
            const contactForm = document.getElementById('contact-form');
            if (contactForm) {
                contactForm.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    
                    const submitBtn = this.querySelector('button[type="submit"]');
                    const originalBtnText = submitBtn.innerHTML;
                    
                    // Disable button and show loading state
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h3zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        {{ __('landing.contact.form.sending') ?? 'Sending...' }}
                    `;

                    try {
                        const formData = new FormData(this);
                        const response = await fetch(this.action, {
                            method: 'POST',
                            body: formData,
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                                'Accept': 'application/json',
                            }
                        });

                        const result = await response.json();

                        if (response.ok && result.success) {
                            // Redirect to success page
                            window.location.href = result.redirect;
                        } else {
                            // Handle errors (e.g., validation)
                            alert(result.message || 'Something went wrong. Please try again.');
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnText;
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        alert('Something went wrong. Please try again.');
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = originalBtnText;
                    }
                });
            }

            // Auto-fill Project Type when clicking a portfolio project or product
            function fillProjectTypeAndScroll(title) {
                const input = document.getElementById('project_type') || document.querySelector('input[name="project_type"]');
                const contactSection = document.getElementById('contact');

                if (contactSection) {
                    contactSection.scrollIntoView({ behavior: 'smooth' });
                }

                if (input) {
                    input.value = title;
                    input.dispatchEvent(new Event('input', { bubbles: true }));
                    input.dispatchEvent(new Event('change', { bubbles: true }));

                    setTimeout(() => {
                        input.focus();
                        input.classList.add('ring-4', 'ring-cyan-500/40', '!border-cyan-500');
                        setTimeout(() => {
                            input.classList.remove('ring-4', 'ring-cyan-500/40', '!border-cyan-500');
                        }, 2500);
                    }, 500);
                }
            }

            document.addEventListener('click', function(e) {
                const trigger = e.target.closest('[data-project-title]');
                if (!trigger) return;

                const link = trigger.tagName.toLowerCase() === 'a' ? trigger : trigger.querySelector('a');
                const href = link ? link.getAttribute('href') : '';

                // If it's an external link, let it navigate
                if (href && href !== '#contact' && (href.startsWith('http://') || href.startsWith('https://'))) {
                    return;
                }

                e.preventDefault();
                const title = trigger.getAttribute('data-project-title');
                if (title) {
                    fillProjectTypeAndScroll(title);
                }
            });
        });
    </script>
@endsection