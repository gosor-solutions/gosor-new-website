@extends('layouts.web.master')

@php
    $locale = app()->getLocale();
    $hrImgPath = $locale === 'ar' ? 'images/gosor/hr/' : 'images/gosor/hr/en/';

    $schema = [
        '@context' => 'https://schema.org',
        '@type' => 'SoftwareApplication',
        'name' => 'Gosor HR',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web, iOS, Android',
        'description' => __('gosor_hr.meta.description'),
        'url' => route('gosor-hr'),
        'provider' => [
            '@type' => 'Organization',
            'name' => 'Gosor Solutions',
            'url' => url('/'),
        ],
    ];
@endphp

@section('title', __('gosor_hr.meta.title'))

@push('meta')
    <meta name="description" content="{{ __('gosor_hr.meta.description') }}">
    <link rel="alternate" hreflang="en" href="{{ url('/gosor-hr?lang=en') }}">
    <link rel="alternate" hreflang="ar" href="{{ url('/gosor-hr?lang=ar') }}">
    <link rel="alternate" hreflang="x-default" href="{{ url('/gosor-hr') }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ __('gosor_hr.meta.title') }}">
    <meta property="og:description" content="{{ __('gosor_hr.meta.description') }}">
    <meta property="og:image"
        content="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ __('gosor_hr.meta.title') }}">
    <meta property="twitter:description" content="{{ __('gosor_hr.meta.description') }}">
    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
    <!-- Navigation Header -->
    <header
        class="sticky top-0 z-50 w-full border-b border-slate-200/80 dark:border-[#18223c] bg-white/95 dark:bg-[#06080e]/95 backdrop-blur-md transition-all duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 sm:h-22 items-center justify-between gap-3 xl:gap-6">

                <!-- Logo & Brand Badge -->
                <div class="flex items-center gap-3 shrink-0">
                    <a href="{{ route('landing') }}"
                        class="flex items-center gap-2 group transition-transform duration-200 hover:scale-105"
                        title="Gosor Solutions">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}"
                            alt="Gosor Solutions Logo" class="h-30 w-auto object-contain logo-themed" />
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex items-center gap-0.5 xl:gap-1.5">
                    <a href="#attendance"
                        class="px-2 xl:px-2.5 py-1.5 text-xs xl:text-sm font-medium whitespace-nowrap text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-[#283891]/5 dark:hover:bg-[#283891]/10 rounded-lg transition">{{ __('gosor_hr.nav.attendance') }}</a>
                    <a href="#mobile-app"
                        class="px-2 xl:px-2.5 py-1.5 text-xs xl:text-sm font-medium whitespace-nowrap text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-[#283891]/5 dark:hover:bg-[#283891]/10 rounded-lg transition">{{ __('gosor_hr.nav.mobile_app') }}</a>
                    <a href="#reports"
                        class="px-2 xl:px-2.5 py-1.5 text-xs xl:text-sm font-medium whitespace-nowrap text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-[#283891]/5 dark:hover:bg-[#283891]/10 rounded-lg transition">{{ __('gosor_hr.nav.reports') }}</a>
                    <a href="#recruitment"
                        class="px-2 xl:px-2.5 py-1.5 text-xs xl:text-sm font-medium whitespace-nowrap text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-[#283891]/5 dark:hover:bg-[#283891]/10 rounded-lg transition">{{ __('gosor_hr.nav.recruitment') }}</a>
                    <a href="#pricing"
                        class="px-2 xl:px-2.5 py-1.5 text-xs xl:text-sm font-medium whitespace-nowrap text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-[#283891]/5 dark:hover:bg-[#283891]/10 rounded-lg transition">{{ __('gosor_hr.nav.pricing') }}</a>
                    <a href="#faq"
                        class="px-2 xl:px-2.5 py-1.5 text-xs xl:text-sm font-medium whitespace-nowrap text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:bg-[#283891]/5 dark:hover:bg-[#283891]/10 rounded-lg transition">{{ __('gosor_hr.nav.faq') }}</a>
                </nav>

                <!-- Actions: Theme + Language + CTA -->
                <div class="hidden lg:flex items-center gap-2 xl:gap-3 shrink-0">
                    <!-- Theme Mode Toggle Button -->
                    <button type="button" id="theme-toggle-btn" aria-label="Toggle theme"
                        class="inline-flex items-center justify-center w-9 h-9 xl:w-10 xl:h-10 rounded-xl bg-slate-100 dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:border-slate-300 dark:hover:border-slate-700 transition cursor-pointer">
                        <svg class="w-4 h-4 xl:w-5 xl:h-5 hidden dark:block text-amber-300 hover:rotate-45 transition-transform duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-4 h-4 xl:w-5 xl:h-5 block dark:hidden text-[#283891] hover:-rotate-12 transition-transform duration-300"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Language Selector Dropdown Toggle -->
                    <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                        <button type="button" id="lang-dropdown-btn"
                            class="inline-flex items-center gap-1.5 px-2.5 xl:px-3 py-2 text-xs xl:text-sm font-medium whitespace-nowrap text-slate-700 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition rounded-xl bg-slate-100 dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-slate-300 dark:hover:border-slate-700 cursor-pointer">
                            <x-eva-globe-outline class="w-4 h-4" />
                            <span>{{ app()->getLocale() === 'ar' ? 'العربية' : 'English' }}</span>
                            <x-feathericon-chevron-down class="w-3.5 h-3.5" />
                        </button>

                        <div id="lang-dropdown-menu"
                            class="hidden absolute right-0 rtl:left-0 rtl:right-auto mt-2 w-36 origin-top-right rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] z-50 py-1">
                            <a href="{{ route('set-locale', 'en') }}"
                                class="flex items-center gap-2 px-4 py-2.5 text-xs xl:text-sm text-slate-700 dark:text-slate-300 hover:bg-[#283891]/10 hover:text-[#283891] dark:hover:text-[#7d93ff] transition {{ app()->getLocale() === 'en' ? 'font-semibold text-[#283891] dark:text-[#7d93ff]' : '' }}">
                                <span>🇬🇧 English</span>
                            </a>
                            <a href="{{ route('set-locale', 'ar') }}"
                                class="flex items-center gap-2 px-4 py-2.5 text-xs xl:text-sm text-slate-700 dark:text-slate-300 hover:bg-[#283891]/10 hover:text-[#283891] dark:hover:text-[#7d93ff] transition {{ app()->getLocale() === 'ar' ? 'font-semibold text-[#283891] dark:text-[#7d93ff]' : '' }}">
                                <span>🇸🇦 العربية</span>
                            </a>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="#demo-form"
                        class="inline-flex items-center gap-1.5 xl:gap-2 px-3.5 xl:px-5 py-2 xl:py-2.5 text-xs xl:text-sm font-semibold whitespace-nowrap text-white rounded-xl bg-[#283891] hover:bg-[#1d2b75] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                        <span>{{ __('gosor_hr.nav.request_demo') }}</span>
                        <x-feathericon-arrow-right class="w-3.5 h-3.5 xl:w-4 xl:h-4 rtl:rotate-180" />
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center gap-2 lg:hidden">
                    <button type="button" id="mobile-theme-toggle-btn" aria-label="Toggle theme"
                        class="p-2 rounded-xl bg-slate-100 dark:bg-[#0c101d] text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-[#18223c]">
                        <svg class="w-5 h-5 hidden dark:block text-amber-300" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden text-[#283891]" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>
                    <button type="button" id="mobile-menu-btn"
                        class="relative w-10 h-10 rounded-xl bg-slate-100 dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] flex items-center justify-center text-slate-700 dark:text-slate-200">
                        <span class="sr-only">Toggle Navigation</span>
                        <div class="w-5 h-4 relative flex flex-col justify-between">
                            <span class="burger-span"></span>
                            <span class="burger-span"></span>
                            <span class="burger-span"></span>
                        </div>
                    </button>
                </div>
            </div>

            <!-- Mobile Drawer -->
            <div id="mobile-menu-panel"
                class="lg:hidden overflow-hidden max-h-0 opacity-0 transition-all duration-300 ease-in-out border-t border-slate-200/80 dark:border-[#18223c]">
                <div class="py-4 space-y-2">
                    <a href="#attendance"
                        class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-[#283891]/10 hover:text-[#283891] rounded-lg">{{ __('gosor_hr.nav.attendance') }}</a>
                    <a href="#mobile-app"
                        class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-[#283891]/10 hover:text-[#283891] rounded-lg">{{ __('gosor_hr.nav.mobile_app') }}</a>
                    <a href="#reports"
                        class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-[#283891]/10 hover:text-[#283891] rounded-lg">{{ __('gosor_hr.nav.reports') }}</a>
                    <a href="#recruitment"
                        class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-[#283891]/10 hover:text-[#283891] rounded-lg">{{ __('gosor_hr.nav.recruitment') }}</a>
                    <a href="#pricing"
                        class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-[#283891]/10 hover:text-[#283891] rounded-lg">{{ __('gosor_hr.nav.pricing') }}</a>
                    <a href="#faq"
                        class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-[#283891]/10 hover:text-[#283891] rounded-lg">{{ __('gosor_hr.nav.faq') }}</a>

                    <div
                        class="pt-3 border-t border-slate-200 dark:border-[#18223c] flex items-center justify-between px-4">
                        <span class="text-sm text-slate-500">{{ __('gosor_hr.nav.back_to_gosor') }}</span>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('set-locale', 'en') }}"
                                class="px-2.5 py-1 text-xs rounded-md {{ app()->getLocale() === 'en' ? 'bg-[#283891] text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300' }}">EN</a>
                            <a href="{{ route('set-locale', 'ar') }}"
                                class="px-2.5 py-1 text-xs rounded-md {{ app()->getLocale() === 'ar' ? 'bg-[#283891] text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300' }}">AR</a>
                        </div>
                    </div>

                    <div class="px-4 pt-2">
                        <a href="#demo-form"
                            class="block w-full text-center py-3 text-sm font-semibold text-white rounded-xl bg-[#283891] hover:bg-[#1d2b75] transition-all">
                            {{ __('gosor_hr.nav.request_demo') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main class="relative z-10">
        <!-- HERO SECTION -->
        <section id="hero" class="relative pt-12 pb-20 md:pt-20 md:pb-32 overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-8 items-center">

                    <!-- Left Hero Content -->
                    <div class="lg:col-span-7 text-center lg:text-start" data-aos="fade-up">
                        <!-- Badge -->
                        <div
                            class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-6">
                            {{ __('gosor_hr.hero.badge') }}
                        </div>

                        <!-- Headline -->
                        <h1
                            class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.15] mb-6">
                            {{ __('gosor_hr.hero.title_prefix') }}
                            <span class="text-[#283891] dark:text-[#7d93ff]">
                                {{ __('gosor_hr.hero.title_highlight') }}
                            </span>
                        </h1>

                        <!-- Subtitle -->
                        <p
                            class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 font-normal leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                            {{ __('gosor_hr.hero.subtitle') }}
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-12">
                            <a href="#demo-form"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 text-base font-semibold text-white rounded-2xl bg-[#283891] hover:bg-[#1d2b75] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                                <span>{{ __('gosor_hr.hero.cta_primary') }}</span>
                                <x-feathericon-arrow-right class="w-5 h-5 rtl:rotate-180" />
                            </a>
                            <a href="#attendance"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-4 text-base font-semibold text-slate-700 dark:text-slate-200 bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] rounded-2xl hover:bg-slate-50 dark:hover:bg-[#18223c] hover:border-slate-300 transition-all hover:-translate-y-0.5">
                                <x-lucide-fingerprint class="w-5 h-5 text-[#283891] dark:text-[#7d93ff]" />
                                <span>{{ __('gosor_hr.hero.cta_secondary') }}</span>
                            </a>
                        </div>

                        <!-- Trust Badge -->
                        <div
                            class="flex items-center justify-center lg:justify-start gap-3 text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                            <div class="flex -space-x-2 rtl:space-x-reverse">
                                <div
                                    class="w-8 h-8 rounded-full bg-[#283891] text-white flex items-center justify-center text-xs font-bold ring-2 ring-white dark:ring-[#06080e]">
                                    G</div>
                                <div
                                    class="w-8 h-8 rounded-full bg-[#1d2b75] text-white flex items-center justify-center text-xs font-bold ring-2 ring-white dark:ring-[#06080e]">
                                    HR</div>
                                <div
                                    class="w-8 h-8 rounded-full bg-[#06080e] border border-slate-700 text-white flex items-center justify-center text-xs font-bold ring-2 ring-white dark:ring-[#06080e]">
                                    AI</div>
                            </div>
                            <span class="font-medium">{{ __('gosor_hr.hero.trust_badge') }}</span>
                        </div>
                    </div>

                    <!-- Right Hero Visual / Real System Screenshot Frame -->
                    <div class="lg:col-span-5" data-aos="fade-left">
                        <div class="relative mx-auto max-w-lg lg:max-w-none">

                            <!-- Browser Frame Container -->
                            <div
                                class="rounded-3xl border border-slate-200 dark:border-[#18223c] bg-white dark:bg-[#0c101d] overflow-hidden group hover:border-[#283891]/40 transition-all duration-300 hover:-translate-y-1">

                                <!-- Top Browser Window Bar -->
                                <div
                                    class="px-4 py-3 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-3 h-3 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-3 h-3 rounded-full bg-[#283891]"></span>
                                    </div>
                                    <div
                                        class="px-4 py-1 rounded-full bg-white dark:bg-[#0c101d] text-[11px] font-mono text-slate-500 dark:text-slate-400 border border-slate-200 dark:border-[#18223c] flex items-center gap-2">
                                        <x-lucide-lock class="w-3 h-3 text-[#283891] dark:text-[#7d93ff]" />
                                        <span>hr.gosorsolutions.com</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="w-2 h-2 rounded-full bg-[#283891] animate-pulse"></span>
                                    </div>
                                </div>

                                <!-- Real Screenshot Image -->
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset($hrImgPath . 'dashboard.png') }}" alt="Gosor HR Dashboard"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />

                                    <!-- Floating Live Pill Overlay -->
                                    <div
                                        class="absolute bottom-4 start-4 end-4 p-3 rounded-2xl bg-[#06080e] text-white border border-[#18223c] flex items-center justify-between">
                                        <div class="flex items-center gap-2.5">
                                            <div
                                                class="w-8 h-8 rounded-xl bg-[#283891] text-white flex items-center justify-center">
                                                <x-lucide-sparkles class="w-4 h-4" />
                                            </div>
                                            <div>
                                                <div class="text-xs font-bold">
                                                    {{ app()->getLocale() === 'ar' ? 'لوحة تحكم مباشرة وموحدة' : 'Live Cloud Dashboard' }}
                                                </div>
                                                <div class="text-[10px] text-slate-300">
                                                    {{ app()->getLocale() === 'ar' ? 'متابعة لحظية لحضور موظفيك في كل الفروع' : 'Real-time multi-branch workforce sync' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <!-- Stats Strip -->
                <div class="mt-16 sm:mt-24 grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6" data-aos="fade-up">

                    <div
                        class="p-6 rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/40 hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl sm:text-4xl font-extrabold text-[#283891] dark:text-[#7d93ff] mb-1">
                            {{ __('gosor_hr.hero.stats.accuracy.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">
                            {{ __('gosor_hr.hero.stats.accuracy.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.accuracy.sub') }}</div>
                    </div>

                    <div
                        class="p-6 rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/40 hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl sm:text-4xl font-extrabold text-[#283891] dark:text-[#7d93ff] mb-1">
                            {{ __('gosor_hr.hero.stats.savings.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">
                            {{ __('gosor_hr.hero.stats.savings.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.savings.sub') }}</div>
                    </div>

                    <div
                        class="p-6 rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/40 hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl sm:text-4xl font-extrabold text-[#283891] dark:text-[#7d93ff] mb-1">
                            {{ __('gosor_hr.hero.stats.hardware.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">
                            {{ __('gosor_hr.hero.stats.hardware.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.hardware.sub') }}</div>
                    </div>

                    <div
                        class="p-6 rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/40 hover:-translate-y-1 transition-all duration-300">
                        <div class="text-3xl sm:text-4xl font-extrabold text-[#283891] dark:text-[#7d93ff] mb-1">
                            {{ __('gosor_hr.hero.stats.uptime.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">
                            {{ __('gosor_hr.hero.stats.uptime.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.uptime.sub') }}</div>
                    </div>

                </div>
            </div>
        </section>



        <!-- SECTION: SMART ATTENDANCE FEATURES (ZERO HARDWARE) -->
        <section id="attendance" class="py-24 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span
                        class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        {{ __('gosor_hr.attendance.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.attendance.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.attendance.subtitle') }}
                    </p>
                </div>

                <!-- 4 Core Feature Cards Grid -->
                <!-- 6 Core Feature Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8">
                    @foreach (__('gosor_hr.attendance.features') as $key => $feature)
                        <div class="p-8 rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-1 transition-all duration-300 group flex flex-col justify-between"
                            data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                            <div>
                                <div
                                    class="w-14 h-14 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    @if ($key === 'gps')
                                        <x-lucide-map-pin class="w-7 h-7" />
                                    @elseif ($key === 'remote')
                                        <x-lucide-laptop class="w-7 h-7" />
                                    @elseif ($key === 'field')
                                        <x-lucide-navigation class="w-7 h-7" />
                                    @elseif ($key === 'shifts')
                                        <x-lucide-clock class="w-7 h-7" />
                                    @elseif ($key === 'offline')
                                        <x-lucide-wifi-off class="w-7 h-7" />
                                    @else
                                        <x-lucide-shield-check class="w-7 h-7" />
                                    @endif
                                </div>
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">
                                    {{ $feature['title'] }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ $feature['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- SECTION: EMPLOYEE MOBILE APP (ESS) -->
        <section id="mobile-app"
            class="py-24 relative bg-slate-50/70 dark:bg-[#06080e] border-y border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                    <!-- Left: Real Mobile Screenshots (Dual Clock In & Clock Out Mockups) -->
                    <div class="lg:col-span-6 order-2 lg:order-1" data-aos="fade-right">
                        <div class="flex items-center justify-center gap-4 sm:gap-6">

                            <!-- Phone 1: Clock In state -->
                            <div
                                class="w-1/2 max-w-[240px] rounded-[36px] border-4 sm:border-[6px] border-[#0c101d] bg-[#0c101d] overflow-hidden ring-1 ring-slate-800 group hover:-translate-y-1 transition-transform duration-300">
                                <div
                                    class="py-1 px-3 bg-[#0c101d] text-[10px] text-center font-bold text-[#7d93ff] border-b border-[#18223c]">
                                    Clock In Screen
                                </div>
                                <img src="{{ asset('images/gosor/hr/app_clock_in.jpg') }}"
                                    alt="Gosor HR Mobile Clock In"
                                    class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-500"
                                    loading="lazy" />
                            </div>

                            <!-- Phone 2: Clock Out state -->
                            <div
                                class="w-1/2 max-w-[240px] rounded-[36px] border-4 sm:border-[6px] border-[#0c101d] bg-[#0c101d] overflow-hidden ring-1 ring-slate-800 group mt-6 sm:mt-10 hover:-translate-y-1 transition-transform duration-300">
                                <div
                                    class="py-1 px-3 bg-[#0c101d] text-[10px] text-center font-bold text-rose-400 border-b border-[#18223c]">
                                    Clock Out Screen
                                </div>
                                <img src="{{ asset('images/gosor/hr/app_clock_out.jpg') }}"
                                    alt="Gosor HR Mobile Clock Out"
                                    class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-500"
                                    loading="lazy" />
                            </div>

                        </div>
                    </div>

                    <!-- Right: ESS Feature List -->
                    <div class="lg:col-span-6 order-1 lg:order-2" data-aos="fade-left">
                        <span
                            class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                            {{ __('gosor_hr.app.badge') }}
                        </span>
                        <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-4">
                            {{ __('gosor_hr.app.title') }}
                        </h2>
                        <p class="text-base sm:text-lg text-slate-600 dark:text-slate-400 leading-relaxed mb-8">
                            {{ __('gosor_hr.app.subtitle') }}
                        </p>

                        <!-- Features Grid -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
                            @foreach (__('gosor_hr.app.features') as $key => $feature)
                                <div
                                    class="flex items-start gap-3 p-3 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c]">
                                    <div
                                        class="w-6 h-6 rounded-lg bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0 mt-0.5">
                                        <x-lucide-check class="w-4 h-4" />
                                    </div>
                                    <span
                                        class="text-sm font-semibold text-slate-800 dark:text-slate-200">{{ $feature }}</span>
                                </div>
                            @endforeach
                        </div>

                        <!-- App Badges -->
                        <div class="flex flex-wrap items-center gap-4">
                            <div
                                class="px-4 py-2.5 rounded-xl bg-[#0c101d] text-white flex items-center gap-3 border border-[#18223c] hover:-translate-y-0.5 transition-transform">
                                <x-lucide-apple class="w-6 h-6" />
                                <div class="text-start">
                                    <div class="text-[9px] uppercase tracking-wider text-slate-400">Download on</div>
                                    <div class="text-xs font-bold">App Store (iOS)</div>
                                </div>
                            </div>
                            <div
                                class="px-4 py-2.5 rounded-xl bg-[#0c101d] text-white flex items-center gap-3 border border-[#18223c] hover:-translate-y-0.5 transition-transform">
                                <x-lucide-smartphone class="w-6 h-6" />
                                <div class="text-start">
                                    <div class="text-[9px] uppercase tracking-wider text-slate-400">Get it on</div>
                                    <div class="text-xs font-bold">Google Play (Android)</div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION: ADVANCED REPORTS & 1-CLICK PAYROLL -->
        <section id="reports" class="py-24 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span
                        class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        {{ __('gosor_hr.reports.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.reports.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.reports.subtitle') }}
                    </p>
                </div>

                <!-- Interactive Tab Navigation -->
                <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4 mb-12" id="report-tabs-nav"
                    data-aos="fade-up">
                    <button type="button" data-tab="payroll"
                        class="report-tab-btn active px-5 py-3 rounded-2xl text-sm font-bold transition-all cursor-pointer">
                        {{ __('gosor_hr.reports.tabs.payroll') }}
                    </button>
                    <button type="button" data-tab="attendance"
                        class="report-tab-btn px-5 py-3 rounded-2xl text-sm font-bold transition-all cursor-pointer">
                        {{ __('gosor_hr.reports.tabs.attendance') }}
                    </button>
                    <button type="button" data-tab="financial"
                        class="report-tab-btn px-5 py-3 rounded-2xl text-sm font-bold transition-all cursor-pointer">
                        {{ __('gosor_hr.reports.tabs.financial') }}
                    </button>
                </div>

                <!-- Tab Content Containers -->
                <div class="max-w-5xl mx-auto" data-aos="fade-up">

                    <!-- TAB 1: PAYROLL -->
                    <div id="tab-content-payroll" class="report-tab-pane">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-8">
                            <div class="lg:col-span-5 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center">
                                    <x-lucide-calculator class="w-6 h-6" />
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.reports.payroll_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.reports.payroll_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach (__('gosor_hr.reports.payroll_card.items') as $item)
                                        <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                            <x-lucide-check-circle-2
                                                class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0" />
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real System Payroll Screenshot in Frame -->
                            <div
                                class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-[#18223c] group hover:border-[#283891]/40 transition-all duration-300">
                                <div
                                    class="px-4 py-2.5 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#283891]"></span>
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'تقرير التفاصيل المالية والرواتب' : 'Financial & Payroll Report' }}</span>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-bold text-[10px]">WPS
                                        Ready</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-[#06080e]">
                                    <img src="{{ asset($hrImgPath . 'payroll_report.png') }}"
                                        alt="Gosor HR Payroll Report"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: ATTENDANCE RADAR -->
                    <div id="tab-content-attendance" class="report-tab-pane hidden">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-8">
                            <div class="lg:col-span-5 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center">
                                    <x-lucide-radar class="w-6 h-6" />
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.reports.radar_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.reports.radar_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach (__('gosor_hr.reports.radar_card.items') as $item)
                                        <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                            <x-lucide-check-circle-2
                                                class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0" />
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real Attendance Log Screenshot in Frame -->
                            <div
                                class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-[#18223c] group hover:border-[#283891]/40 transition-all duration-300">
                                <div
                                    class="px-4 py-2.5 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#283891]"></span>
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'سجل الحضور والغياب اليومي' : 'Daily Attendance & Absence Log' }}</span>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-bold text-[10px]">Real-Time
                                        Sync</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-[#06080e]">
                                    <img src="{{ asset($hrImgPath . 'attendance_report.png') }}"
                                        alt="Gosor HR Attendance Statistics"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: FINANCIAL BREAKDOWN -->
                    <div id="tab-content-financial" class="report-tab-pane hidden">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-8">
                            <div class="lg:col-span-5 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center">
                                    <x-lucide-receipt class="w-6 h-6" />
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.reports.financial_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.reports.financial_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach (__('gosor_hr.reports.financial_card.items') as $item)
                                        <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                            <x-lucide-check-circle-2
                                                class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0" />
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real Financial Breakdown Screenshot -->
                            <div
                                class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-[#18223c] group hover:border-[#283891]/40 transition-all duration-300">
                                <div
                                    class="px-4 py-2.5 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#283891]"></span>
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'التفاصيل المالية وملاحظات الحساب' : 'Financial Breakdown & Salary Details' }}</span>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-bold text-[10px]">Audit
                                        Ready</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-[#06080e]">
                                    <img src="{{ asset($hrImgPath . 'financial_breakdown.png') }}"
                                        alt="Gosor HR Financial Breakdown"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- SECTION: RECRUITMENT & APPLICANT TRACKING -->
        <section id="recruitment"
            class="py-24 relative bg-slate-50/70 dark:bg-[#06080e] border-y border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span
                        class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-lucide-briefcase class="w-3.5 h-3.5" />
                        {{ __('gosor_hr.recruitment.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.recruitment.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.recruitment.subtitle') }}
                    </p>
                </div>

                <!-- 4 Recruitment Feature Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 mb-16">
                    @foreach (__('gosor_hr.recruitment.features') as $key => $feature)
                        <div class="p-8 rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-1 transition-all duration-300 group flex flex-col justify-between"
                            data-aos="fade-up" data-aos-delay="{{ $loop->iteration * 50 }}">
                            <div>
                                <div
                                    class="w-14 h-14 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                    @if ($key === 'portal')
                                        <x-lucide-globe class="w-7 h-7" />
                                    @elseif ($key === 'kanban')
                                        <x-lucide-columns-3 class="w-7 h-7" />
                                    @elseif ($key === 'applications')
                                        <x-lucide-users class="w-7 h-7" />
                                    @else
                                        <x-lucide-file-text class="w-7 h-7" />
                                    @endif
                                </div>
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white mb-3">
                                    {{ $feature['title'] }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ $feature['desc'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Interactive Tab Navigation for Recruitment Screenshots -->
                <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4 mb-12" id="recruitment-tabs-nav"
                    data-aos="fade-up">
                    <button type="button" data-rtab="kanban"
                        class="recruitment-tab-btn active px-5 py-3 rounded-2xl text-sm font-bold transition-all cursor-pointer">
                        {{ __('gosor_hr.recruitment.tabs.kanban') }}
                    </button>
                    <button type="button" data-rtab="applications"
                        class="recruitment-tab-btn px-5 py-3 rounded-2xl text-sm font-bold transition-all cursor-pointer">
                        {{ __('gosor_hr.recruitment.tabs.applications') }}
                    </button>
                    <button type="button" data-rtab="portal"
                        class="recruitment-tab-btn px-5 py-3 rounded-2xl text-sm font-bold transition-all cursor-pointer">
                        {{ __('gosor_hr.recruitment.tabs.portal') }}
                    </button>
                    <button type="button" data-rtab="cv_preview"
                        class="recruitment-tab-btn px-5 py-3 rounded-2xl text-sm font-bold transition-all cursor-pointer">
                        {{ __('gosor_hr.recruitment.tabs.cv_preview') }}
                    </button>
                </div>

                <!-- Tab Content Containers -->
                <div class="max-w-5xl mx-auto" data-aos="fade-up">

                    <!-- TAB 1: KANBAN BOARD SCREENSHOT -->
                    <div id="rtab-content-kanban" class="recruitment-tab-pane">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-8 shadow-sm">
                            <div class="lg:col-span-5 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center">
                                    <x-lucide-columns-3 class="w-6 h-6" />
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.recruitment.kanban_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.recruitment.kanban_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach (__('gosor_hr.recruitment.kanban_card.items') as $item)
                                        <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                            <x-lucide-check-circle-2
                                                class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0" />
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real System Kanban Screenshot in Frame -->
                            <div
                                class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-[#18223c] group hover:border-[#283891]/40 transition-all duration-300">
                                <div
                                    class="px-4 py-2.5 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#283891]"></span>
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'التوظيف / لوحة كانبان المتقدمين' : 'Recruitment / Applicants Kanban Pipeline' }}</span>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-bold text-[10px]">Interactive
                                        Pipeline</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-[#06080e]">
                                    <img src="{{ asset($hrImgPath . 'recruitment_kanban.png') }}"
                                        alt="Gosor HR Applicants Kanban Pipeline"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: APPLICATIONS TABLE SCREENSHOT -->
                    <div id="rtab-content-applications" class="recruitment-tab-pane hidden">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-8 shadow-sm">
                            <div class="lg:col-span-5 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center">
                                    <x-lucide-users class="w-6 h-6" />
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.recruitment.applications_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.recruitment.applications_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach (__('gosor_hr.recruitment.applications_card.items') as $item)
                                        <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                            <x-lucide-check-circle-2
                                                class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0" />
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real System Applications Table Screenshot in Frame -->
                            <div
                                class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-[#18223c] group hover:border-[#283891]/40 transition-all duration-300">
                                <div
                                    class="px-4 py-2.5 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#283891]"></span>
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'التوظيف / طلبات التقديم' : 'Recruitment / Job Applications' }}</span>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-bold text-[10px]">Applicants
                                        Registry</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-[#06080e]">
                                    <img src="{{ asset($hrImgPath . 'recruitment_applications.png') }}"
                                        alt="Gosor HR Job Applications Table"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: CAREERS PORTAL JOB DETAILS SCREENSHOT -->
                    <div id="rtab-content-portal" class="recruitment-tab-pane hidden">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-8 shadow-sm">
                            <div class="lg:col-span-5 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center">
                                    <x-lucide-globe class="w-6 h-6" />
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.recruitment.portal_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.recruitment.portal_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach (__('gosor_hr.recruitment.portal_card.items') as $item)
                                        <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                            <x-lucide-check-circle-2
                                                class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0" />
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real System Public Portal Screenshot in Frame -->
                            <div
                                class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-[#18223c] group hover:border-[#283891]/40 transition-all duration-300">
                                <div
                                    class="px-4 py-2.5 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#283891]"></span>
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'بوابة التوظيف العامة / تفاصيل الوظيفة والتقديم' : 'Careers Portal / Job Details & Application' }}</span>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-bold text-[10px]">Public
                                        Portal</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-[#06080e]">
                                    <img src="{{ asset($hrImgPath . 'recruitment_portal.png') }}"
                                        alt="Gosor HR Careers Portal Job Details"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 4: IN-APP PDF CV VIEWER SCREENSHOT -->
                    <div id="rtab-content-cv_preview" class="recruitment-tab-pane hidden">
                        <div
                            class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-8 shadow-sm">
                            <div class="lg:col-span-5 space-y-4">
                                <div
                                    class="w-12 h-12 rounded-2xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center">
                                    <x-lucide-file-text class="w-6 h-6" />
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.recruitment.cv_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.recruitment.cv_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach (__('gosor_hr.recruitment.cv_card.items') as $item)
                                        <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                            <x-lucide-check-circle-2
                                                class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0" />
                                            <span>{{ $item }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real System PDF Preview Screenshot in Frame -->
                            <div
                                class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-[#18223c] group hover:border-[#283891]/40 transition-all duration-300">
                                <div
                                    class="px-4 py-2.5 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-[#283891]"></span>
                                        <span
                                            class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'معاينة السيرة الذاتية PDF' : 'In-App PDF CV Viewer' }}</span>
                                    </div>
                                    <span
                                        class="px-2 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-bold text-[10px]">Zero
                                        Download</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-[#06080e]">
                                    <img src="{{ asset($hrImgPath . 'recruitment_cv_preview.png') }}"
                                        alt="Gosor HR PDF CV Previewer"
                                        class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500"
                                        loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- SECTION: PRICING PLANS -->
        <section id="pricing"
            class="py-24 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
                    <span
                        class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-lucide-tag class="w-3.5 h-3.5" />
                        {{ __('gosor_hr.pricing.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.pricing.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.pricing.subtitle') }}
                    </p>

                    <!-- Monthly / Annual Toggle Switch -->
                    <div
                        class="mt-8 inline-flex items-center gap-3 p-1.5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] shadow-sm">
                        <button type="button" id="billing-monthly-btn"
                            class="billing-toggle-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all cursor-pointer">
                            {{ __('gosor_hr.pricing.billing.monthly') }}
                        </button>
                        <button type="button" id="billing-yearly-btn"
                            class="billing-toggle-btn active px-4 py-2.5 rounded-xl text-xs sm:text-sm font-bold transition-all cursor-pointer flex items-center gap-1.5">
                            <span>{{ __('gosor_hr.pricing.billing.yearly') }}</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-[#283891] text-white">
                                {{ __('gosor_hr.pricing.billing.save_badge') }}
                            </span>
                        </button>
                    </div>
                </div>

                <!-- Single All-in-One Plan Showcase Card -->
                <div class="relative rounded-3xl border-2 border-[#283891] bg-white dark:bg-[#0c101d] shadow-2xl shadow-[#283891]/10 overflow-hidden mb-14"
                    data-aos="fade-up">

                    <!-- Top Accent Banner -->
                    <div
                        class="bg-gradient-to-r from-[#283891] via-[#374ab7] to-[#283891] text-white py-3 px-6 text-center text-xs sm:text-sm font-extrabold flex items-center justify-center gap-2 tracking-wide shadow-sm">
                        <x-lucide-sparkles class="w-4 h-4 shrink-0 text-amber-300" />
                        <span>{{ __('gosor_hr.pricing.plan.badge') }}</span>
                    </div>

                    <div class="p-6 sm:p-8 lg:p-12">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12 items-stretch">

                            <!-- Left Side: Pricing, Team Size Calculator & CTA -->
                            <div
                                class="lg:col-span-5 flex flex-col justify-between border-b lg:border-b-0 lg:border-e border-slate-200/80 dark:border-[#18223c] pb-8 lg:pb-0 lg:pe-10">
                                <div>
                                    <h3
                                        class="text-2xl sm:text-3xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-2">
                                        {{ __('gosor_hr.pricing.plan.name') }}
                                    </h3>
                                    <p class="text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed mb-6">
                                        {{ __('gosor_hr.pricing.plan.desc') }}
                                    </p>

                                    <!-- Price Display -->
                                    <div
                                        class="p-5 sm:p-6 rounded-2xl bg-slate-50 dark:bg-[#06080e] border border-slate-200/80 dark:border-[#18223c] mb-6">
                                        <!-- Monthly Price Display (hidden when yearly is active) -->
                                        <div class="price-box-monthly hidden flex items-baseline gap-2">
                                            <span
                                                class="text-4xl sm:text-5xl font-black text-slate-900 dark:text-white tracking-tight">{{ __('gosor_hr.pricing.plan.monthly_price') }}</span>
                                            <span
                                                class="text-sm sm:text-base font-bold text-[#283891] dark:text-[#7d93ff]">{{ __('gosor_hr.pricing.plan.currency') }}</span>
                                            <span
                                                class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('gosor_hr.pricing.plan.period_month') }}</span>
                                        </div>
                                        <div
                                            class="price-box-monthly hidden mt-1 text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1.5">
                                            <x-lucide-clock class="w-3.5 h-3.5 text-slate-400 shrink-0" />
                                            <span>{{ __('gosor_hr.pricing.plan.billed_monthly_note') }}</span>
                                        </div>

                                        <!-- Yearly Price Display (active by default) -->
                                        <div class="price-box-yearly flex items-baseline flex-wrap gap-2">
                                            <span
                                                class="text-4xl sm:text-5xl font-black text-[#283891] dark:text-[#7d93ff] tracking-tight">{{ __('gosor_hr.pricing.plan.yearly_price') }}</span>
                                            <span
                                                class="text-sm sm:text-base font-bold text-[#283891] dark:text-[#7d93ff]">{{ __('gosor_hr.pricing.plan.currency') }}</span>
                                            <span
                                                class="text-xs sm:text-sm font-medium text-slate-500 dark:text-slate-400">{{ __('gosor_hr.pricing.plan.period_year') }}</span>
                                            <span
                                                class="px-2.5 py-0.5 rounded-full text-xs font-black bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                                {{ __('gosor_hr.pricing.billing.save_badge') }}
                                            </span>
                                        </div>
                                        <div
                                            class="price-box-yearly mt-1 text-xs text-emerald-600 dark:text-emerald-400 font-semibold flex items-center gap-1.5">
                                            <x-lucide-sparkles class="w-3.5 h-3.5 shrink-0" />
                                            <span>{{ __('gosor_hr.pricing.plan.billed_annually_note') }}</span>
                                        </div>
                                    </div>

                                    <!-- Interactive Team Size Estimator / Calculator -->
                                    <div
                                        class="p-5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] space-y-4 mb-6 shadow-sm">
                                        <div class="flex items-center justify-between">
                                            <span class="text-xs sm:text-sm font-bold text-slate-800 dark:text-slate-200">
                                                {{ __('gosor_hr.pricing.plan.calculator.slider_label') }}
                                            </span>
                                            <div class="flex items-center gap-1.5">
                                                <button type="button" id="calc-minus-btn"
                                                    class="w-7 h-7 rounded-lg bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 flex items-center justify-center text-slate-800 dark:text-slate-100 font-bold transition cursor-pointer select-none">
                                                    -
                                                </button>
                                                <div
                                                    class="px-3 py-1 rounded-lg bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-extrabold text-sm min-w-[50px] text-center">
                                                    <span id="calc-employee-count">20</span>
                                                    <span
                                                        class="text-[11px] font-medium ms-0.5">{{ __('gosor_hr.pricing.plan.calculator.unit') }}</span>
                                                </div>
                                                <button type="button" id="calc-plus-btn"
                                                    class="w-7 h-7 rounded-lg bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 flex items-center justify-center text-slate-800 dark:text-slate-100 font-bold transition cursor-pointer select-none">
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                        <input type="range" id="calc-range-slider" min="5" max="150"
                                            value="20" step="1"
                                            class="w-full h-2 bg-slate-200 dark:bg-slate-700 rounded-lg appearance-none cursor-pointer accent-[#283891]" />

                                        <div
                                            class="pt-3 border-t border-slate-100 dark:border-[#18223c] flex items-center justify-between gap-2">
                                            <div>
                                                <span
                                                    class="block text-[11px] text-slate-500 dark:text-slate-400 font-medium">
                                                    {{ __('gosor_hr.pricing.plan.calculator.monthly_total') }}
                                                </span>
                                                <span id="calc-total-cost"
                                                    class="text-base sm:text-lg font-black text-slate-900 dark:text-white">
                                                    3,000 {{ __('gosor_hr.pricing.plan.currency') }}
                                                </span>
                                            </div>
                                            <div id="calc-savings-badge"
                                                class="px-2.5 py-1 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-[11px] font-bold text-emerald-600 dark:text-emerald-400 text-end">
                                                وفّر 12,000 {{ __('gosor_hr.pricing.plan.currency') }} سنوياً
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- CTA Section -->
                                <div class="space-y-3 pt-2">
                                    <a href="#demo-form" data-plan="all-in-one"
                                        class="plan-cta-btn w-full py-4 px-6 rounded-2xl text-sm sm:text-base font-bold text-center text-white bg-[#283891] hover:bg-[#1d2b75] shadow-lg shadow-[#283891]/25 hover:shadow-xl hover:shadow-[#283891]/35 transition-all transform hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2">
                                        <span>{{ __('gosor_hr.pricing.plan.cta') }}</span>
                                        <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180" />
                                    </a>
                                    <p
                                        class="text-center text-[11px] sm:text-xs text-slate-500 dark:text-slate-400 font-medium">
                                        {{ __('gosor_hr.pricing.plan.trial_badge') }}
                                    </p>
                                </div>
                            </div>

                            <!-- Right Side: Categorized Feature Breakdown (Crystal Clear Checklist) -->
                            <div class="lg:col-span-7 flex flex-col justify-between">
                                <div>
                                    <div class="flex items-center gap-2.5 mb-6">
                                        <div class="w-2.5 h-2.5 rounded-full bg-[#283891]"></div>
                                        <h4 class="text-base sm:text-lg font-extrabold text-slate-900 dark:text-white">
                                            {{ __('gosor_hr.pricing.plan.badge') }}
                                        </h4>
                                    </div>

                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                        @foreach (__('gosor_hr.pricing.plan.feature_groups') as $groupKey => $group)
                                            <div
                                                class="p-4 sm:p-5 rounded-2xl bg-slate-50/80 dark:bg-[#06080e]/60 border border-slate-200/80 dark:border-[#18223c] transition hover:border-[#283891]/40">
                                                <div class="flex items-center gap-2.5 mb-3.5">
                                                    <div
                                                        class="w-8 h-8 rounded-xl bg-[#283891]/10 dark:bg-[#283891]/20 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                                        @if ($groupKey === 'attendance')
                                                            <x-lucide-map-pin class="w-4 h-4" />
                                                        @elseif ($groupKey === 'payroll')
                                                            <x-lucide-calculator class="w-4 h-4" />
                                                        @elseif ($groupKey === 'mobile_ai')
                                                            <x-lucide-sparkles class="w-4 h-4" />
                                                        @elseif ($groupKey === 'recruitment')
                                                            <x-lucide-briefcase class="w-4 h-4" />
                                                        @else
                                                            <x-lucide-shield-check class="w-4 h-4" />
                                                        @endif
                                                    </div>
                                                    <h5 class="text-xs sm:text-sm font-bold text-slate-900 dark:text-white">
                                                        {{ $group['title'] }}
                                                    </h5>
                                                </div>

                                                <ul class="space-y-2.5">
                                                    @foreach ($group['items'] as $item)
                                                        <li
                                                            class="flex items-start gap-2 text-xs text-slate-700 dark:text-slate-300 leading-relaxed">
                                                            <div
                                                                class="w-4 h-4 rounded-full bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                                                <x-lucide-check class="w-2.5 h-2.5" />
                                                            </div>
                                                            <span>{{ $item }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- Custom Enterprise Callout Banner -->
                <div class="rounded-3xl border border-[#18223c] bg-[#0c101d] p-8 text-white flex flex-col md:flex-row items-center justify-between gap-6"
                    data-aos="fade-up">
                    <div class="flex items-center gap-4 text-center md:text-start">
                        <div
                            class="w-12 h-12 rounded-2xl bg-[#283891]/20 text-[#7d93ff] flex items-center justify-center shrink-0 hidden sm:flex">
                            <x-lucide-building-2 class="w-6 h-6" />
                        </div>
                        <div>
                            <h3 class="text-lg sm:text-xl font-bold text-white mb-1">
                                {{ __('gosor_hr.pricing.custom.title') }}
                            </h3>
                            <p class="text-xs sm:text-sm text-slate-300">
                                {{ __('gosor_hr.pricing.custom.desc') }}
                            </p>
                        </div>
                    </div>
                    <a href="#demo-form" data-plan="custom"
                        class="plan-cta-btn inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-sm font-bold text-[#06080e] bg-white hover:bg-slate-100 transition-all hover:-translate-y-0.5 active:translate-y-0 shrink-0">
                        <span>{{ __('gosor_hr.pricing.custom.cta') }}</span>
                        <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180" />
                    </a>
                </div>

            </div>
        </section>



        <!-- SECTION: FAQ ACCORDION -->
        <section id="faq"
            class="py-24 relative bg-slate-50/70 dark:bg-[#06080e] border-t border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">

                <!-- Section Header -->
                <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
                    <span
                        class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        {{ __('gosor_hr.faq.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.faq.title') }}
                    </h2>
                    <p class="mt-4 text-base text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.faq.subtitle') }}
                    </p>
                </div>

                <!-- Accordion Items -->
                <div class="space-y-4" data-aos="fade-up">
                    @foreach (__('gosor_hr.faq.items') as $index => $item)
                        <div
                            class="faq-item rounded-2xl border border-slate-200 dark:border-[#18223c] bg-white dark:bg-[#0c101d] overflow-hidden transition">
                            <button type="button"
                                class="faq-toggler w-full p-5 text-start flex items-center justify-between gap-4 font-bold text-slate-900 dark:text-white hover:text-[#283891] dark:hover:text-[#7d93ff] transition cursor-pointer">
                                <span>{{ $item['q'] }}</span>
                                <div
                                    class="w-6 h-6 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center shrink-0 transition-transform duration-200 faq-icon">
                                    <x-feathericon-chevron-down class="w-4 h-4" />
                                </div>
                            </button>
                            <div
                                class="faq-answer px-5 pb-5 text-sm text-slate-600 dark:text-slate-300 leading-relaxed hidden">
                                {{ $item['a'] }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- SECTION: DEMO REQUEST / LEAD GENERATION FORM -->
        <section id="demo-form" class="py-24 relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div
                    class="rounded-3xl border border-slate-200 dark:border-[#18223c] bg-white dark:bg-[#0c101d] p-8 sm:p-12 lg:p-16">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">

                        <!-- Left Info & Benefits -->
                        <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                            <span
                                class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40">
                                {{ __('gosor_hr.demo.badge') }}
                            </span>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                                {{ __('gosor_hr.demo.title') }}
                            </h2>
                            <p class="text-base text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('gosor_hr.demo.subtitle') }}
                            </p>

                            <!-- Trust benefits list -->
                            <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-[#18223c]">
                                <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                                    <div
                                        class="w-8 h-8 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                        <x-lucide-shield-check class="w-5 h-5" />
                                    </div>
                                    <span>{{ __('gosor_hr.demo.benefits.free_trial') }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                                    <div
                                        class="w-8 h-8 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                        <x-lucide-rocket class="w-5 h-5" />
                                    </div>
                                    <span>{{ __('gosor_hr.demo.benefits.free_onboarding') }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                                    <div
                                        class="w-8 h-8 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                        <x-lucide-headset class="w-5 h-5" />
                                    </div>
                                    <span>{{ __('gosor_hr.demo.benefits.dedicated_support') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Interactive Form -->
                        <div class="lg:col-span-7" data-aos="fade-left">
                            <form id="hr-demo-form" action="{{ route('gosor-hr.demo') }}" method="POST"
                                class="space-y-5 p-6 sm:p-8 rounded-2xl bg-slate-50 dark:bg-[#06080e] border border-slate-200 dark:border-[#18223c]">
                                @csrf
                                <input type="hidden" name="_form_time" value="{{ encrypt(time()) }}">
                                <div
                                    style="display:none !important; visibility:hidden !important; opacity:0 !important; position:absolute !important; left:-9999px !important;">
                                    <input type="text" name="_hp_company_website" tabindex="-1" autocomplete="off"
                                        value="" />
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name"
                                            class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.name') }}
                                            *</label>
                                        <input type="text" id="name" name="name" required
                                            placeholder="{{ __('gosor_hr.demo.form.name_placeholder') }}"
                                            class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#283891] transition" />
                                    </div>
                                    <div>
                                        <label for="email"
                                            class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.email') }}
                                            *</label>
                                        <input type="email" id="email" name="email" required
                                            placeholder="{{ __('gosor_hr.demo.form.email_placeholder') }}"
                                            class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#283891] transition" />
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="phone"
                                            class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.phone') }}
                                            *</label>
                                        <input type="tel" id="phone" name="phone" required
                                            placeholder="{{ __('gosor_hr.demo.form.phone_placeholder') }}"
                                            class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#283891] transition" />
                                    </div>
                                    <div>
                                        <label for="company"
                                            class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.company') }}
                                            *</label>
                                        <input type="text" id="company" name="company" required
                                            placeholder="{{ __('gosor_hr.demo.form.company_placeholder') }}"
                                            class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#283891] transition" />
                                    </div>
                                </div>

                                <!-- Interactive Employee Number & Billing Cycle in Demo Form -->
                                <div class="space-y-4 pt-1">
                                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                        <!-- Number of Employees input with +/- -->
                                        <div>
                                            <label for="form_employees_count"
                                                class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5 flex items-center justify-between">
                                                <span>{{ __('gosor_hr.demo.form.employees_count') }} *</span>
                                                <span class="text-[10px] font-normal text-slate-400">1 - 10,000</span>
                                            </label>
                                            <div class="relative flex items-center">
                                                <button type="button" id="form-emp-minus-btn"
                                                    class="absolute start-1.5 w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 flex items-center justify-center text-slate-800 dark:text-slate-100 font-black text-sm transition select-none cursor-pointer">
                                                    -
                                                </button>
                                                <input type="number" id="form_employees_count" name="employees_count" min="1" max="10000" required
                                                    value="20" placeholder="{{ __('gosor_hr.demo.form.employees_count_placeholder') }}"
                                                    class="w-full px-11 py-3 text-center rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-sm font-extrabold text-[#283891] dark:text-[#7d93ff] focus:outline-none focus:ring-2 focus:ring-[#283891] transition" />
                                                <button type="button" id="form-emp-plus-btn"
                                                    class="absolute end-1.5 w-8 h-8 rounded-lg bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 flex items-center justify-center text-slate-800 dark:text-slate-100 font-black text-sm transition select-none cursor-pointer">
                                                    +
                                                </button>
                                            </div>
                                        </div>

                                        <!-- Billing Cycle Radio Selector -->
                                        <div>
                                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">
                                                {{ __('gosor_hr.demo.form.billing_cycle') }} *
                                            </label>
                                            <div class="grid grid-cols-2 gap-2">
                                                <label id="form-billing-yearly-label"
                                                    class="relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 border-[#283891] bg-[#283891]/5 dark:bg-[#283891]/10 text-slate-900 dark:text-white cursor-pointer transition select-none text-center">
                                                    <input type="radio" name="billing_cycle" id="form_billing_yearly" value="yearly" checked class="sr-only" />
                                                    <span class="text-xs font-bold">{{ app()->getLocale() === 'ar' ? 'سنوي (150 ج.م)' : 'Yearly (150 EGP)' }}</span>
                                                    <span class="text-[10px] font-extrabold text-emerald-600 dark:text-emerald-400">{{ app()->getLocale() === 'ar' ? 'وفّر 25%' : 'Save 25%' }}</span>
                                                </label>
                                                <label id="form-billing-monthly-label"
                                                    class="relative flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-white dark:bg-[#0c101d] text-slate-700 dark:text-slate-300 cursor-pointer transition select-none text-center hover:border-slate-300 dark:hover:border-slate-700">
                                                    <input type="radio" name="billing_cycle" id="form_billing_monthly" value="monthly" class="sr-only" />
                                                    <span class="text-xs font-bold">{{ app()->getLocale() === 'ar' ? 'شهري (200 ج.م)' : 'Monthly (200 EGP)' }}</span>
                                                    <span class="text-[10px] text-slate-400">{{ app()->getLocale() === 'ar' ? 'تجديد شهري' : 'Flexible' }}</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Live Estimated Price Summary in Form -->
                                    <div class="p-3.5 sm:p-4 rounded-xl bg-[#283891]/5 dark:bg-[#283891]/10 border border-[#283891]/20 flex items-center justify-between flex-wrap gap-2">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8 h-8 rounded-lg bg-[#283891] text-white flex items-center justify-center shrink-0">
                                                <x-lucide-calculator class="w-4 h-4" />
                                            </div>
                                            <div>
                                                <span class="block text-[11px] font-semibold text-slate-500 dark:text-slate-400">
                                                    {{ __('gosor_hr.demo.form.estimated_price_label') }}
                                                </span>
                                                <span id="form-calculated-price-text" class="text-xs sm:text-sm font-extrabold text-[#283891] dark:text-[#7d93ff]">
                                                    3,000 {{ __('gosor_hr.pricing.plan.currency') }} / شهرياً
                                                </span>
                                            </div>
                                        </div>
                                        <div id="form-calculated-savings-badge" class="px-2.5 py-1 rounded-lg bg-emerald-500/10 border border-emerald-500/20 text-[11px] font-black text-emerald-600 dark:text-emerald-400">
                                            وفّر 12,000 {{ __('gosor_hr.pricing.plan.currency') }} سنوياً
                                        </div>
                                        <input type="hidden" id="form_estimated_price" name="estimated_price" value="" />
                                    </div>
                                </div>

                                <div>
                                    <label for="message"
                                        class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.message') }}</label>
                                    <textarea id="message" name="message" rows="3"
                                        placeholder="{{ __('gosor_hr.demo.form.message_placeholder') }}"
                                        class="w-full px-4 py-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-[#283891] transition"></textarea>
                                </div>

                                <button type="submit" id="submit-demo-btn"
                                    class="w-full py-4 text-sm font-bold text-white rounded-xl bg-[#283891] hover:bg-[#1d2b75] transition-all transform hover:-translate-y-0.5 active:translate-y-0 cursor-pointer flex items-center justify-center gap-2">
                                    <span>{{ __('gosor_hr.demo.form.submit') }}</span>
                                    <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180" />
                                </button>

                                <p class="text-[11px] text-center text-slate-400">
                                    {{ __('gosor_hr.demo.form.privacy_notice') }}
                                </p>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-200 dark:border-[#18223c] bg-white/80 dark:bg-[#06080e] py-12 relative z-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">

                <!-- Logo & Tagline -->
                <div class="flex flex-col sm:flex-row items-center gap-4 text-center sm:text-start">
                    <a href="{{ route('landing') }}" class="group">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}"
                            alt="Gosor Solutions" class="h-9 w-auto logo-themed" />
                    </a>
                    <span class="text-xs text-slate-500 max-w-sm">
                        {{ __('gosor_hr.footer.tagline') }}
                    </span>
                </div>

                <!-- Links & Back to Gosor -->
                <div
                    class="flex flex-wrap items-center justify-center gap-4 text-xs font-semibold text-slate-600 dark:text-slate-400">
                    <a href="{{ route('landing') }}"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.back_to_gosor') }}</a>
                    <a href="#attendance"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.attendance') }}</a>
                    <a href="#mobile-app"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.mobile_app') }}</a>
                    <a href="#reports"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.reports') }}</a>
                    <a href="#recruitment"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.recruitment') }}</a>
                    <a href="#pricing"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.pricing') }}</a>
                    <a href="#faq"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.faq') }}</a>
                    <a href="#demo-form"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('gosor_hr.nav.request_demo') }}</a>
                </div>

                <!-- Copyright & Policy -->
                <div class="flex items-center gap-3 text-xs text-slate-400">
                    <span>{{ __('gosor_hr.footer.copyright', ['year' => date('Y')]) }}</span>
                    <span>•</span>
                    <a href="{{ route('privacy-policy') }}"
                        class="hover:text-[#283891] dark:hover:text-[#7d93ff] underline-offset-4 hover:underline transition">
                        {{ __('landing.footer.privacy_policy') }}
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    @if (isset($settings['whatsapp']) && $settings['whatsapp'])
        <a aria-label="whatsapp" href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp']) }}"
            target="_blank"
            class="fixed bottom-6 end-6 z-50 flex h-14 w-14 items-center justify-center rounded-full text-white transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2"
            style="background-color: #25D366;">
            <x-fab-whatsapp class="w-8 h-8" />
        </a>
    @endif

    <style>
        .report-tab-btn,
        .recruitment-tab-btn {
            background-color: transparent;
            color: #64748b;
            border: 1px solid transparent;
        }

        .report-tab-btn:hover,
        .recruitment-tab-btn:hover {
            color: #283891;
        }

        .report-tab-btn.active,
        .recruitment-tab-btn.active {
            background-color: #283891;
            color: #ffffff;
            border-color: #283891;
        }

        .dark .report-tab-btn,
        .dark .recruitment-tab-btn {
            color: #94a3b8;
        }

        .dark .report-tab-btn:hover,
        .dark .recruitment-tab-btn:hover {
            color: #7d93ff;
        }

        .dark .report-tab-btn.active,
        .dark .recruitment-tab-btn.active {
            background-color: #283891;
            color: #ffffff;
            border-color: #283891;
        }

        .billing-toggle-btn {
            background-color: transparent;
            color: #64748b;
        }

        .billing-toggle-btn.active {
            background-color: #283891;
            color: #ffffff;
        }

        .dark .billing-toggle-btn {
            color: #94a3b8;
        }

        .dark .billing-toggle-btn.active {
            background-color: #283891;
            color: #ffffff;
        }
    </style>

    <!-- SCRIPTS -->
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Theme toggle
                function toggleTheme() {
                    const isDark = document.documentElement.classList.contains('dark');
                    if (isDark) {
                        document.documentElement.classList.remove('dark');
                        document.documentElement.classList.add('light');
                        localStorage.setItem('theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        document.documentElement.classList.remove('light');
                        localStorage.setItem('theme', 'dark');
                    }
                }

                const themeBtn = document.getElementById('theme-toggle-btn');
                if (themeBtn) themeBtn.addEventListener('click', toggleTheme);

                const mobileThemeBtn = document.getElementById('mobile-theme-toggle-btn');
                if (mobileThemeBtn) mobileThemeBtn.addEventListener('click', toggleTheme);

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
                        } else {
                            mobilePanel.style.maxHeight = '0';
                            mobilePanel.style.opacity = '0';
                        }
                    });

                    mobilePanel.querySelectorAll('a').forEach(link => {
                        link.addEventListener('click', () => {
                            mobileBtn.classList.remove('open');
                            mobilePanel.style.maxHeight = '0';
                            mobilePanel.style.opacity = '0';
                        });
                    });
                }

                // Pricing Calculator & Demo Form Two-Way Synchronization
                const btnMonthly = document.getElementById('billing-monthly-btn');
                const btnYearly = document.getElementById('billing-yearly-btn');
                const monthlyBoxes = document.querySelectorAll('.price-box-monthly');
                const yearlyBoxes = document.querySelectorAll('.price-box-yearly');
                const slider = document.getElementById('calc-range-slider');
                const countDisplay = document.getElementById('calc-employee-count');
                const totalCostDisplay = document.getElementById('calc-total-cost');
                const savingsBadge = document.getElementById('calc-savings-badge');
                const minusBtn = document.getElementById('calc-minus-btn');
                const plusBtn = document.getElementById('calc-plus-btn');

                // Form elements
                const formEmpInput = document.getElementById('form_employees_count');
                const formEmpMinus = document.getElementById('form-emp-minus-btn');
                const formEmpPlus = document.getElementById('form-emp-plus-btn');
                const formRadioYearly = document.getElementById('form_billing_yearly');
                const formRadioMonthly = document.getElementById('form_billing_monthly');
                const formLabelYearly = document.getElementById('form-billing-yearly-label');
                const formLabelMonthly = document.getElementById('form-billing-monthly-label');
                const formPriceText = document.getElementById('form-calculated-price-text');
                const formSavingsBadge = document.getElementById('form-calculated-savings-badge');
                const formHiddenPrice = document.getElementById('form_estimated_price');

                const isRtl = document.documentElement.dir === 'rtl';
                let isYearlyActive = true;

                function computePrices(count, isYearly) {
                    const validCount = Math.max(1, parseInt(count, 10) || 1);
                    const currency = isRtl ? 'ج.م' : 'EGP';
                    const perMonthText = isRtl ? 'شهرياً' : 'month';
                    const perYearText = isRtl ? 'سنوياً' : 'year';
                    const saveText = isRtl ? 'وفّر' : 'Save';

                    if (isYearly) {
                        const monthlyEquiv = validCount * 150;
                        const annualTotal = validCount * 150 * 12;
                        const annualSavings = (200 - 150) * validCount * 12;

                        return {
                            count: validCount,
                            monthlyTotalText: `${monthlyEquiv.toLocaleString()} ${currency} / ${perMonthText}`,
                            annualTotalText: `${annualTotal.toLocaleString()} ${currency} / ${perYearText}`,
                            savingsText: `${saveText} ${annualSavings.toLocaleString()} ${currency} ${perYearText}`,
                            hiddenValue: `${monthlyEquiv.toLocaleString()} ${currency}/month (${annualTotal.toLocaleString()} ${currency}/year - ${saveText} ${annualSavings.toLocaleString()} ${currency})`
                        };
                    } else {
                        const monthlyCost = validCount * 200;
                        const annualCost = validCount * 200 * 12;
                        const annualSavings = (200 - 150) * validCount * 12;

                        return {
                            count: validCount,
                            monthlyTotalText: `${monthlyCost.toLocaleString()} ${currency} / ${perMonthText}`,
                            annualTotalText: `${annualCost.toLocaleString()} ${currency} / ${perYearText}`,
                            savingsText: isRtl ? `وفّر ${annualSavings.toLocaleString()} ج.م مع السنوي` : `Save ${annualSavings.toLocaleString()} EGP with annual`,
                            hiddenValue: `${monthlyCost.toLocaleString()} ${currency}/month (${annualCost.toLocaleString()} ${currency}/year)`
                        };
                    }
                }

                function syncUI(sourceCount, fromSlider = false) {
                    const count = Math.max(1, parseInt(sourceCount, 10) || 1);
                    const calc = computePrices(count, isYearlyActive);

                    // Update Top Calculator
                    if (countDisplay) countDisplay.textContent = count;
                    if (slider && !fromSlider && count >= 5 && count <= 150) {
                        slider.value = count;
                    }
                    if (totalCostDisplay) totalCostDisplay.textContent = calc.monthlyTotalText;
                    if (savingsBadge) {
                        savingsBadge.textContent = calc.savingsText;
                        savingsBadge.classList.remove('hidden');
                    }

                    // Update Demo Form
                    if (formEmpInput && formEmpInput.value != count) {
                        formEmpInput.value = count;
                    }
                    if (formPriceText) {
                        if (isYearlyActive) {
                            formPriceText.textContent = `${calc.monthlyTotalText} (${calc.annualTotalText})`;
                        } else {
                            formPriceText.textContent = `${calc.monthlyTotalText} (${isRtl ? 'تجديد شهري' : 'monthly'})`;
                        }
                    }
                    if (formSavingsBadge) {
                        formSavingsBadge.textContent = calc.savingsText;
                        formSavingsBadge.style.display = isYearlyActive ? 'block' : 'block';
                    }
                    if (formHiddenPrice) {
                        formHiddenPrice.value = calc.hiddenValue;
                    }

                    // Update Radio visuals in Form
                    if (formRadioYearly && formRadioMonthly) {
                        formRadioYearly.checked = isYearlyActive;
                        formRadioMonthly.checked = !isYearlyActive;
                    }
                    if (formLabelYearly && formLabelMonthly) {
                        if (isYearlyActive) {
                            formLabelYearly.className = "relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 border-[#283891] bg-[#283891]/5 dark:bg-[#283891]/10 text-slate-900 dark:text-white cursor-pointer transition select-none text-center";
                            formLabelMonthly.className = "relative flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-white dark:bg-[#0c101d] text-slate-700 dark:text-slate-300 cursor-pointer transition select-none text-center hover:border-slate-300 dark:hover:border-slate-700";
                        } else {
                            formLabelMonthly.className = "relative flex flex-col items-center justify-center p-2.5 rounded-xl border-2 border-[#283891] bg-[#283891]/5 dark:bg-[#283891]/10 text-slate-900 dark:text-white cursor-pointer transition select-none text-center";
                            formLabelYearly.className = "relative flex flex-col items-center justify-center p-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-white dark:bg-[#0c101d] text-slate-700 dark:text-slate-300 cursor-pointer transition select-none text-center hover:border-slate-300 dark:hover:border-slate-700";
                        }
                    }

                    // Update Top Switch buttons
                    if (btnMonthly && btnYearly) {
                        if (isYearlyActive) {
                            btnYearly.classList.add('active');
                            btnMonthly.classList.remove('active');
                            yearlyBoxes.forEach(el => el.classList.remove('hidden'));
                            monthlyBoxes.forEach(el => el.classList.add('hidden'));
                        } else {
                            btnMonthly.classList.add('active');
                            btnYearly.classList.remove('active');
                            monthlyBoxes.forEach(el => el.classList.remove('hidden'));
                            yearlyBoxes.forEach(el => el.classList.add('hidden'));
                        }
                    }
                }

                // Top Billing Toggle
                if (btnMonthly && btnYearly) {
                    btnMonthly.addEventListener('click', function() {
                        isYearlyActive = false;
                        syncUI(formEmpInput ? formEmpInput.value : (slider ? slider.value : 20));
                    });

                    btnYearly.addEventListener('click', function() {
                        isYearlyActive = true;
                        syncUI(formEmpInput ? formEmpInput.value : (slider ? slider.value : 20));
                    });
                }

                // Top Slider
                if (slider) {
                    slider.addEventListener('input', function() {
                        syncUI(this.value, true);
                    });
                }

                // Top +/- buttons
                if (minusBtn && slider) {
                    minusBtn.addEventListener('click', function() {
                        const current = parseInt(slider.value, 10) || 20;
                        if (current > 5) {
                            slider.value = current - 1;
                            syncUI(slider.value, true);
                        }
                    });
                }

                if (plusBtn && slider) {
                    plusBtn.addEventListener('click', function() {
                        const current = parseInt(slider.value, 10) || 20;
                        if (current < 150) {
                            slider.value = current + 1;
                            syncUI(slider.value, true);
                        }
                    });
                }

                // Form Employee Input & +/- buttons
                if (formEmpInput) {
                    formEmpInput.addEventListener('input', function() {
                        syncUI(this.value);
                    });
                }

                if (formEmpMinus && formEmpInput) {
                    formEmpMinus.addEventListener('click', function() {
                        const current = parseInt(formEmpInput.value, 10) || 20;
                        if (current > 1) {
                            formEmpInput.value = current - 1;
                            syncUI(formEmpInput.value);
                        }
                    });
                }

                if (formEmpPlus && formEmpInput) {
                    formEmpPlus.addEventListener('click', function() {
                        const current = parseInt(formEmpInput.value, 10) || 20;
                        if (current < 10000) {
                            formEmpInput.value = current + 1;
                            syncUI(formEmpInput.value);
                        }
                    });
                }

                // Form Radio Billing cycle
                if (formRadioYearly && formRadioMonthly) {
                    formRadioYearly.addEventListener('change', function() {
                        if (this.checked) {
                            isYearlyActive = true;
                            syncUI(formEmpInput ? formEmpInput.value : 20);
                        }
                    });

                    formRadioMonthly.addEventListener('change', function() {
                        if (this.checked) {
                            isYearlyActive = false;
                            syncUI(formEmpInput ? formEmpInput.value : 20);
                        }
                    });
                }

                // Initial sync
                syncUI(20);

                // Plan CTA smooth scroll and sync
                const planCtaButtons = document.querySelectorAll('.plan-cta-btn');
                planCtaButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const plan = this.getAttribute('data-plan');
                        if (plan === 'custom') {
                            syncUI(100);
                        } else if (slider) {
                            syncUI(slider.value);
                        }
                    });
                });

                // Report Tabs Logic
                const tabButtons = document.querySelectorAll('.report-tab-btn');
                const tabPanes = document.querySelectorAll('.report-tab-pane');

                tabButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const targetTab = this.getAttribute('data-tab');

                        tabButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');

                        tabPanes.forEach(pane => {
                            if (pane.id === 'tab-content-' + targetTab) {
                                pane.classList.remove('hidden');
                            } else {
                                pane.classList.add('hidden');
                            }
                        });
                    });
                });

                // Recruitment Tabs Logic
                const rTabButtons = document.querySelectorAll('.recruitment-tab-btn');
                const rTabPanes = document.querySelectorAll('.recruitment-tab-pane');

                rTabButtons.forEach(btn => {
                    btn.addEventListener('click', function() {
                        const targetTab = this.getAttribute('data-rtab');

                        rTabButtons.forEach(b => b.classList.remove('active'));
                        this.classList.add('active');

                        rTabPanes.forEach(pane => {
                            if (pane.id === 'rtab-content-' + targetTab) {
                                pane.classList.remove('hidden');
                            } else {
                                pane.classList.add('hidden');
                            }
                        });
                    });
                });

                // FAQ Accordion Logic
                const faqItems = document.querySelectorAll('.faq-item');
                faqItems.forEach(item => {
                    const toggler = item.querySelector('.faq-toggler');
                    const answer = item.querySelector('.faq-answer');
                    const icon = item.querySelector('.faq-icon');

                    if (toggler && answer) {
                        toggler.addEventListener('click', function() {
                            const isHidden = answer.classList.contains('hidden');

                            // Close all others
                            faqItems.forEach(otherItem => {
                                otherItem.querySelector('.faq-answer')?.classList.add('hidden');
                                const otherIcon = otherItem.querySelector('.faq-icon');
                                if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                            });

                            if (isHidden) {
                                answer.classList.remove('hidden');
                                if (icon) icon.style.transform = 'rotate(180deg)';
                            }
                        });
                    }
                });

                // AJAX Demo Form Submission
                const demoForm = document.getElementById('hr-demo-form');
                if (demoForm) {
                    demoForm.addEventListener('submit', async function(e) {
                        e.preventDefault();

                        const submitBtn = document.getElementById('submit-demo-btn');
                        const originalBtnContent = submitBtn.innerHTML;

                        submitBtn.disabled = true;
                        submitBtn.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h3zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        {{ __('gosor_hr.demo.form.sending') }}
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
                                window.location.href = result.redirect || "{{ route('success') }}";
                            } else {
                                alert(result.message || 'Error sending request. Please check inputs.');
                                submitBtn.disabled = false;
                                submitBtn.innerHTML = originalBtnContent;
                            }
                        } catch (error) {
                            console.error('Error:', error);
                            alert('Something went wrong. Please try again.');
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = originalBtnContent;
                        }
                    });
                }
            });
        </script>
    @endpush
@endsection
