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
    <header class="sticky top-0 z-40 w-full border-b border-slate-200 dark:border-slate-800/80 bg-white/90 dark:bg-[#06080e]/90 backdrop-blur-md transition-all duration-300">
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
                    <a href="#home" class="px-3 py-2 text-sm font-medium text-[#283891] dark:text-[#7d93ff] hover:text-[#1d2b75] dark:hover:text-[#a5b4fc] transition duration-150">{{ __('landing.nav.home') }}</a>
                    <a href="#about" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition duration-150">{{ __('landing.nav.about') }}</a>
                    <a href="#services" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition duration-150">{{ __('landing.nav.services') }}</a>
                    <a href="#products" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition duration-150">{{ __('landing.nav.products') }}</a>
                    <a href="#goals" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition duration-150">{{ __('landing.nav.goals') }}</a>
                    <a href="#contact" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition duration-150">{{ __('landing.nav.contact') }}</a>
                </nav>

                <!-- Action buttons (Theme Toggle + Locale + CTA) -->
                <div class="hidden md:flex items-center gap-3">
                    <!-- Theme Mode Toggle Button -->
                    <button type="button" id="theme-toggle-btn" aria-label="Toggle theme" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:border-slate-300 dark:hover:border-slate-700 transition duration-150 cursor-pointer">
                        <!-- Sun icon (shown in dark mode) -->
                        <svg class="w-5 h-5 hidden dark:block text-amber-300 hover:rotate-45 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <!-- Moon icon (shown in light mode) -->
                        <svg class="w-5 h-5 block dark:hidden text-[#283891] hover:-rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Language Selector Dropdown Toggle -->
                    <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                        <button type="button" id="lang-dropdown-btn" class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:border-slate-300 dark:hover:border-slate-700 transition duration-150 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 cursor-pointer">
                            <x-eva-globe-outline class="w-5 h-5"/>
                            <span>{{ app()->getLocale() === 'ar' ? 'العربية' : 'En' }}</span>
                            <x-feathericon-chevron-down class="w-4 h-4"/>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="lang-dropdown-menu" class="hidden absolute right-0 rtl:left-0 rtl:right-auto mt-2 w-32 origin-top-right rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 z-50">
                            <div class="py-1">
                                <a href="{{ url('/?lang=en') }}" class="flex items-center px-4 py-2.5 text-sm {{ app()->getLocale() === 'en' ? 'text-[#283891] dark:text-[#7d93ff] bg-slate-100 dark:bg-slate-800 font-semibold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-white' }}">English</a>
                                <a href="{{ url('/?lang=ar') }}" class="flex items-center px-4 py-2.5 text-sm {{ app()->getLocale() === 'ar' ? 'text-[#283891] dark:text-[#7d93ff] bg-slate-100 dark:bg-slate-800 font-semibold' : 'text-slate-700 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-800/50 hover:text-slate-900 dark:hover:text-white' }}">العربية</a>
                            </div>
                        </div>
                    </div>

                    <!-- Get Started Primary Action Button -->
                    <a href="#contact" class="inline-flex items-center justify-center rounded-xl bg-[#283891] hover:bg-[#1d2b75] px-5 py-2.5 font-semibold text-white text-sm transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0">
                        {{ __('landing.nav.get_started') }}
                    </a>
                </div>

                <!-- Hamburger Mobile Menu Icon & Mobile Theme Switcher -->
                <div class="flex md:hidden items-center gap-2">
                    <!-- Mobile Theme Toggle Button -->
                    <button type="button" id="mobile-theme-toggle-btn" aria-label="Toggle theme" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff]">
                        <svg class="w-5 h-5 hidden dark:block text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden text-[#283891]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Fast Switch Language Button (Mobile inline toggle) -->
                    <a href="{{ url('/?lang=' . (app()->getLocale() === 'en' ? 'ar' : 'en')) }}" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] text-xs font-semibold uppercase tracking-wider">
                        {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
                    </a>

                    <button type="button" id="mobile-menu-btn" class="relative w-10 h-10 flex items-center justify-center rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-700 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white hover:bg-slate-200 dark:hover:bg-slate-800 transition duration-150">
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
        <div class="md:hidden border-t border-slate-200 dark:border-slate-800/80 bg-white/95 dark:bg-[#06080e]/95 backdrop-blur-lg px-4 overflow-hidden" id="mobile-menu-panel" style="max-height: 0; opacity: 0; transition: all 0.3s ease-in-out;">
            <div class="py-4 space-y-2">
                <a href="#home" class="block rounded-lg px-3 py-2 text-base font-medium text-[#283891] dark:text-[#7d93ff] bg-[#283891]/10 dark:bg-[#283891]/20">{{ __('landing.nav.home') }}</a>
                <a href="#about" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.about') }}</a>
                <a href="#services" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.services') }}</a>
                <a href="#products" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.products') }}</a>
                <a href="#goals" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.goals') }}</a>
                <a href="#contact" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-slate-100 dark:hover:bg-slate-900/30">{{ __('landing.nav.contact') }}</a>
                
                <div class="pt-4 border-t border-slate-200 dark:border-slate-800 flex justify-center">
                    <a href="#contact" class="w-full text-center rounded-xl bg-[#283891] hover:bg-[#1d2b75] px-5 py-3 font-semibold text-white transition-colors duration-200">
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
                <img src="{{ asset('images/gosor/hero.png') }}" alt="Gosor Solutions - Innovating Digital Horizons" class="w-full h-full opacity-20 dark:opacity-40 mix-blend-multiply dark:mix-blend-normal object-cover pointer-events-none" />
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-4xl mx-auto">

                    <!-- Large Title with solid color -->
                    <h1 data-aos="zoom-out" data-aos-delay="200" class="text-4xl font-extrabold sm:text-6xl lg:text-7xl leading-tight sm:leading-none tracking-tight mb-8 text-slate-900 dark:text-white">
                        {{ __('landing.hero.title') }}
                    </h1>

                    <!-- Paragraph Subtitle -->
                    <p data-aos="fade-up" data-aos-delay="400" class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 max-w-2xl mx-auto leading-relaxed mb-10">
                        {{ __('landing.hero.subtitle') }}
                    </p>

                    <!-- Call to Action Buttons -->
                    <div data-aos="fade-up" data-aos-delay="600" class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-20">
                        <!-- Primary CTA -->
                        <a href="#contact" class="inline-flex items-center gap-2 rounded-xl bg-[#283891] hover:bg-[#1d2b75] px-6 py-4 font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 active:translate-y-0 group">
                            <span>{{ __('landing.hero.cta_start') }}</span>
                            <!-- Dynamic Arrow based on direction -->
                            <svg class="h-5 w-5 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>

                        <!-- Secondary CTA -->
                        <a href="#services" class="inline-flex items-center justify-center rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 hover:text-[#283891] dark:bg-[#0c101d] dark:hover:bg-slate-800 dark:border-slate-800 px-6 py-4 font-semibold dark:text-slate-300 dark:hover:text-white transition-all duration-300 hover:-translate-y-0.5">
                            {{ __('landing.hero.cta_explore') }}
                        </a>
                    </div>

                    <!-- Statistics grid -->
                    <div data-aos="fade-up" data-aos-delay="800" class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto border-t border-slate-200 dark:border-slate-800 pt-16">
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
                                        <span class="text-xs sm:text-sm text-slate-500 dark:text-slate-400 font-medium mt-2 text-center">{{ $stat['label'] }}</span>
                                    </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <!-- About Us / Who We Are Section -->
        <section id="about" class="py-20 bg-slate-100/60 dark:bg-[#0c101d] relative overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
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
                    <div data-aos="fade-right" class="relative rounded-3xl bg-white dark:bg-[#06080e]/80 border border-slate-200 dark:border-slate-800 p-8 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-1.5 transition-all duration-300 flex flex-col group overflow-hidden text-center">
                        <div class="mb-8 overflow-hidden rounded-2xl">
                            <img src="{{ asset('images/gosor/about/mission.png') }}" alt="{{ __('landing.about.mission_title') }}" class="w-full h-auto object-cover pointer-events-none group-hover:scale-102 transition-transform duration-300" loading="lazy" />
                        </div>
                        <div class="flex flex-col items-center">
                            <h3 class="text-3xl font-extrabold text-slate-900 dark:text-slate-100 group-hover:text-[#283891] dark:group-hover:text-[#7d93ff] transition mb-4">
                                {{ __('landing.about.mission_title') }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-300 text-sm sm:text-base leading-relaxed max-w-md">
                                {{ __('landing.about.mission_text') }}
                            </p>
                        </div>
                    </div>

                    <!-- Vision Card -->
                    <div data-aos="fade-left" class="relative rounded-3xl bg-white dark:bg-[#06080e]/80 border border-slate-200 dark:border-slate-800 p-8 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-1.5 transition-all duration-300 flex flex-col group overflow-hidden text-center">
                        <div class="mb-8 overflow-hidden rounded-2xl">
                            <img src="{{ asset('images/gosor/about/vision.png') }}" alt="{{ __('landing.about.vision_title') }}" class="w-full h-auto object-cover pointer-events-none group-hover:scale-102 transition-transform duration-300" loading="lazy" />
                        </div>
                        <div class="flex flex-col items-center">
                            <h3 class="text-3xl font-extrabold text-slate-900 dark:text-slate-100 group-hover:text-[#283891] dark:group-hover:text-[#7d93ff] transition mb-4">
                                {{ __('landing.about.vision_title') }}
                            </h3>
                            <p class="text-slate-600 dark:text-slate-300 text-sm sm:text-base leading-relaxed max-w-md">
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
                            ['text' => __('landing.values.items.quality'), 'icon' => @svg('iconsax-lin-medal', 'w-10 h-10')],
                            ['text' => __('landing.values.items.innovation'), 'icon' => @svg('iconoir-light-bulb', 'w-10 h-10')],
                            ['text' => __('landing.values.items.customer_satisfaction'), 'icon' => @svg('bi-people', 'w-10 h-10')],
                            ['text' => __('landing.values.items.teamwork'), 'icon' => @svg('lucide-handshake', 'w-10 h-10')],
                            ['text' => __('landing.values.items.transparency'), 'icon' => @svg('fluentui-shield-16-o', 'w-10 h-10')]
                        ] as $index => $value)
                                <div data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}" class="flex flex-col items-center gap-4 bg-white dark:bg-[#06080e]/80 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl min-w-60 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-1 transition-all duration-300 group">
                                    <div class="w-20 h-20 rounded-xl bg-[#283891]/10 dark:bg-[#283891]/20 flex items-center justify-center border border-[#283891]/20 dark:border-[#283891]/40 p-4 text-[#283891] dark:text-[#7d93ff] transition-transform duration-300 group-hover:scale-110">
                                        {{$value['icon']}}
                                    </div>
                                    <span class="text-base font-bold text-slate-800 dark:text-slate-200 tracking-wide uppercase text-center">{{ $value['text'] }}</span>
                                </div>
                    @endforeach
                </div>
            </div>
        </section>


        <!-- Our Services Section -->
        <section id="services" class="py-24 bg-slate-50 dark:bg-[#06080e] relative overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-4xl mx-auto mb-20" data-aos="fade-up">
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
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}" class="relative rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-slate-800 p-8 sm:p-10 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-1.5 transition-all duration-300 group flex flex-col justify-between">
                            <div>
                                <!-- Icon Container -->
                                <div class="w-14 h-14 rounded-2xl bg-[#283891] text-white flex items-center justify-center mb-8 group-hover:scale-105 transition-transform duration-300">
                                    {!! $serviceIcons[$service->icon] ?? $serviceIcons['web'] !!}
                                </div>

                                <!-- Title -->
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 mb-4 group-hover:text-[#283891] dark:group-hover:text-[#7d93ff] transition">
                                    {{ $service->name }}
                                </h3>

                                <!-- Description -->
                                <p class="text-slate-600 dark:text-slate-400 text-base leading-relaxed mb-8">
                                    {{ $service->description }}
                                </p>
                            </div>

                            <!-- Bottom border accent line -->
                            <div class="w-14 h-1 bg-[#283891] rounded-full group-hover:w-20 transition-all duration-300"></div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section id="why-us" class="py-24 bg-slate-100/60 dark:bg-[#0c101d] relative overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
                    <h2 class="text-4xl font-extrabold sm:text-5xl text-slate-900 dark:text-slate-100 tracking-tight mb-6">
                        {{ __('landing.why_us.title') }}
                    </h2>
                    <p class="text-slate-600 dark:text-slate-400 leading-relaxed text-base sm:text-lg">
                        {{ __('landing.why_us.subtitle') }}
                    </p>
                </div>

                @php
                    $whyUsCards = [
                        ['key' => 'expertise',   'image' => 'specialized_expertise.png'],
                        ['key' => 'solutions',   'image' => 'integrated_solutions.png'],
                        ['key' => 'tech',        'image' => 'advanced_technologies.png'],
                        ['key' => 'pricing',     'image' => 'competitve_pricing.png'],
                        ['key' => 'support',     'image' => 'continuous_support.png'],
                        ['key' => 'partnership', 'image' => 'true_partnership.png'],
                    ];
                @endphp

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-7xl mx-auto">
                    @foreach($whyUsCards as $index => $card)
                        @php
                            $item = __('landing.why_us.items.' . $card['key']);
                        @endphp
                        <div data-aos="zoom-in-up" data-aos-delay="{{ ($index % 3) * 100 }}" class="relative rounded-3xl bg-white dark:bg-[#06080e]/80 border border-slate-200 dark:border-slate-800 p-8 sm:p-10 hover:-translate-y-1.5 transition-all duration-300 group flex flex-col justify-between hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60">
                            <div>
                                <!-- Top Accent Bar -->
                                <div class="w-14 h-1.5 bg-[#283891] rounded-full mb-6 group-hover:w-20 transition-all duration-300"></div>

                                <!-- Title -->
                                <h3 class="text-2xl font-bold mb-4 tracking-tight text-slate-900 dark:text-slate-100 group-hover:text-[#283891] dark:group-hover:text-[#7d93ff] transition">
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
            </div>
        </section>

        <!-- Our Products / Ready Systems Section -->
        <section id="products" class="py-20 border-t border-slate-200 dark:border-slate-800 bg-slate-100/50 dark:bg-[#06080e] relative transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
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
                        <div data-aos="{{ $index % 2 === 0 ? 'fade-right' : 'fade-left' }}" data-project-title="{{ $platform->name }}" class="relative rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-slate-800 p-8 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between group overflow-hidden cursor-pointer">
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
                                    <div class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center group-hover:bg-[#283891] group-hover:text-white transition duration-300">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            {!! $iconPath !!}
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-slate-900 dark:text-slate-100 group-hover:text-[#283891] dark:group-hover:text-[#7d93ff] transition">
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
                                            <span class="w-2 h-2 rounded-full bg-[#283891]"></span>
                                            <span class="text-xs text-slate-700 dark:text-slate-300 font-medium">{{ $featureItem['feature'] ?? $featureItem }}</span>
                                        </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                            <!-- Full width button -->
                            @if(str_contains(strtolower($platform->name ?? ''), 'hr') || $index === 1)
                                <a href="{{ route('gosor-hr') }}" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-[#283891] hover:bg-[#1d2b75] px-5 py-4 font-semibold text-white transition-all duration-200 hover:-translate-y-0.5">
                                    <span>{{ app()->getLocale() === 'ar' ? 'استكشف نظام Gosor HR' : 'Explore Gosor HR System' }}</span>
                                    <svg class="h-4 w-4 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            @elseif(str_contains(strtolower($platform->name ?? ''), 'edu') || str_contains(strtolower($platform->name ?? ''), 'bridge') || $index === 0)
                                <a href="{{ route('edu-bridge') }}" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-[#283891] hover:bg-[#1d2b75] px-5 py-4 font-semibold text-white transition-all duration-200 hover:-translate-y-0.5">
                                    <span>{{ app()->getLocale() === 'ar' ? 'استكشف منصة Edu Bridge وتطبيق الطلاب' : 'Explore Edu Bridge & Student App' }}</span>
                                    <svg class="h-4 w-4 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                    </svg>
                                </a>
                            @else
                                <a href="#contact" data-project-title="{{ $platform->name }}" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-[#283891] hover:bg-[#1d2b75] px-5 py-4 font-semibold text-white transition-all duration-200 hover:-translate-y-0.5">
                                    <span>{{ __('landing.nav.get_started') }}</span>
                                    <svg class="h-4 w-4 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180 rtl:group-hover:-translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
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
        <section class="py-24 bg-slate-50 dark:bg-[#090d1a] relative overflow-hidden transition-colors duration-200">
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
                    ['name' => 'Laravel',      'logo' => '<i class="devicon-laravel-original colored text-5xl"></i>'],
                    ['name' => 'React',         'logo' => '<i class="devicon-react-original colored text-5xl"></i>'],
                    ['name' => 'Next.js',       'logo' => '<i class="devicon-nextjs-plain dark:text-white text-slate-900 text-5xl"></i>'],
                    ['name' => 'Flutter',       'logo' => '<img alt="flutter" width="52" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/flutter/flutter-original.svg" />'],
                    ['name' => '.NET',          'logo' => '<i class="devicon-dot-net-plain colored text-5xl"></i>'],
                    ['name' => 'TypeScript',    'logo' => '<img alt="typescript" width="52" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/typescript/typescript-original.svg" />'],
                    ['name' => 'Go',            'logo' => '<i class="devicon-go-original-wordmark colored text-5xl"></i>'],
                    ['name' => 'MySQL',         'logo' => '<img alt="mysql" width="68" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/mysql/mysql-original-wordmark.svg" />'],
                    ['name' => 'Figma',         'logo' => '<img alt="figma" width="44" height="52" src="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/icons/figma/figma-original.svg" />'],
                    ['name' => 'Data Analysis', 'logo' => '<svg width="52" height="52" viewBox="0 0 48 48" fill="none"><rect width="48" height="48" rx="12" fill="#06b6d4" fill-opacity="0.15"/><path d="M12 36V28M20 36V20M28 36V24M36 36V16" stroke="#38bdf8" stroke-width="3.5" stroke-linecap="round"/><path d="M12 24L20 16L28 20L36 12" stroke="#06b6d4" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/><circle cx="36" cy="12" r="3" fill="#06b6d4"/></svg>'],
                    ['name' => 'AI',            'logo' => '<svg width="52" height="52" viewBox="0 0 48 48" fill="none"><rect width="48" height="48" rx="12" fill="#a855f7" fill-opacity="0.15"/><rect x="14" y="14" width="20" height="20" rx="6" stroke="#a855f7" stroke-width="2.5"/><circle cx="24" cy="24" r="4" fill="#818cf8"/><path d="M20 9V14M28 9V14M20 34V39M28 34V39M9 20H14M9 28H14M34 20H39M34 28H39" stroke="#a855f7" stroke-width="2.5" stroke-linecap="round"/></svg>'],
                ];
            @endphp

            <!-- Static tech cards grid -->
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="flex flex-wrap justify-center gap-5" data-aos="fade-up" data-aos-delay="100">
                    @foreach($technologies as $index => $tech)
                        <div class="group w-36 h-44 relative cursor-pointer"
                             data-aos="zoom-in" data-aos-delay="{{ $index * 60 }}">
                            <!-- Card -->
                            <div class="absolute inset-0 rounded-2xl bg-white dark:bg-slate-900/60 border border-slate-200 dark:border-slate-800 transition-all duration-300 group-hover:border-indigo-500/60 group-hover:-translate-y-1.5 flex flex-col items-center justify-center gap-3 p-4">
                                <div class="transition-transform duration-300 group-hover:scale-110 flex items-center justify-center">
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
        <section class="py-24 bg-slate-100/60 dark:bg-[#0c101d] border-t border-slate-200 dark:border-slate-800 overflow-hidden transition-colors duration-200">
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
                        <div class="h-28 sm:h-32 w-48 sm:w-56 px-6 py-5 rounded-3xl bg-white dark:bg-[#06080e]/80 border border-slate-200 dark:border-slate-800 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 flex items-center justify-center group transition-all duration-300 hover:-translate-y-1">
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
        <section id="goals" class="py-24 bg-slate-100/60 dark:bg-[#0c101d] relative overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-20" data-aos="fade-up">
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
                            ],
                            'satisfaction' => [
                                'image' => 'customer_satisfaction.png',
                            ],
                            'innovation' => [
                                'image' => 'innovation.png',
                            ],
                            'quality' => [
                                'image' => 'quality.png',
                            ]
                        ];
                    @endphp

                    @foreach(['sustainability', 'satisfaction', 'innovation', 'quality'] as $index => $key)
                        <div data-aos="flip-left" data-aos-delay="{{ $index * 150 }}" class="relative group rounded-3xl bg-white dark:bg-[#06080e]/80 border border-slate-200 dark:border-slate-800 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 px-6 py-10 hover:-translate-y-2 transition-all duration-300 flex flex-col justify-between items-center text-center h-120 overflow-hidden">
                            <div class="flex flex-col items-center">
                                <h3 class="text-2xl sm:text-3xl font-bold text-slate-900 dark:text-slate-100 tracking-tight mb-5 group-hover:text-[#283891] dark:group-hover:text-[#7d93ff] transition duration-300">
                                    {{ __('landing.goals.items.' . $key . '.title') }}
                                </h3>
                                <p class="text-slate-600 dark:text-slate-400 text-sm sm:text-base leading-relaxed max-w-70 mx-auto">
                                    {{ __('landing.goals.items.' . $key . '.description') }}
                                </p>
                            </div>

                            <!-- Image Container centered at the bottom -->
                            <div class="w-full flex items-center justify-center h-40 mt-auto relative z-10 pb-2">
                                <img src="{{ asset('images/gosor/goals/'.$goalMeta[$key]['image']) }}" alt="{{ __('landing.goals.items.' . $key . '.title') }}" class="h-full object-contain pointer-events-none group-hover:scale-105 transition-transform duration-300" loading="lazy" />
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Let's Start a Conversation / Contact Section -->
        <section id="contact" class="py-20 bg-slate-50 dark:bg-[#06080e] relative overflow-hidden transition-colors duration-200">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
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
                        <div class="relative rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-slate-800 p-5 flex items-center gap-4 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-0.5 transition-all duration-300">
                            <div class="w-11 h-11 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                <x-akar-location class="w-6 h-6"/>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.location_title') }}</span>
                                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 mt-0.5 block">{{ $settings['location'] ?? __('landing.contact.details.location_val') }}</span>
                            </div>
                        </div>

                        <!-- Phone Card -->
                        <div class="relative rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-slate-800 p-5 flex items-center gap-4 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-0.5 transition-all duration-300">
                            <div class="w-11 h-11 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                <x-heroicon-o-phone class="w-6 h-6"/>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.phone_title') }}</span>
                                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 mt-0.5 block font-sans">{{ $settings['phone'] ?? __('landing.contact.details.phone_val') }}</span>
                            </div>
                        </div>

                        <!-- Email Card -->
                        <div class="relative rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-slate-800 p-5 flex items-center gap-4 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-0.5 transition-all duration-300">
                            <div class="w-11 h-11 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                <x-eva-email-outline class="w-6 h-6"/>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.web_title') }}</span>
                                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200 mt-0.5 block font-sans">{{ $settings['email'] ?? __('landing.contact.details.web_val') }}</span>
                            </div>
                        </div>

                        <!-- Follow Us Card -->
                        <div class="relative rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-slate-800 p-5 flex flex-col gap-3 hover:border-[#283891]/60 dark:hover:border-[#7d93ff]/60 hover:-translate-y-0.5 transition-all duration-200">
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.follow') }}</span>
                            <div class="flex items-center gap-3 mt-1">
                                @if(isset($settings['facebook']) && $settings['facebook'])
                                <a aria-label="facebook" href="{{ $settings['facebook'] }}" class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-[#283891]/60 hover:text-[#283891] dark:hover:text-[#7d93ff] text-slate-600 dark:text-slate-300 flex items-center justify-center transition duration-150">
                                    <x-fab-facebook class="w-6 h-6"/>
                                </a>
                                @endif
                                @if(isset($settings['linkedin']) && $settings['linkedin'])
                                <a aria-label="linkedin" href="{{ $settings['linkedin'] }}" class="w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 hover:border-[#283891]/60 hover:text-[#283891] dark:hover:text-[#7d93ff] text-slate-600 dark:text-slate-300 flex items-center justify-center transition duration-150">
                                    <x-fab-linkedin class="w-6 h-6"/>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Input Form -->
                    <div class="lg:col-span-3 rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-slate-800 p-8 backdrop-blur-md relative" data-aos="fade-left">
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
                                    <input type="text" name="name" required placeholder="{{ __('landing.contact.form.name_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 focus:border-[#283891] focus:ring-1 focus:ring-[#283891] px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.email') }}</label>
                                    <input type="email" name="email" required placeholder="{{ __('landing.contact.form.email_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 focus:border-[#283891] focus:ring-1 focus:ring-[#283891] px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150 font-sans">
                                </div>
                            </div>

                            <!-- Phone & Company Inputs Row -->
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.phone') }}</label>
                                    <input type="tel" name="phone" placeholder="{{ __('landing.contact.form.phone_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 focus:border-[#283891] focus:ring-1 focus:ring-[#283891] px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150 font-sans">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.company') }}</label>
                                    <input type="text" name="company" placeholder="{{ __('landing.contact.form.company_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 focus:border-[#283891] focus:ring-1 focus:ring-[#283891] px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150">
                                </div>
                            </div>

                            <!-- Project Type Dropdown Select -->
                            <div>
                                <label for="project_type" class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.project_type') }}</label>
                                <div class="relative">
                                    <input type="text" id="project_type" name="project_type" placeholder="{{ __('landing.contact.form.project_type') }}" class="w-full rounded-xl bg-slate-50 dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 focus:border-[#283891] focus:ring-1 focus:ring-[#283891] px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-300">
                                </div>
                            </div>

                            <!-- Message Textarea -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 dark:text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.message') }}</label>
                                <textarea name="message" required rows="4" placeholder="{{ __('landing.contact.form.message_placeholder') }}" class="w-full rounded-xl bg-slate-50 dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 focus:border-[#283891] focus:ring-1 focus:ring-[#283891] px-4 py-3 text-sm text-slate-900 dark:text-slate-100 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150 resize-none"></textarea>
                            </div>

                            <!-- Form Submit Action -->
                            <div>
                                <button type="submit" class="w-full rounded-xl bg-[#283891] hover:bg-[#1d2b75] px-6 py-4 font-semibold text-white transition-all duration-200 hover:-translate-y-0.5 active:translate-y-0 text-center cursor-pointer">
                                    {{ __('landing.contact.form.send') }}
                                </button>
                            </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>

    </main>

    <!-- Footer Section -->
    <footer class="bg-slate-100/80 dark:bg-[#0c101d] border-t border-slate-200 dark:border-slate-800 pt-20 pb-8 text-slate-600 dark:text-slate-400 relative overflow-hidden transition-colors duration-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10" data-aos="fade-up">
            
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 pb-16 border-b border-slate-200 dark:border-slate-800">
                
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
                        <form onsubmit="event.preventDefault(); alert('Subscribed successfully! / تم الاشتراك بنجاح!');" class="flex gap-2 max-w-md">
                            <input type="email" required placeholder="{{ __('landing.footer.newsletter_placeholder') }}" class="w-full min-w-0 rounded-xl bg-white dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 focus:border-[#283891] focus:ring-1 focus:ring-[#283891] px-4 py-2.5 text-sm text-slate-900 dark:text-slate-200 placeholder-slate-400 dark:placeholder-slate-600 outline-none transition duration-150 font-sans">
                            <button type="submit" class="shrink-0 rounded-xl bg-[#283891] hover:bg-[#1d2b75] px-5 py-2.5 text-sm font-semibold text-white transition duration-150 cursor-pointer">
                                {{ __('landing.footer.subscribe') }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Column 2: Quick Links (Nav links) -->
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.links_title1') }}</h3>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#home" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.nav.home') }}</a></li>
                        <li><a href="{{ route('edu-bridge') }}" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition font-bold text-[#283891] dark:text-[#7d93ff]">Edu Bridge (LMS & App)</a></li>
                        <li><a href="{{ route('gosor-hr') }}" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition font-bold text-[#283891] dark:text-[#7d93ff]">Gosor HR</a></li>
                        <li><a href="#services" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.nav.services') }}</a></li>
                        <li><a href="#products" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.nav.products') }}</a></li>
                        <li><a href="{{ route('privacy-policy') }}" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.footer.privacy_policy') }}</a></li>
                        <li><a href="#contact" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.nav.contact') }}</a></li>
                    </ul>
                </div>

                <!-- Column 3: Quick Links (Services links) -->
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.links_title2') }}</h3>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#services" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.services.items.web.title') }}</a></li>
                        <li><a href="#services" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.services.items.mobile.title') }}</a></li>
                        <li><a href="#services" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.services.items.ecommerce.title') }}</a></li>
                        <li><a href="#services" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.services.items.education.title') }}</a></li>
                        <li><a href="#services" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.services.items.erp_crm.title') }}</a></li>
                        <li><a href="#services" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('landing.services.items.ai.title') }}</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Info -->
                <div>
                    <h3 class="text-sm font-bold text-slate-900 dark:text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.contact_title') }}</h3>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center gap-3">
                            <x-heroicon-o-phone class="w-6 h-6 text-[#283891] dark:text-[#7d93ff]"/>
                            <span class="font-sans">01550099355</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-eva-email-outline class="w-6 h-6 text-[#283891] dark:text-[#7d93ff]"/>
                            <span class="font-sans">info@gosorsolutions.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <x-akar-location class="w-6 h-6 text-[#283891] dark:text-[#7d93ff]"/>
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
                    <a href="{{ route('privacy-policy') }}" class="hover:text-[#283891] dark:hover:text-[#7d93ff] underline-offset-4 hover:underline transition">
                        {{ __('landing.footer.privacy_policy') }}
                    </a>
                </div>
                
                <!-- Social media circular buttons -->
                <div class="flex items-center gap-3">
                    <!-- Facebook -->
                    @if(isset($settings['facebook']) && $settings['facebook'])
                    <a aria-label="facebook" href="{{ $settings['facebook'] }}" class="w-9 h-9 rounded-xl bg-white dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 hover:border-[#283891]/60 hover:text-[#283891] dark:hover:text-[#7d93ff] text-slate-600 dark:text-slate-400 flex items-center justify-center transition duration-150">
                        <x-fab-facebook class="w-5 h-5"/>
                    </a>
                    @endif
                    <!-- LinkedIn -->
                    @if(isset($settings['linkedin']) && $settings['linkedin'])
                    <a aria-label="linkedin" href="{{ $settings['linkedin'] }}" class="w-9 h-9 rounded-xl bg-white dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 hover:border-[#283891]/60 hover:text-[#283891] dark:hover:text-[#7d93ff] text-slate-600 dark:text-slate-400 flex items-center justify-center transition duration-150">
                        <x-fab-linkedin class="w-5 h-5"/>
                    </a>
                    @endif
                    @if(isset($settings['email']) && $settings['email'])
                    <a aria-label="email" href="mailto:{{ $settings['email']  }}" class="w-9 h-9 rounded-xl bg-white dark:bg-[#06080e] border border-slate-200 dark:border-slate-800 hover:border-[#283891]/60 hover:text-[#283891] dark:hover:text-[#7d93ff] text-slate-600 dark:text-slate-400 flex items-center justify-center transition duration-150">
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
       class="fixed bottom-6 right-6 z-50 flex h-14 w-14 items-center justify-center rounded-2xl text-white bg-emerald-600 hover:bg-emerald-500 transition-all duration-300 hover:scale-105 border border-emerald-500/40 focus:outline-none">
        <x-fab-whatsapp class="w-8 h-8"/>
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