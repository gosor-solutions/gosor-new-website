@extends('layouts.web.master')

@php
    $locale = app()->getLocale();
    $hrImgPath = $locale === 'ar' ? 'images/gosor/hr/' : 'images/gosor/hr/en/';

    $schema = [
        '@context'     => 'https://schema.org',
        '@type'        => 'SoftwareApplication',
        'name'         => 'Gosor HR',
        'applicationCategory' => 'BusinessApplication',
        'operatingSystem' => 'Web, iOS, Android',
        'description'  => __('gosor_hr.meta.description'),
        'url'          => route('gosor-hr'),
        'provider'     => [
            '@type' => 'Organization',
            'name'  => 'Gosor Solutions',
            'url'   => url('/'),
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
    <meta property="og:image" content="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="{{ __('gosor_hr.meta.title') }}">
    <meta property="twitter:description" content="{{ __('gosor_hr.meta.description') }}">
    <script type="application/ld+json">
        {!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endpush

@section('content')
    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-200/80 dark:border-slate-800/80 bg-white/85 dark:bg-[#070b13]/85 backdrop-blur-xl transition-all duration-300 shadow-xs">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                
                <!-- Logo & Brand Badge -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="flex items-center gap-2 group" title="Gosor Solutions">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions Logo" class="h-10 w-auto logo-themed"/>
                    </a>
                    <div class="h-6 w-px bg-slate-300 dark:bg-slate-700 hidden sm:block"></div>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                        <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span>
                        HR Cloud
                    </span>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex space-x-1 rtl:space-x-reverse items-center">
                    <a href="#why-gosor" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">{{ __('gosor_hr.nav.why_gosor') }}</a>
                    <a href="#attendance" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">{{ __('gosor_hr.nav.attendance') }}</a>
                    <a href="#ai-features" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">{{ __('gosor_hr.nav.ai_features') }}</a>
                    <a href="#reports" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">{{ __('gosor_hr.nav.reports') }}</a>
                    <a href="#pricing" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">{{ __('gosor_hr.nav.pricing') }}</a>
                    <a href="#mobile-app" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">{{ __('gosor_hr.nav.mobile_app') }}</a>
                    <a href="#faq" class="px-3 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition">{{ __('gosor_hr.nav.faq') }}</a>
                </nav>

                <!-- Actions: Theme + Language + CTA -->
                <div class="hidden md:flex items-center gap-3">
                    <!-- Theme Mode Toggle Button -->
                    <button type="button" id="theme-toggle-btn" aria-label="Toggle theme" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-emerald-500 dark:hover:text-emerald-400 transition shadow-xs cursor-pointer">
                        <svg class="w-5 h-5 hidden dark:block text-amber-300 hover:rotate-45 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden text-indigo-600 hover:-rotate-12 transition-transform duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Language Selector Dropdown Toggle -->
                    <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                        <button type="button" id="lang-dropdown-btn" class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-slate-700 dark:text-slate-300 hover:text-emerald-600 dark:hover:text-emerald-400 transition rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-xs cursor-pointer">
                            <x-eva-globe-outline class="w-4 h-4"/>
                            <span>{{ app()->getLocale() === 'ar' ? 'العربية' : 'En' }}</span>
                            <x-feathericon-chevron-down class="w-3.5 h-3.5"/>
                        </button>
                        
                        <div id="lang-dropdown-menu" class="hidden absolute right-0 rtl:left-0 rtl:right-auto mt-2 w-36 origin-top-right rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-2xl z-50 py-1">
                            <a href="{{ route('set-locale', 'en') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ app()->getLocale() === 'en' ? 'font-semibold text-emerald-600 dark:text-emerald-400' : '' }}">
                                <span>🇬🇧 English</span>
                            </a>
                            <a href="{{ route('set-locale', 'ar') }}" class="flex items-center gap-2 px-4 py-2.5 text-sm text-slate-700 dark:text-slate-300 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 hover:text-emerald-600 dark:hover:text-emerald-400 transition {{ app()->getLocale() === 'ar' ? 'font-semibold text-emerald-600 dark:text-emerald-400' : '' }}">
                                <span>🇸🇦 العربية</span>
                            </a>
                        </div>
                    </div>

                    <!-- CTA Button -->
                    <a href="#demo-form" class="inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 hover:from-emerald-500 hover:to-cyan-500 shadow-lg shadow-emerald-500/25 transition-all transform hover:-translate-y-0.5">
                        <span>{{ __('gosor_hr.nav.request_demo') }}</span>
                        <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180"/>
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center gap-2 md:hidden">
                    <button type="button" id="mobile-theme-toggle-btn" aria-label="Toggle theme" class="p-2 rounded-xl bg-slate-100 dark:bg-slate-900 text-slate-600 dark:text-slate-300">
                        <svg class="w-5 h-5 hidden dark:block text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>
                    <button type="button" id="mobile-menu-btn" class="relative w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 flex items-center justify-center text-slate-700 dark:text-slate-200">
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
            <div id="mobile-menu-panel" class="md:hidden overflow-hidden max-h-0 opacity-0 transition-all duration-300 ease-in-out border-t border-slate-200/80 dark:border-slate-800">
                <div class="py-4 space-y-2">
                    <a href="#why-gosor" class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg">{{ __('gosor_hr.nav.why_gosor') }}</a>
                    <a href="#attendance" class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg">{{ __('gosor_hr.nav.attendance') }}</a>
                    <a href="#ai-features" class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg">{{ __('gosor_hr.nav.ai_features') }}</a>
                    <a href="#reports" class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg">{{ __('gosor_hr.nav.reports') }}</a>
                    <a href="#pricing" class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg">{{ __('gosor_hr.nav.pricing') }}</a>
                    <a href="#mobile-app" class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg">{{ __('gosor_hr.nav.mobile_app') }}</a>
                    <a href="#faq" class="block px-4 py-2 text-base font-medium text-slate-700 dark:text-slate-200 hover:bg-emerald-50 dark:hover:bg-emerald-950/30 rounded-lg">{{ __('gosor_hr.nav.faq') }}</a>
                    
                    <div class="pt-3 border-t border-slate-200 dark:border-slate-800 flex items-center justify-between px-4">
                        <span class="text-sm text-slate-500">{{ __('gosor_hr.nav.back_to_gosor') }}</span>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('set-locale', 'en') }}" class="px-2.5 py-1 text-xs rounded-md {{ app()->getLocale() === 'en' ? 'bg-emerald-600 text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300' }}">EN</a>
                            <a href="{{ route('set-locale', 'ar') }}" class="px-2.5 py-1 text-xs rounded-md {{ app()->getLocale() === 'ar' ? 'bg-emerald-600 text-white' : 'bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300' }}">AR</a>
                        </div>
                    </div>
                    
                    <div class="px-4 pt-2">
                        <a href="#demo-form" class="block w-full text-center py-3 text-sm font-semibold text-white rounded-xl bg-gradient-to-r from-emerald-600 to-cyan-600 shadow-md">
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
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs sm:text-sm font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 mb-6 shadow-xs">
                            {{ __('gosor_hr.hero.badge') }}
                        </div>

                        <!-- Headline -->
                        <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.15] mb-6">
                            {{ __('gosor_hr.hero.title_prefix') }}
                            <span class="bg-gradient-to-r from-emerald-600 via-teal-500 to-cyan-500 bg-clip-text text-transparent">
                                {{ __('gosor_hr.hero.title_highlight') }}
                            </span>
                        </h1>

                        <!-- Subtitle -->
                        <p class="text-lg sm:text-xl text-slate-600 dark:text-slate-300 font-normal leading-relaxed mb-8 max-w-2xl mx-auto lg:mx-0">
                            {{ __('gosor_hr.hero.subtitle') }}
                        </p>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4 mb-12">
                            <a href="#demo-form" class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-7 py-4 text-base font-semibold text-white rounded-2xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 hover:from-emerald-500 hover:to-cyan-500 shadow-xl shadow-emerald-500/25 transition-all transform hover:-translate-y-0.5">
                                <span>{{ __('gosor_hr.hero.cta_primary') }}</span>
                                <x-feathericon-arrow-right class="w-5 h-5 rtl:rotate-180"/>
                            </a>
                            <a href="#attendance" class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-7 py-4 text-base font-semibold text-slate-700 dark:text-slate-200 bg-white/80 dark:bg-slate-900/80 border border-slate-200 dark:border-slate-800 rounded-2xl hover:bg-slate-50 dark:hover:bg-slate-800 transition shadow-xs backdrop-blur-sm">
                                <x-lucide-fingerprint class="w-5 h-5 text-emerald-500"/>
                                <span>{{ __('gosor_hr.hero.cta_secondary') }}</span>
                            </a>
                        </div>

                        <!-- Trust Badge -->
                        <div class="flex items-center justify-center lg:justify-start gap-3 text-xs sm:text-sm text-slate-500 dark:text-slate-400">
                            <div class="flex -space-x-2 rtl:space-x-reverse">
                                <div class="w-8 h-8 rounded-full bg-emerald-500 text-white flex items-center justify-center text-xs font-bold ring-2 ring-white dark:ring-slate-950">G</div>
                                <div class="w-8 h-8 rounded-full bg-cyan-500 text-white flex items-center justify-center text-xs font-bold ring-2 ring-white dark:ring-slate-950">HR</div>
                                <div class="w-8 h-8 rounded-full bg-indigo-500 text-white flex items-center justify-center text-xs font-bold ring-2 ring-white dark:ring-slate-950">AI</div>
                            </div>
                            <span class="font-medium">{{ __('gosor_hr.hero.trust_badge') }}</span>
                        </div>
                    </div>

                    <!-- Right Hero Visual / Real System Screenshot Frame -->
                    <div class="lg:col-span-5" data-aos="fade-left">
                        <div class="relative mx-auto max-w-lg lg:max-w-none">
                            
                            <!-- Glowing background effect -->
                            <div class="absolute -inset-2 rounded-3xl bg-gradient-to-r from-emerald-500/25 via-cyan-500/25 to-indigo-500/25 blur-2xl -z-10"></div>
                            
                            <!-- Browser Frame Container -->
                            <div class="rounded-3xl border border-slate-200 dark:border-slate-800 bg-white/90 dark:bg-slate-900/90 shadow-2xl overflow-hidden backdrop-blur-xl group">
                                
                                <!-- Top Browser Window Bar -->
                                <div class="px-4 py-3 bg-slate-100 dark:bg-slate-800/80 border-b border-slate-200 dark:border-slate-800 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <span class="w-3 h-3 rounded-full bg-rose-500/80"></span>
                                        <span class="w-3 h-3 rounded-full bg-amber-500/80"></span>
                                        <span class="w-3 h-3 rounded-full bg-emerald-500/80"></span>
                                    </div>
                                    <div class="px-4 py-1 rounded-full bg-white dark:bg-slate-900 text-[11px] font-mono text-slate-500 dark:text-slate-400 border border-slate-200 dark:border-slate-700 flex items-center gap-2">
                                        <x-lucide-lock class="w-3 h-3 text-emerald-500"/>
                                        <span>hr.gosorsolutions.com</span>
                                    </div>
                                    <div class="flex items-center gap-1">
                                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-ping"></span>
                                    </div>
                                </div>

                                <!-- Real Screenshot Image -->
                                <div class="relative overflow-hidden">
                                    <img src="{{ asset($hrImgPath . 'dashboard.png') }}" alt="Gosor HR Dashboard" class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500" loading="lazy" />
                                    
                                    <!-- Floating Live Pill Overlay -->
                                    <div class="absolute bottom-4 start-4 end-4 p-3 rounded-2xl bg-slate-900/85 text-white border border-slate-700/80 backdrop-blur-md flex items-center justify-between shadow-lg">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-8 h-8 rounded-xl bg-emerald-500 text-white flex items-center justify-center">
                                                <x-lucide-sparkles class="w-4 h-4"/>
                                            </div>
                                            <div>
                                                <div class="text-xs font-bold">{{ app()->getLocale() === 'ar' ? 'لوحة تحكم مباشرة وموحدة' : 'Live Cloud Dashboard' }}</div>
                                                <div class="text-[10px] text-slate-300">{{ app()->getLocale() === 'ar' ? 'متابعة لحظية لحضور موظفيك في كل الفروع' : 'Real-time multi-branch workforce sync' }}</div>
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
                    
                    <div class="p-6 rounded-3xl bg-white/70 dark:bg-slate-900/70 border border-slate-200/80 dark:border-slate-800 shadow-sm backdrop-blur-md">
                        <div class="text-3xl sm:text-4xl font-extrabold text-emerald-600 dark:text-emerald-400 mb-1">
                            {{ __('gosor_hr.hero.stats.accuracy.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ __('gosor_hr.hero.stats.accuracy.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.accuracy.sub') }}</div>
                    </div>

                    <div class="p-6 rounded-3xl bg-white/70 dark:bg-slate-900/70 border border-slate-200/80 dark:border-slate-800 shadow-sm backdrop-blur-md">
                        <div class="text-3xl sm:text-4xl font-extrabold text-teal-600 dark:text-teal-400 mb-1">
                            {{ __('gosor_hr.hero.stats.savings.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ __('gosor_hr.hero.stats.savings.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.savings.sub') }}</div>
                    </div>

                    <div class="p-6 rounded-3xl bg-white/70 dark:bg-slate-900/70 border border-slate-200/80 dark:border-slate-800 shadow-sm backdrop-blur-md">
                        <div class="text-3xl sm:text-4xl font-extrabold text-cyan-600 dark:text-cyan-400 mb-1">
                            {{ __('gosor_hr.hero.stats.hardware.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ __('gosor_hr.hero.stats.hardware.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.hardware.sub') }}</div>
                    </div>

                    <div class="p-6 rounded-3xl bg-white/70 dark:bg-slate-900/70 border border-slate-200/80 dark:border-slate-800 shadow-sm backdrop-blur-md">
                        <div class="text-3xl sm:text-4xl font-extrabold text-indigo-600 dark:text-indigo-400 mb-1">
                            {{ __('gosor_hr.hero.stats.uptime.value') }}
                        </div>
                        <div class="text-sm font-bold text-slate-800 dark:text-slate-200">{{ __('gosor_hr.hero.stats.uptime.label') }}</div>
                        <div class="text-xs text-slate-500 mt-1">{{ __('gosor_hr.hero.stats.uptime.sub') }}</div>
                    </div>

                </div>
            </div>
        </section>

        <!-- SECTION: WHY DITCH FINGERPRINT DEVICES (THE VERSUS SECTION) -->
        <section id="why-gosor" class="py-20 relative bg-slate-100/50 dark:bg-slate-950/40 border-y border-slate-200/80 dark:border-slate-800/80">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                
                <!-- Section Title -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20 mb-3">
                        {{ __('gosor_hr.versus.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.versus.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.versus.subtitle') }}
                    </p>
                </div>

                <!-- Side-by-Side Comparison Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-stretch">
                    
                    <!-- Old Fingerprint Device Box (Negative) -->
                    <div class="rounded-3xl p-8 bg-white dark:bg-slate-900/60 border border-rose-300 dark:border-rose-900/50 shadow-sm relative overflow-hidden" data-aos="fade-up" data-aos-delay="100">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-rose-100 dark:bg-rose-950/60 text-rose-600 dark:text-rose-400 flex items-center justify-center">
                                <x-lucide-circle-alert class="w-6 h-6"/>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                                {{ __('gosor_hr.versus.legacy.title') }}
                            </h3>
                        </div>

                        <ul class="space-y-4">
                            @foreach(__('gosor_hr.versus.legacy.points') as $point)
                            <li class="flex items-start gap-3 text-sm text-slate-600 dark:text-slate-300">
                                <div class="w-5 h-5 rounded-full bg-rose-500/10 text-rose-600 flex items-center justify-center shrink-0 mt-0.5">
                                    <x-lucide-x class="w-3.5 h-3.5"/>
                                </div>
                                <span>{{ $point }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Modern Gosor HR Box (Positive Glowing) -->
                    <div class="rounded-3xl p-8 bg-gradient-to-b from-emerald-500/5 via-teal-500/5 to-cyan-500/5 dark:from-emerald-950/40 dark:via-slate-900 dark:to-cyan-950/40 border-2 border-emerald-500/40 dark:border-emerald-500/40 shadow-xl relative overflow-hidden" data-aos="fade-up" data-aos-delay="200">
                        
                        <!-- Top Tag -->
                        <div class="absolute top-4 end-4">
                            <span class="px-3 py-1 rounded-full text-xs font-bold bg-emerald-500 text-white shadow-sm">
                                Recommended
                            </span>
                        </div>

                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 rounded-2xl bg-gradient-to-br from-emerald-500 to-teal-600 text-white flex items-center justify-center shadow-lg shadow-emerald-500/30">
                                <x-lucide-sparkles class="w-6 h-6"/>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                                {{ __('gosor_hr.versus.modern.title') }}
                            </h3>
                        </div>

                        <ul class="space-y-4">
                            @foreach(__('gosor_hr.versus.modern.points') as $point)
                            <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-200 font-medium">
                                <div class="w-5 h-5 rounded-full bg-emerald-500 text-white flex items-center justify-center shrink-0 mt-0.5">
                                    <x-lucide-check class="w-3.5 h-3.5"/>
                                </div>
                                <span>{{ $point }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

            </div>
        </section>

        <!-- SECTION: SMART ATTENDANCE FEATURES (ZERO HARDWARE) -->
        <section id="attendance" class="py-24 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border border-cyan-500/20 mb-3">
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
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                    
                    <!-- 1. GPS Geofencing -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 hover:border-emerald-500/50 hover:shadow-xl transition-all group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="50">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <x-lucide-map-pin class="w-7 h-7"/>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">
                                {{ __('gosor_hr.attendance.features.gps.title') }}
                            </h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('gosor_hr.attendance.features.gps.desc') }}
                            </p>
                        </div>
                    </div>

                    <!-- 2. Field & Remote -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 hover:border-cyan-500/50 hover:shadow-xl transition-all group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="100">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <x-lucide-briefcase class="w-7 h-7"/>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">
                                {{ __('gosor_hr.attendance.features.remote.title') }}
                            </h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('gosor_hr.attendance.features.remote.desc') }}
                            </p>
                        </div>
                    </div>

                    <!-- 3. Shifts & Rotations -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 hover:border-purple-500/50 hover:shadow-xl transition-all group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="150">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-purple-500/10 text-purple-600 dark:text-purple-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <x-lucide-clock class="w-7 h-7"/>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">
                                {{ __('gosor_hr.attendance.features.shifts.title') }}
                            </h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('gosor_hr.attendance.features.shifts.desc') }}
                            </p>
                        </div>
                    </div>

                    <!-- 4. Offline Mode -->
                    <div class="p-8 rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 hover:border-amber-500/50 hover:shadow-xl transition-all group flex flex-col justify-between" data-aos="fade-up" data-aos-delay="200">
                        <div>
                            <div class="w-14 h-14 rounded-2xl bg-amber-500/10 text-amber-600 dark:text-amber-400 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                                <x-lucide-wifi-off class="w-7 h-7"/>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900 dark:text-white mb-3">
                                {{ __('gosor_hr.attendance.features.offline.title') }}
                            </h3>
                            <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('gosor_hr.attendance.features.offline.desc') }}
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- SECTION: AI-POWERED HR CAPABILITIES -->
        <section id="ai-features" class="py-24 relative bg-slate-900 text-white overflow-hidden">
            <!-- Background Orbs -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute top-1/4 start-1/4 w-96 h-96 bg-purple-600/20 rounded-full blur-3xl animate-pulse-glow"></div>
                <div class="absolute bottom-1/4 end-1/4 w-96 h-96 bg-emerald-600/20 rounded-full blur-3xl animate-pulse-glow" style="animation-delay: -4s;"></div>
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-purple-500/20 text-purple-300 border border-purple-500/30 mb-3">
                        <x-lucide-sparkles class="w-3.5 h-3.5"/>
                        {{ __('gosor_hr.ai.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                        {{ __('gosor_hr.ai.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-300">
                        {{ __('gosor_hr.ai.subtitle') }}
                    </p>
                </div>

                <!-- 6 AI Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 sm:gap-8 mb-16">
                    
                    @foreach(__('gosor_hr.ai.items') as $key => $item)
                    <div class="p-8 rounded-3xl bg-slate-800/80 border border-slate-700 hover:border-purple-500/60 transition-all hover:bg-slate-800 shadow-xl backdrop-blur-md" data-aos="fade-up">
                        <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-purple-500 to-indigo-600 text-white flex items-center justify-center mb-6 shadow-md">
                            @if($key === 'forecast')
                                <x-lucide-trending-up class="w-6 h-6"/>
                            @elseif($key === 'scheduling')
                                <x-lucide-calendar-range class="w-6 h-6"/>
                            @elseif($key === 'approvals')
                                <x-lucide-check-check class="w-6 h-6"/>
                            @elseif($key === 'anomalies')
                                <x-lucide-shield-alert class="w-6 h-6"/>
                            @elseif($key === 'copilot')
                                <x-lucide-bot-message-square class="w-6 h-6"/>
                            @else
                                <x-lucide-award class="w-6 h-6"/>
                            @endif
                        </div>
                        <h3 class="text-lg font-bold text-white mb-2">
                            {{ $item['title'] }}
                        </h3>
                        <p class="text-sm text-slate-300 leading-relaxed">
                            {{ $item['desc'] }}
                        </p>
                    </div>
                    @endforeach

                </div>

                <!-- Interactive AI Copilot Live Simulation Box -->
                <div class="rounded-3xl border border-slate-700 bg-slate-800/90 p-6 sm:p-8 backdrop-blur-xl max-w-4xl mx-auto shadow-2xl" data-aos="fade-up">
                    <div class="flex items-center gap-3 border-b border-slate-700 pb-4 mb-5">
                        <div class="w-9 h-9 rounded-xl bg-purple-600 text-white flex items-center justify-center">
                            <x-lucide-sparkles class="w-5 h-5"/>
                        </div>
                        <div>
                            <h3 class="text-base font-bold text-white">Gosor HR AI Copilot</h3>
                            <p class="text-xs text-slate-400">Natural Language Workforce Assistant</p>
                        </div>
                    </div>

                    <!-- Chat Bubble 1: Manager Prompt -->
                    <div class="flex items-start gap-3 mb-4">
                        <div class="w-8 h-8 rounded-full bg-slate-700 text-slate-300 flex items-center justify-center text-xs font-bold shrink-0">HR</div>
                        <div class="p-3.5 rounded-2xl rounded-ss-none bg-slate-700/80 text-sm text-slate-100 max-w-lg">
                            {{ app()->getLocale() === 'ar' ? 'حلل لي أسباب تأخيرات قسم المبيعات خلال الأسبوعين الماضيين وقدم توصية فورية.' : 'Analyze sales department delay trends over the past 2 weeks and suggest an action plan.' }}
                        </div>
                    </div>

                    <!-- Chat Bubble 2: AI Response -->
                    <div class="flex items-start gap-3 justify-end">
                        <div class="p-4 rounded-2xl rounded-se-none bg-gradient-to-r from-emerald-900/60 via-teal-900/60 to-cyan-900/60 border border-emerald-500/40 text-sm text-slate-100 max-w-xl">
                            <div class="flex items-center gap-1.5 text-xs text-emerald-400 font-bold mb-1.5">
                                <x-lucide-bot class="w-4 h-4"/>
                                <span>AI Copilot Analysis</span>
                            </div>
                            <p class="text-xs sm:text-sm leading-relaxed">
                                {{ app()->getLocale() === 'ar' 
                                    ? 'تم رصد 12 تأخيراً بنسبة 80% في فرع المعادي بسبب أعمال الطرق الصباحية. التوصية: تفعيل نظام الوردية المرنة (30 دقيقة سماح) وتعويضها مساءً للحفاظ على معدل الإنتاجية بنسبة 100%.' 
                                    : 'Detected 12 delays (80% concentrated in Maadi Branch due to morning transit roadworks). Suggested recommendation: Enable dynamic 30-min flexi-window with evening compensation to retain 100% target throughput.' }}
                            </p>
                        </div>
                        <div class="w-8 h-8 rounded-full bg-purple-600 text-white flex items-center justify-center shrink-0">
                            <x-lucide-sparkles class="w-4 h-4"/>
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
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 mb-3">
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
                <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-4 mb-12" id="report-tabs-nav" data-aos="fade-up">
                    <button type="button" data-tab="payroll" class="report-tab-btn active px-5 py-3 rounded-2xl text-sm font-bold transition-all shadow-xs cursor-pointer">
                        {{ __('gosor_hr.reports.tabs.payroll') }}
                    </button>
                    <button type="button" data-tab="attendance" class="report-tab-btn px-5 py-3 rounded-2xl text-sm font-bold transition-all shadow-xs cursor-pointer">
                        {{ __('gosor_hr.reports.tabs.attendance') }}
                    </button>
                    <button type="button" data-tab="financial" class="report-tab-btn px-5 py-3 rounded-2xl text-sm font-bold transition-all shadow-xs cursor-pointer">
                        {{ __('gosor_hr.reports.tabs.financial') }}
                    </button>
                </div>

                <!-- Tab Content Containers -->
                <div class="max-w-5xl mx-auto" data-aos="fade-up">
                    
                    <!-- TAB 1: PAYROLL -->
                    <div id="tab-content-payroll" class="report-tab-pane">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 shadow-xl">
                            <div class="lg:col-span-5 space-y-4">
                                <div class="w-12 h-12 rounded-2xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center">
                                    <x-lucide-calculator class="w-6 h-6"/>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.reports.payroll_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.reports.payroll_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach(__('gosor_hr.reports.payroll_card.items') as $item)
                                    <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                        <x-lucide-check-circle-2 class="w-5 h-5 text-emerald-500 shrink-0"/>
                                        <span>{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            
                            <!-- Real System Payroll Screenshot in Frame -->
                            <div class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-xl group">
                                <div class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                        <span class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'تقرير التفاصيل المالية والرواتب' : 'Financial & Payroll Report' }}</span>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-full bg-emerald-500/10 text-emerald-600 font-bold text-[10px]">WPS Ready</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-slate-950">
                                    <img src="{{ asset($hrImgPath . 'payroll_report.png') }}" alt="Gosor HR Payroll Report" class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500" loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 2: ATTENDANCE RADAR -->
                    <div id="tab-content-attendance" class="report-tab-pane hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 shadow-xl">
                            <div class="lg:col-span-5 space-y-4">
                                <div class="w-12 h-12 rounded-2xl bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center">
                                    <x-lucide-radar class="w-6 h-6"/>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.reports.radar_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.reports.radar_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach(__('gosor_hr.reports.radar_card.items') as $item)
                                    <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                        <x-lucide-check-circle-2 class="w-5 h-5 text-cyan-500 shrink-0"/>
                                        <span>{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real Attendance Log Screenshot in Frame -->
                            <div class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-xl group">
                                <div class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                        <span class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'سجل الحضور والغياب اليومي' : 'Daily Attendance & Absence Log' }}</span>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-full bg-cyan-500/10 text-cyan-600 font-bold text-[10px]">Real-Time Sync</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-slate-950">
                                    <img src="{{ asset($hrImgPath . 'attendance_report.png') }}" alt="Gosor HR Attendance Statistics" class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500" loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: FINANCIAL BREAKDOWN -->
                    <div id="tab-content-financial" class="report-tab-pane hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center rounded-3xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 sm:p-8 shadow-xl">
                            <div class="lg:col-span-5 space-y-4">
                                <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center">
                                    <x-lucide-receipt class="w-6 h-6"/>
                                </div>
                                <h3 class="text-2xl font-bold text-slate-900 dark:text-white">
                                    {{ __('gosor_hr.reports.financial_card.title') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('gosor_hr.reports.financial_card.desc') }}
                                </p>
                                <ul class="space-y-3 pt-2">
                                    @foreach(__('gosor_hr.reports.financial_card.items') as $item)
                                    <li class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-200">
                                        <x-lucide-check-circle-2 class="w-5 h-5 text-indigo-500 shrink-0"/>
                                        <span>{{ $item }}</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>

                            <!-- Real Financial Breakdown Screenshot -->
                            <div class="lg:col-span-7 rounded-2xl overflow-hidden border border-slate-200 dark:border-slate-700 shadow-xl group">
                                <div class="px-4 py-2.5 bg-slate-100 dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 flex items-center justify-between text-xs">
                                    <div class="flex items-center gap-2">
                                        <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                        <span class="font-bold text-slate-700 dark:text-slate-300 ms-2">{{ app()->getLocale() === 'ar' ? 'التفاصيل المالية وملاحظات الحساب' : 'Financial Breakdown & Salary Details' }}</span>
                                    </div>
                                    <span class="px-2 py-0.5 rounded-full bg-indigo-500/10 text-indigo-600 font-bold text-[10px]">Audit Ready</span>
                                </div>
                                <div class="overflow-hidden bg-white dark:bg-slate-950">
                                    <img src="{{ asset($hrImgPath . 'financial_breakdown.png') }}" alt="Gosor HR Financial Breakdown" class="w-full h-auto object-cover transform group-hover:scale-[1.02] transition duration-500" loading="lazy" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

        <!-- SECTION: PRICING PLANS -->
        <section id="pricing" class="py-24 relative bg-slate-50/70 dark:bg-slate-950/60 border-y border-slate-200/80 dark:border-slate-800/80">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-12" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 mb-3">
                        <x-lucide-tag class="w-3.5 h-3.5"/>
                        {{ __('gosor_hr.pricing.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.pricing.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.pricing.subtitle') }}
                    </p>

                    <!-- Monthly / Annual Toggle Switch -->
                    <div class="mt-8 inline-flex items-center gap-3 p-1.5 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-sm">
                        <button type="button" id="billing-monthly-btn" class="billing-toggle-btn active px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition-all cursor-pointer">
                            {{ __('gosor_hr.pricing.billing.monthly') }}
                        </button>
                        <button type="button" id="billing-yearly-btn" class="billing-toggle-btn px-4 py-2 rounded-xl text-xs sm:text-sm font-bold transition-all cursor-pointer flex items-center gap-1.5">
                            <span>{{ __('gosor_hr.pricing.billing.yearly') }}</span>
                            <span class="px-2 py-0.5 rounded-full text-[10px] font-extrabold bg-emerald-500 text-white">
                                {{ __('gosor_hr.pricing.billing.save_badge') }}
                            </span>
                        </button>
                    </div>
                </div>

                <!-- 4 Pricing Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8 items-stretch mb-16" data-aos="fade-up">
                    
                    @foreach(__('gosor_hr.pricing.plans') as $planKey => $plan)
                    @php
                        $isFeatured = $plan['is_featured'] ?? false;
                    @endphp
                    <div class="relative rounded-3xl p-6 sm:p-7 flex flex-col justify-between transition-all duration-300 {{ $isFeatured ? 'bg-gradient-to-b from-emerald-500/10 via-teal-500/5 to-slate-900/40 dark:from-emerald-950/60 dark:via-slate-900 dark:to-cyan-950/40 border-2 border-emerald-500 shadow-2xl shadow-emerald-500/15 lg:-translate-y-2' : 'bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 shadow-lg hover:border-slate-300 dark:hover:border-slate-700' }}">
                        
                        <!-- Featured Badge -->
                        @if($isFeatured)
                        <div class="absolute -top-3.5 start-1/2 -translate-x-1/2 rtl:translate-x-1/2">
                            <span class="px-3.5 py-1 rounded-full text-xs font-extrabold bg-gradient-to-r from-emerald-500 to-teal-500 text-white shadow-md flex items-center gap-1">
                                <x-lucide-sparkles class="w-3 h-3"/>
                                {{ $plan['badge'] }}
                            </span>
                        </div>
                        @endif

                        <div>
                            <!-- Header Info -->
                            <div class="flex items-center justify-between gap-2 mb-3">
                                <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                                    {{ $plan['name'] }}
                                </h3>
                                @if(!$isFeatured)
                                <span class="px-2.5 py-0.5 rounded-full text-[11px] font-semibold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-300 border border-slate-200 dark:border-slate-700">
                                    {{ $plan['badge'] }}
                                </span>
                                @endif
                            </div>

                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed mb-6 min-h-[36px]">
                                {{ $plan['desc'] }}
                            </p>

                            <!-- Price Display -->
                            <div class="mb-6 pb-6 border-b border-slate-100 dark:border-slate-800">
                                <!-- Monthly Price -->
                                <div class="price-box-monthly flex items-baseline gap-1.5">
                                    <span class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">{{ $plan['monthly_price'] }}</span>
                                    <span class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $plan['currency'] }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $plan['period_month'] }}</span>
                                </div>
                                <!-- Yearly Price (hidden by default) -->
                                <div class="price-box-yearly hidden flex items-baseline gap-1.5">
                                    <span class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">{{ $plan['yearly_price'] }}</span>
                                    <span class="text-xs font-bold text-slate-500 dark:text-slate-400">{{ $plan['currency'] }}</span>
                                    <span class="text-xs text-slate-500 dark:text-slate-400">{{ $plan['period_year'] }}</span>
                                </div>
                                <div class="mt-2 flex items-center gap-2">
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">
                                        <x-lucide-users class="w-3 h-3"/>
                                        {{ $plan['max_employees'] }}
                                    </span>
                                    <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-md text-[11px] font-semibold bg-slate-100 dark:bg-slate-800 text-slate-600 dark:text-slate-400">
                                        <x-lucide-clock class="w-3 h-3"/>
                                        {{ $plan['duration'] }}
                                    </span>
                                </div>
                            </div>

                            <!-- Features Checklist -->
                            <ul class="space-y-3 mb-8">
                                @foreach($plan['features'] as $feat)
                                <li class="flex items-start gap-2.5 text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                                    <div class="w-4 h-4 rounded-full {{ $isFeatured ? 'bg-emerald-500 text-white' : 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400' }} flex items-center justify-center shrink-0 mt-0.5">
                                        <x-lucide-check class="w-2.5 h-2.5"/>
                                    </div>
                                    <span>{{ $feat }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <!-- CTA Button -->
                        <div class="pt-2">
                            <a href="#demo-form" data-plan="{{ $planKey }}" class="plan-cta-btn w-full py-3 px-4 rounded-xl text-xs sm:text-sm font-bold text-center flex items-center justify-center gap-2 transition-all transform hover:-translate-y-0.5 {{ $isFeatured ? 'bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 hover:from-emerald-500 hover:to-cyan-500 text-white shadow-lg shadow-emerald-500/25' : 'bg-slate-100 hover:bg-slate-200 dark:bg-slate-800 dark:hover:bg-slate-700 text-slate-900 dark:text-white border border-slate-200 dark:border-slate-700' }}">
                                <span>{{ $plan['cta'] }}</span>
                                <x-feathericon-arrow-right class="w-3.5 h-3.5 rtl:rotate-180"/>
                            </a>
                        </div>

                    </div>
                    @endforeach

                </div>

                <!-- Custom Enterprise Callout Banner -->
                <div class="rounded-3xl border border-slate-200 dark:border-slate-800 bg-gradient-to-r from-slate-900 via-slate-800 to-indigo-950 p-8 text-white shadow-xl flex flex-col md:flex-row items-center justify-between gap-6" data-aos="fade-up">
                    <div class="flex items-center gap-4 text-center md:text-start">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 hidden sm:flex">
                            <x-lucide-building-2 class="w-6 h-6"/>
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
                    <a href="#demo-form" data-plan="custom" class="plan-cta-btn inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl text-sm font-bold text-slate-900 bg-white hover:bg-slate-100 transition shadow-md shrink-0">
                        <span>{{ __('gosor_hr.pricing.custom.cta') }}</span>
                        <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180"/>
                    </a>
                </div>

            </div>
        </section>

        <!-- SECTION: EMPLOYEE MOBILE APP (ESS) -->
        <section id="mobile-app" class="py-24 relative bg-slate-100/50 dark:bg-slate-950/40 border-y border-slate-200/80 dark:border-slate-800/80">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left: Real Mobile Screenshots (Dual Clock In & Clock Out Mockups) -->
                    <div class="lg:col-span-6 order-2 lg:order-1" data-aos="fade-right">
                        <div class="flex items-center justify-center gap-4 sm:gap-6">
                            
                            <!-- Phone 1: Clock In state -->
                            <div class="w-1/2 max-w-[240px] rounded-[36px] border-4 sm:border-[6px] border-slate-900 bg-slate-900 shadow-2xl overflow-hidden ring-1 ring-slate-700/50 group">
                                <div class="py-1 px-3 bg-slate-900 text-[10px] text-center font-bold text-emerald-400 border-b border-slate-800">
                                    Clock In Screen
                                </div>
                                <img src="{{ asset('images/gosor/hr/app_clock_in.jpg') }}" alt="Gosor HR Mobile Clock In" class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-500" loading="lazy" />
                            </div>

                            <!-- Phone 2: Clock Out state -->
                            <div class="w-1/2 max-w-[240px] rounded-[36px] border-4 sm:border-[6px] border-slate-900 bg-slate-900 shadow-2xl overflow-hidden ring-1 ring-slate-700/50 group mt-6 sm:mt-10">
                                <div class="py-1 px-3 bg-slate-900 text-[10px] text-center font-bold text-rose-400 border-b border-slate-800">
                                    Clock Out Screen
                                </div>
                                <img src="{{ asset('images/gosor/hr/app_clock_out.jpg') }}" alt="Gosor HR Mobile Clock Out" class="w-full h-auto object-cover transform group-hover:scale-105 transition duration-500" loading="lazy" />
                            </div>

                        </div>
                    </div>

                    <!-- Right: ESS Feature List -->
                    <div class="lg:col-span-6 order-1 lg:order-2" data-aos="fade-left">
                        <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 border border-indigo-500/20 mb-3">
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
                            @foreach(__('gosor_hr.app.features') as $key => $feature)
                            <div class="flex items-start gap-3 p-3 rounded-2xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800">
                                <div class="w-6 h-6 rounded-lg bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                    <x-lucide-check class="w-4 h-4"/>
                                </div>
                                <span class="text-sm font-semibold text-slate-800 dark:text-slate-200">{{ $feature }}</span>
                            </div>
                            @endforeach
                        </div>

                        <!-- App Badges -->
                        <div class="flex flex-wrap items-center gap-4">
                            <div class="px-4 py-2.5 rounded-xl bg-slate-900 text-white flex items-center gap-3 border border-slate-800 shadow-md">
                                <x-lucide-apple class="w-6 h-6"/>
                                <div class="text-start">
                                    <div class="text-[9px] uppercase tracking-wider text-slate-400">Download on</div>
                                    <div class="text-xs font-bold">App Store (iOS)</div>
                                </div>
                            </div>
                            <div class="px-4 py-2.5 rounded-xl bg-slate-900 text-white flex items-center gap-3 border border-slate-800 shadow-md">
                                <x-lucide-smartphone class="w-6 h-6"/>
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

        <!-- SECTION: DETAILED COMPARISON TABLE -->
        <section id="comparison" class="py-24 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-teal-500/10 text-teal-600 dark:text-teal-400 border border-teal-500/20 mb-3">
                        {{ __('gosor_hr.comparison.badge') }}
                    </span>
                    <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('gosor_hr.comparison.title') }}
                    </h2>
                    <p class="mt-4 text-base sm:text-lg text-slate-600 dark:text-slate-400">
                        {{ __('gosor_hr.comparison.subtitle') }}
                    </p>
                </div>

                <!-- Table Card Container -->
                <div class="overflow-x-auto rounded-3xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-xl" data-aos="fade-up">
                    <table class="w-full text-start text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 dark:border-slate-800 bg-slate-50 dark:bg-slate-800/50">
                                <th class="p-5 text-start font-bold text-slate-900 dark:text-white">{{ __('gosor_hr.comparison.headers.feature') }}</th>
                                <th class="p-5 text-start font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/10">{{ __('gosor_hr.comparison.headers.gosor') }}</th>
                                <th class="p-5 text-start font-bold text-slate-700 dark:text-slate-300">{{ __('gosor_hr.comparison.headers.fingerprint') }}</th>
                                <th class="p-5 text-start font-bold text-slate-700 dark:text-slate-300">{{ __('gosor_hr.comparison.headers.spreadsheet') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 dark:divide-slate-800">
                            @foreach(__('gosor_hr.comparison.rows') as $row)
                            <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition">
                                <td class="p-5 font-semibold text-slate-900 dark:text-white">{{ $row['name'] }}</td>
                                <td class="p-5 font-bold text-emerald-600 dark:text-emerald-400 bg-emerald-500/5">{{ $row['gosor'] }}</td>
                                <td class="p-5 text-slate-600 dark:text-slate-400">{{ $row['fingerprint'] }}</td>
                                <td class="p-5 text-slate-600 dark:text-slate-400">{{ $row['spreadsheet'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </section>

        <!-- SECTION: FAQ ACCORDION -->
        <section id="faq" class="py-24 relative bg-slate-100/50 dark:bg-slate-950/40 border-t border-slate-200/80 dark:border-slate-800/80">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
                
                <!-- Section Header -->
                <div class="text-center max-w-2xl mx-auto mb-16" data-aos="fade-up">
                    <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20 mb-3">
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
                    @foreach(__('gosor_hr.faq.items') as $index => $item)
                    <div class="faq-item rounded-2xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 overflow-hidden shadow-xs transition">
                        <button type="button" class="faq-toggler w-full p-5 text-start flex items-center justify-between gap-4 font-bold text-slate-900 dark:text-white hover:text-emerald-600 dark:hover:text-emerald-400 transition cursor-pointer">
                            <span>{{ $item['q'] }}</span>
                            <div class="w-6 h-6 rounded-full bg-slate-100 dark:bg-slate-800 flex items-center justify-center shrink-0 transition-transform duration-200 faq-icon">
                                <x-feathericon-chevron-down class="w-4 h-4"/>
                            </div>
                        </button>
                        <div class="faq-answer px-5 pb-5 text-sm text-slate-600 dark:text-slate-300 leading-relaxed hidden">
                            {{ $item['a'] }}
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- SECTION: DEMO REQUEST / LEAD GENERATION FORM -->
        <section id="demo-form" class="py-24 relative overflow-hidden">
            <!-- Glow background -->
            <div class="absolute inset-0 pointer-events-none">
                <div class="absolute bottom-0 start-1/2 -translate-x-1/2 w-[700px] h-[350px] bg-gradient-to-t from-emerald-500/15 to-cyan-500/0 blur-3xl"></div>
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="rounded-3xl border border-slate-200 dark:border-slate-800 bg-white dark:bg-slate-900 shadow-2xl p-8 sm:p-12 lg:p-16">
                    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                        
                        <!-- Left Info & Benefits -->
                        <div class="lg:col-span-5 space-y-6" data-aos="fade-right">
                            <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border border-emerald-500/20">
                                {{ __('gosor_hr.demo.badge') }}
                            </span>
                            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                                {{ __('gosor_hr.demo.title') }}
                            </h2>
                            <p class="text-base text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('gosor_hr.demo.subtitle') }}
                            </p>

                            <!-- Trust benefits list -->
                            <div class="space-y-4 pt-4 border-t border-slate-100 dark:border-slate-800">
                                <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                                    <div class="w-8 h-8 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                                        <x-lucide-shield-check class="w-5 h-5"/>
                                    </div>
                                    <span>{{ __('gosor_hr.demo.benefits.free_trial') }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                                    <div class="w-8 h-8 rounded-xl bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center shrink-0">
                                        <x-lucide-rocket class="w-5 h-5"/>
                                    </div>
                                    <span>{{ __('gosor_hr.demo.benefits.free_onboarding') }}</span>
                                </div>
                                <div class="flex items-center gap-3 text-sm text-slate-700 dark:text-slate-300">
                                    <div class="w-8 h-8 rounded-xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0">
                                        <x-lucide-headset class="w-5 h-5"/>
                                    </div>
                                    <span>{{ __('gosor_hr.demo.benefits.dedicated_support') }}</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Interactive Form -->
                        <div class="lg:col-span-7" data-aos="fade-left">
                            <form id="hr-demo-form" action="{{ route('gosor-hr.demo') }}" method="POST" class="space-y-5 p-6 sm:p-8 rounded-2xl bg-slate-50 dark:bg-slate-800/60 border border-slate-200 dark:border-slate-700">
                                @csrf

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="name" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.name') }} *</label>
                                        <input type="text" id="name" name="name" required placeholder="{{ __('gosor_hr.demo.form.name_placeholder') }}" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition"/>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.email') }} *</label>
                                        <input type="email" id="email" name="email" required placeholder="{{ __('gosor_hr.demo.form.email_placeholder') }}" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition"/>
                                    </div>
                                </div>

                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label for="phone" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.phone') }} *</label>
                                        <input type="tel" id="phone" name="phone" required placeholder="{{ __('gosor_hr.demo.form.phone_placeholder') }}" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition"/>
                                    </div>
                                    <div>
                                        <label for="company" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.company') }} *</label>
                                        <input type="text" id="company" name="company" required placeholder="{{ __('gosor_hr.demo.form.company_placeholder') }}" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition"/>
                                    </div>
                                </div>

                                <div>
                                    <label for="employees_count" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.employees_count') }}</label>
                                    <select id="employees_count" name="employees_count" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition">
                                        @foreach(__('gosor_hr.demo.form.employees_options') as $optKey => $optVal)
                                        <option value="{{ $optKey }}">{{ $optVal }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div>
                                    <label for="message" class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5">{{ __('gosor_hr.demo.form.message') }}</label>
                                    <textarea id="message" name="message" rows="3" placeholder="{{ __('gosor_hr.demo.form.message_placeholder') }}" class="w-full px-4 py-3 rounded-xl bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-700 text-sm text-slate-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-emerald-500 transition"></textarea>
                                </div>

                                <button type="submit" id="submit-demo-btn" class="w-full py-4 text-sm font-bold text-white rounded-xl bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600 hover:from-emerald-500 hover:to-cyan-500 shadow-xl shadow-emerald-500/25 transition-all transform hover:-translate-y-0.5 cursor-pointer flex items-center justify-center gap-2">
                                    <span>{{ __('gosor_hr.demo.form.submit') }}</span>
                                    <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180"/>
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
    <footer class="border-t border-slate-200 dark:border-slate-800/80 bg-white/80 dark:bg-[#070b13] py-12 relative z-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                
                <!-- Logo & Tagline -->
                <div class="flex flex-col sm:flex-row items-center gap-4 text-center sm:text-start">
                    <a href="{{ route('landing') }}" class="group">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions" class="h-9 w-auto logo-themed"/>
                    </a>
                    <span class="text-xs text-slate-500 max-w-sm">
                        {{ __('gosor_hr.footer.tagline') }}
                    </span>
                </div>

                <!-- Links & Back to Gosor -->
                <div class="flex flex-wrap items-center justify-center gap-4 text-xs font-semibold text-slate-600 dark:text-slate-400">
                    <a href="{{ route('landing') }}" class="hover:text-emerald-500 transition">{{ __('gosor_hr.nav.back_to_gosor') }}</a>
                    <a href="#why-gosor" class="hover:text-emerald-500 transition">{{ __('gosor_hr.nav.why_gosor') }}</a>
                    <a href="#attendance" class="hover:text-emerald-500 transition">{{ __('gosor_hr.nav.attendance') }}</a>
                    <a href="#ai-features" class="hover:text-emerald-500 transition">{{ __('gosor_hr.nav.ai_features') }}</a>
                    <a href="#pricing" class="hover:text-emerald-500 transition">{{ __('gosor_hr.nav.pricing') }}</a>
                    <a href="#demo-form" class="hover:text-emerald-500 transition">{{ __('gosor_hr.nav.request_demo') }}</a>
                </div>

                <!-- Copyright & Policy -->
                <div class="flex items-center gap-3 text-xs text-slate-400">
                    <span>{{ __('gosor_hr.footer.copyright', ['year' => date('Y')]) }}</span>
                    <span>•</span>
                    <a href="{{ route('privacy-policy') }}" class="hover:text-emerald-500 underline-offset-4 hover:underline transition">
                        {{ __('landing.footer.privacy_policy') }}
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    @if(isset($settings['whatsapp']) && $settings['whatsapp'])
    <a aria-label="whatsapp" href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp']) }}" target="_blank" 
       class="fixed bottom-6 end-6 z-50 flex h-14 w-14 items-center justify-center rounded-full text-white shadow-lg transition-all duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-offset-2"
       style="background-color: #25D366; box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);">
        <x-fab-whatsapp class="w-8 h-8"/>
    </a>
    @endif

    <style>
        .report-tab-btn {
            background-color: transparent;
            color: #64748b;
            border: 1px solid transparent;
        }
        .report-tab-btn:hover {
            color: #10b981;
        }
        .report-tab-btn.active {
            background-color: #10b981;
            color: #ffffff;
            border-color: #10b981;
            box-shadow: 0 4px 14px 0 rgba(16, 185, 129, 0.35);
        }
        .dark .report-tab-btn {
            color: #94a3b8;
        }
        .dark .report-tab-btn.active {
            background-color: #059669;
            color: #ffffff;
            border-color: #059669;
        }
        .billing-toggle-btn {
            background-color: transparent;
            color: #64748b;
        }
        .billing-toggle-btn.active {
            background-color: #10b981;
            color: #ffffff;
            box-shadow: 0 4px 12px 0 rgba(16, 185, 129, 0.35);
        }
        .dark .billing-toggle-btn {
            color: #94a3b8;
        }
        .dark .billing-toggle-btn.active {
            background-color: #059669;
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

            // Billing toggle logic (Monthly vs Yearly)
            const btnMonthly = document.getElementById('billing-monthly-btn');
            const btnYearly = document.getElementById('billing-yearly-btn');
            const monthlyBoxes = document.querySelectorAll('.price-box-monthly');
            const yearlyBoxes = document.querySelectorAll('.price-box-yearly');

            if (btnMonthly && btnYearly) {
                btnMonthly.addEventListener('click', function() {
                    btnMonthly.classList.add('active');
                    btnYearly.classList.remove('active');
                    monthlyBoxes.forEach(el => el.classList.remove('hidden'));
                    yearlyBoxes.forEach(el => el.classList.add('hidden'));
                });

                btnYearly.addEventListener('click', function() {
                    btnYearly.classList.add('active');
                    btnMonthly.classList.remove('active');
                    yearlyBoxes.forEach(el => el.classList.remove('hidden'));
                    monthlyBoxes.forEach(el => el.classList.add('hidden'));
                });
            }

            // Plan CTA pre-selection for Demo form
            const planCtaButtons = document.querySelectorAll('.plan-cta-btn');
            const empSelect = document.getElementById('employees_count');

            planCtaButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const plan = this.getAttribute('data-plan');
                    if (empSelect && plan) {
                        empSelect.value = plan;
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
