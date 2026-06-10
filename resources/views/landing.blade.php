<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ __('landing.hero.subtitle') }}">
    <title>{{ __('landing.hero.badge') }} - {{ __('landing.hero.title') }}</title>

    <!-- Google Fonts: Cairo (Arabic) & Plus Jakarta Sans (English) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Vite Styles & Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#070b13] text-slate-100 antialiased overflow-x-hidden selection:bg-cyan-500 selection:text-slate-900">

    <!-- Global Background Elements -->
    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none">
        <!-- Main background radial glow -->
        <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-indigo-950/30 via-[#070b13] to-[#070b13]"></div>
        
        <!-- Glowing Orbs -->
        <div class="absolute top-[-10%] start-[20%] w-[500px] h-[500px] rounded-full bg-cyan-600/10 blur-[120px] animate-pulse-glow"></div>
        <div class="absolute bottom-[20%] end-[-10%] w-[600px] h-[600px] rounded-full bg-indigo-600/10 blur-[130px] animate-pulse-glow" style="animation-delay: -3s;"></div>
        
        <!-- Background Grid -->
        <div class="absolute inset-0 bg-[linear-gradient(to_right,#1e293b_1px,transparent_1px),linear-gradient(to_bottom,#1e293b_1px,transparent_1px)] bg-[size:4rem_4rem] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_0%,#000_70%,transparent_100%)] opacity-15"></div>
    </div>

    <!-- Navigation Header -->
    <header class="sticky top-0 z-40 w-full border-b border-slate-900 bg-[#070b13]/80 backdrop-blur-md transition-all duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="#" class="flex items-center gap-2 group">
                        <!-- Stylized SVG GOSOR Logo -->
                        <img src="{{ asset('logo.png') }}" alt="Logo" class="h-40 w-auto"/>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex space-x-1 lg:space-x-2 rtl:space-x-reverse items-center">
                    <a href="#home" class="px-3 py-2 text-sm font-medium text-cyan-400 hover:text-cyan-300 transition duration-150">{{ __('landing.nav.home') }}</a>
                    <a href="#about" class="px-3 py-2 text-sm font-medium text-slate-300 hover:text-cyan-400 transition duration-150">{{ __('landing.nav.about') }}</a>
                    <a href="#services" class="px-3 py-2 text-sm font-medium text-slate-300 hover:text-cyan-400 transition duration-150">{{ __('landing.nav.services') }}</a>
                    <a href="#products" class="px-3 py-2 text-sm font-medium text-slate-300 hover:text-cyan-400 transition duration-150">{{ __('landing.nav.products') }}</a>
                    <a href="#portfolio" class="px-3 py-2 text-sm font-medium text-slate-300 hover:text-cyan-400 transition duration-150">{{ __('landing.nav.portfolio') }}</a>
                    <a href="#goals" class="px-3 py-2 text-sm font-medium text-slate-300 hover:text-cyan-400 transition duration-150">{{ __('landing.nav.goals') }}</a>
                    <a href="#contact" class="px-3 py-2 text-sm font-medium text-slate-300 hover:text-cyan-400 transition duration-150">{{ __('landing.nav.contact') }}</a>
                </nav>

                <!-- Action buttons (Locale + CTA) -->
                <div class="hidden md:flex items-center gap-4">
                    <!-- Language Selector Dropdown Toggle -->
                    <div class="relative inline-block text-left" id="lang-dropdown-wrapper">
                        <button type="button" id="lang-dropdown-btn" class="inline-flex items-center gap-1.5 px-3 py-2 text-sm font-medium text-slate-300 hover:text-cyan-400 transition duration-150 rounded-lg bg-slate-950/40 border border-slate-900">
                            <!-- Globe Icon -->
                            <svg class="h-4.5 w-4.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-.778.099-1.533.284-2.253m0 0A17.919 17.919 0 0 0 12 10.5a17.918 17.918 0 0 0 8.716-2.253" />
                            </svg>
                            <span>{{ app()->getLocale() === 'ar' ? 'العربية' : 'En' }}</span>
                            <!-- Chevron -->
                            <svg class="h-4 w-4 opacity-70" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        
                        <!-- Dropdown Menu -->
                        <div id="lang-dropdown-menu" class="hidden absolute right-0 rtl:left-0 mt-2 w-32 origin-top-right rounded-xl bg-slate-900 border border-slate-800 shadow-2xl ring-1 ring-black/5 focus:outline-none">
                            <div class="py-1">
                                <a href="?lang=en" class="flex items-center px-4 py-2.5 text-sm {{ app()->getLocale() === 'en' ? 'text-cyan-400 bg-slate-850' : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }}">English</a>
                                <a href="?lang=ar" class="flex items-center px-4 py-2.5 text-sm {{ app()->getLocale() === 'ar' ? 'text-cyan-400 bg-slate-850' : 'text-slate-300 hover:bg-slate-800/50 hover:text-white' }}">العربية</a>
                            </div>
                        </div>
                    </div>

                    <!-- Get Started Primary Action Button -->
                    <a href="#contact" class="relative group overflow-hidden rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 p-px font-semibold text-white shadow-lg shadow-cyan-500/20 transition duration-300 hover:shadow-cyan-500/35 hover:scale-102">
                        <span class="block px-5 py-2.5 rounded-[11px] bg-slate-950/80 group-hover:bg-transparent transition duration-300 text-sm">
                            {{ __('landing.nav.get_started') }}
                        </span>
                    </a>
                </div>

                <!-- Hamburger Mobile Menu Icon -->
                <div class="flex md:hidden items-center gap-3">
                    <!-- Fast Switch Language Button (Mobile inline toggle) -->
                    <a href="?lang={{ app()->getLocale() === 'en' ? 'ar' : 'en' }}" class="p-2 rounded-lg bg-slate-950/60 border border-slate-900/60 text-slate-300 hover:text-cyan-400 text-xs font-semibold uppercase tracking-wider">
                        {{ app()->getLocale() === 'en' ? 'AR' : 'EN' }}
                    </a>

                    <button type="button" id="mobile-menu-btn" class="p-2 rounded-lg bg-slate-950/60 border border-slate-900/60 text-slate-400 hover:text-white hover:bg-slate-900 transition duration-150">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" id="menu-icon-hamburger" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <svg class="hidden h-6 w-6" id="menu-icon-close" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>

        <!-- Mobile Navigation Menu (Drawer style) -->
        <div class="hidden md:hidden border-t border-slate-900/80 bg-[#070b13]/95 backdrop-blur-lg px-4 py-4 space-y-2" id="mobile-menu-panel">
            <a href="#home" class="block rounded-lg px-3 py-2 text-base font-medium text-cyan-400 bg-slate-900/40">{{ __('landing.nav.home') }}</a>
            <a href="#about" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-300 hover:text-cyan-400 hover:bg-slate-900/30">{{ __('landing.nav.about') }}</a>
            <a href="#services" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-300 hover:text-cyan-400 hover:bg-slate-900/30">{{ __('landing.nav.services') }}</a>
            <a href="#products" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-300 hover:text-cyan-400 hover:bg-slate-900/30">{{ __('landing.nav.products') }}</a>
            <a href="#portfolio" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-300 hover:text-cyan-400 hover:bg-slate-900/30">{{ __('landing.nav.portfolio') }}</a>
            <a href="#goals" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-300 hover:text-cyan-400 hover:bg-slate-900/30">{{ __('landing.nav.goals') }}</a>
            <a href="#contact" class="block rounded-lg px-3 py-2 text-base font-medium text-slate-300 hover:text-cyan-400 hover:bg-slate-900/30">{{ __('landing.nav.contact') }}</a>
            
            <div class="pt-4 border-t border-slate-900 flex justify-center">
                <a href="#contact" class="w-full text-center rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 px-5 py-3 font-semibold text-white shadow-lg shadow-cyan-500/20">
                    {{ __('landing.nav.get_started') }}
                </a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        
        <!-- Hero Section -->
        <section id="home" class="relative pt-12 pb-24 md:pt-20 md:pb-32 overflow-hidden">
            <!-- Figma specified background image placeholder -->
            <div class="absolute inset-0 z-0">
                <img src="{{ asset('hero.png') }}" alt="" class="w-full h-full opacity-50 object-cover pointer-events-none" />
            </div>

            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="text-center max-w-4xl mx-auto">
                    
                    <!-- Decorative Badge -->
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-4 py-1.5 text-xs font-semibold tracking-wider text-cyan-400 border border-cyan-500/20 uppercase mb-8">
                        <span class="w-1.5 h-1.5 rounded-full bg-cyan-400 animate-ping"></span>
                        {{ __('landing.hero.badge') }}
                    </span>

                    <!-- Large Title with custom gradients -->
                    <h1 class="text-4xl font-extrabold sm:text-6xl lg:text-7xl leading-tight sm:leading-none tracking-tight mb-8">
                        <span class="bg-gradient-to-r from-slate-100 via-cyan-100 to-indigo-200 bg-clip-text text-transparent">
                            {{ __('landing.hero.title') }}
                        </span>
                    </h1>

                    <!-- Paragraph Subtitle -->
                    <p class="text-lg sm:text-xl text-slate-400 max-w-2xl mx-auto leading-relaxed mb-10">
                        {{ __('landing.hero.subtitle') }}
                    </p>

                    <!-- Call to Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-4 justify-center items-center mb-20">
                        <!-- Primary CTA -->
                        <a href="#contact" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 px-6 py-4 font-semibold text-white shadow-xl shadow-cyan-500/25 transition duration-300 hover:shadow-cyan-500/40 hover:scale-102">
                            <span>{{ __('landing.hero.cta_start') }}</span>
                            <!-- Dynamic Arrow based on direction -->
                            <svg class="h-5 w-5 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                            </svg>
                        </a>

                        <!-- Secondary CTA -->
                        <a href="#services" class="inline-flex items-center justify-center rounded-xl bg-slate-900/60 hover:bg-slate-900 backdrop-blur-md border border-slate-800 px-6 py-4 font-semibold text-slate-300 hover:text-white transition duration-300">
                            {{ __('landing.hero.cta_explore') }}
                        </a>
                    </div>

                    <!-- Statistics grid matching second screenshot -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto border-t border-slate-900 pt-16">
                        @foreach([
                            ['value' => '100+', 'label' => __('landing.hero.stats.projects')],
                            ['value' => '50+', 'label' => __('landing.hero.stats.clients')],
                            ['value' => '50+', 'label' => __('landing.hero.stats.team')],
                            ['value' => '95%', 'label' => __('landing.hero.stats.satisfaction')],
                        ] as $stat)
                            <div class="flex flex-col items-center">
                                <span class="text-3xl sm:text-4xl font-extrabold text-white">{{ $stat['value'] }}</span>
                                <span class="text-xs sm:text-sm text-white/70 font-medium mt-2 text-center">{{ $stat['label'] }}</span>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </section>

        <!-- About Us / Who We Are Section -->
        <section id="about" class="py-20 border-t border-slate-900/60 bg-gradient-to-b from-[#070b13] via-slate-950/20 to-[#070b13] relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-indigo-400 border border-indigo-500/20 uppercase mb-4">
                        {{ __('landing.about.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-6">
                        {{ __('landing.about.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed sm:text-lg">
                        {{ __('landing.about.description') }}
                    </p>
                </div>

                <!-- Mission & Vision Glassmorphic Cards -->
                <div class="grid md:grid-cols-2 gap-8 max-w-5xl mx-auto mb-24">
                    
                    <!-- Mission Card -->
                    <div class="relative rounded-3xl bg-gradient-to-b from-slate-900/50 to-slate-950/60 border border-slate-800/80 p-8 hover:border-cyan-500/30 transition duration-300 flex flex-col justify-between group overflow-hidden shadow-2xl">
                            <div>
                                <img src="{{ asset('mission.png') }}" alt="" class="w-full h-full object-cover pointer-events-none" />
                            </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-100 group-hover:text-cyan-400 transition mb-3">
                                {{ __('landing.about.mission_title') }}
                            </h3>
                            <p class="text-slate-400 text-sm leading-relaxed">
                                {{ __('landing.about.mission_text') }}
                            </p>
                        </div>
                    </div>

                    <!-- Vision Card -->
                    <div class="relative rounded-3xl bg-gradient-to-b from-slate-900/50 to-slate-950/60 border border-slate-800/80 p-8 hover:border-indigo-500/30 transition duration-300 flex flex-col justify-between group overflow-hidden shadow-2xl">
                        <div>
                            <img src="{{ asset('vision.png') }}" alt="" class="w-full h-full object-cover pointer-events-none" />
                        </div>
                        <div>
                            <h3 class="text-2xl font-bold text-slate-100 group-hover:text-indigo-400 transition mb-3">
                                {{ __('landing.about.vision_title') }}
                            </h3>
                            <p class="text-slate-400 text-sm leading-relaxed">
                                {{ __('landing.about.vision_text') }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Core Values Section -->
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-4">
                        {{ __('landing.values.title') }}
                    </h2>
                    <p class="text-slate-400">
                        {{ __('landing.values.subtitle') }}
                    </p>
                </div>

                <div class="flex flex-wrap justify-center gap-6 max-w-5xl mx-auto">
                    @foreach(__('landing.values.items') as $key => $value)
                        <div class="flex flex-col items-center gap-4 bg-slate-900/40 border border-slate-800 p-6 rounded-2xl min-w-[180px] hover:border-cyan-500/40 transition duration-300">
                            <div class="w-12 h-12 rounded-xl bg-slate-950 flex items-center justify-center border border-slate-800">
                                <svg class="w-6 h-6 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <span class="text-sm font-bold text-slate-200 tracking-wide uppercase text-center">{{ $value }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Our Services Section -->
        <section id="services" class="py-20 bg-[#070b13] relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-cyan-400 border border-cyan-500/20 uppercase mb-4">
                        {{ __('landing.services.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-6">
                        {{ __('landing.services.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed sm:text-lg">
                        {{ __('landing.services.subtitle') }}
                    </p>
                </div>

                <!-- Services Grid (3 columns desktop, responsive) -->
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
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

                    @foreach(['web', 'mobile', 'ecommerce', 'education', 'erp_crm', 'ai'] as $service)
                        <!-- Service Card -->
                        <div class="relative rounded-3xl bg-slate-900/40 backdrop-blur-md border border-slate-800/80 p-8 hover:border-indigo-500/35 hover:-translate-y-1.5 transition-all duration-300 group flex flex-col justify-between shadow-lg">
                            <div>
                                <!-- Icon Container -->
                                <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center mb-6 group-hover:bg-indigo-500 group-hover:text-white transition duration-300">
                                    {!! $serviceIcons[$service] !!}
                                </div>

                                <!-- Title -->
                                <h3 class="text-xl font-bold text-slate-100 mb-3 group-hover:text-cyan-400 transition">
                                    {{ __('landing.services.items.' . $service . '.title') }}
                                </h3>

                                <!-- Description -->
                                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                                    {{ __('landing.services.items.' . $service . '.description') }}
                                </p>
                            </div>

                            <!-- Bottom border/glow accent line -->
                            <div class="w-10 h-1 bg-indigo-500/40 group-hover:w-full group-hover:bg-cyan-500/80 transition-all duration-500 rounded-full"></div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Why Choose Us Section -->
        <section id="why-us" class="py-20 bg-[#05070c] relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-indigo-400 border border-indigo-500/20 uppercase mb-4">
                        {{ __('landing.why_us.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-6">
                        {{ __('landing.why_us.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed sm:text-lg">
                        {{ __('landing.why_us.subtitle') }}
                    </p>
                </div>

                <div class="grid lg:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach(__('landing.why_us.items') as $key => $item)
                        <div class="relative rounded-3xl bg-slate-900/30 border border-slate-800/80 p-8 hover:border-cyan-500/20 transition duration-300 group flex flex-col shadow-2xl">
                            <h3 class="text-2xl font-bold text-slate-100 group-hover:text-cyan-400 transition mb-4">
                                {{ $item['title'] }}
                            </h3>
                            <p class="text-slate-400 text-sm leading-relaxed mb-8">
                                {{ $item['description'] }}
                            </p>
                            
                            <div class="space-y-3 mt-auto">
                                @foreach($item['features'] as $feature)
                                    <div class="flex items-center gap-3">
                                        <div class="w-5 h-5 rounded-full bg-cyan-500/10 flex items-center justify-center shrink-0">
                                            <svg class="w-3 h-3 text-cyan-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7" />
                                            </svg>
                                        </div>
                                        <span class="text-sm text-slate-300">{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Our Products / Ready Systems Section -->
        <section id="products" class="py-20 border-t border-slate-900/60 bg-gradient-to-b from-[#070b13] to-slate-950 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-cyan-400 border border-cyan-500/20 uppercase mb-4">
                        {{ __('landing.products.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-6">
                        {{ __('landing.products.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed sm:text-lg">
                        {{ __('landing.products.subtitle') }}
                    </p>
                </div>

                <!-- Products Grid -->
                <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                    @for($i = 0; $i < 4; $i++)
                        <div class="relative rounded-3xl bg-slate-900/35 border border-slate-800/80 p-8 hover:border-indigo-500/25 transition duration-300 flex flex-col justify-between group overflow-hidden shadow-2xl">
                            <div>
                                <!-- Product Icon and Title Row -->
                                <div class="flex items-center gap-4 mb-6">
                                    <div class="w-12 h-12 rounded-2xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center group-hover:bg-indigo-500 group-hover:text-white transition duration-300">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4.26 10.147a60.436 60.436 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347" />
                                        </svg>
                                    </div>
                                    <h3 class="text-2xl font-bold text-slate-100 group-hover:text-cyan-400 transition">
                                        {{ __('landing.products.items.edubridge.title') }}
                                    </h3>
                                </div>

                                <!-- Description -->
                                <p class="text-slate-400 text-sm leading-relaxed mb-8">
                                    {{ __('landing.products.items.edubridge.description') }}
                                </p>

                                <!-- Features list -->
                                <div class="grid grid-cols-2 gap-y-4 gap-x-4 mb-8">
                                    @foreach(__('landing.products.items.edubridge.features') as $feature)
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-indigo-500/80 shadow-[0_0_8px_rgba(99,102,241,0.5)]"></span>
                                            <span class="text-xs text-slate-300 font-medium">{{ $feature }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <!-- Full width button -->
                            <a href="#contact" class="w-full inline-flex items-center justify-center gap-2 rounded-2xl bg-indigo-600/90 hover:bg-indigo-600 px-5 py-4 font-semibold text-white transition duration-200 shadow-lg shadow-indigo-600/10">
                                <span>{{ __('landing.products.items.edubridge.cta') }}</span>
                                <svg class="h-4 w-4 transition duration-200 transform group-hover:translate-x-1 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
                                </svg>
                            </a>
                        </div>
                    @endfor
                </div>

            </div>
        </section>

        <!-- Technologies We Use Section -->
        <section class="py-20 bg-[#05070c] relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-indigo-400 border border-indigo-500/20 uppercase mb-4 font-sans">
                        {{ __('landing.tech.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-6">
                        {{ __('landing.tech.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('landing.tech.subtitle') }}
                    </p>
                </div>

                <!-- Slanted deck technology cards -->
                <div class="flex flex-wrap justify-center items-center gap-4 md:gap-6 max-w-5xl mx-auto py-10 relative">
                    @php
                        $technologies = [
                            ['name' => 'Nuxt', 'logo' => '<svg class="h-8 w-8 text-emerald-400" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L1 21h22L12 2zm0 4.8L18.4 18H5.6L12 6.8z"/></svg>', 'rot' => '-rotate-6'],
                            ['name' => 'Java', 'logo' => '<span class="text-xs font-extrabold text-red-500 tracking-wide font-sans">JAVA</span>', 'rot' => '-rotate-3'],
                            ['name' => 'Obj-C', 'logo' => '<span class="text-[10px] font-black text-blue-500 tracking-wider font-sans">OBJ-C</span>', 'rot' => '-rotate-1'],
                            ['name' => 'Flutter', 'logo' => '<svg class="h-8 w-8 text-cyan-400" viewBox="0 0 24 24" fill="currentColor"><path d="M14.3 2.3L5 11.6l3.5 3.5 9.3-9.3zM5 11.6l3.5 3.5 5.8-5.8L10.8 5.8z M8.5 15.1l5.8 5.8 3.5-3.5-9.3-9.3z"/></svg>', 'rot' => 'rotate-0 scale-110 z-10 border-indigo-500/50'],
                            ['name' => 'Kotlin', 'logo' => '<span class="text-xs font-extrabold text-orange-400 tracking-wide font-sans">KOTLIN</span>', 'rot' => 'rotate-2'],
                            ['name' => 'Swift', 'logo' => '<span class="text-xs font-extrabold text-amber-500 tracking-wide font-sans">SWIFT</span>', 'rot' => 'rotate-4'],
                            ['name' => 'Laravel', 'logo' => '<svg class="h-8 w-8 text-red-600" viewBox="0 0 24 24" fill="currentColor"><path d="M5.4 3h13.2A2.4 2.4 0 0 1 21 5.4v13.2a2.4 2.4 0 0 1-2.4 2.4H5.4A2.4 2.4 0 0 1 3 18.6V5.4A2.4 2.4 0 0 1 5.4 3zm6.6 4.8l-3.6 3.6 1.8 1.8 1.8-1.8 1.8 1.8 1.8-1.8-3.6-3.6z"/></svg>', 'rot' => 'rotate-6'],
                        ];
                    @endphp

                    @foreach($technologies as $tech)
                        <div class="w-28 h-36 md:w-32 md:h-40 rounded-2xl bg-gradient-to-b from-slate-900 to-slate-950 border border-slate-800/80 p-4 flex flex-col justify-between items-center text-center shadow-xl {{ $tech['rot'] }} hover:rotate-0 hover:scale-105 hover:border-cyan-500/40 hover:shadow-cyan-500/5 transition-all duration-300 group cursor-pointer">
                            <div class="flex-grow flex items-center justify-center">
                                {!! $tech['logo'] !!}
                            </div>
                            <span class="text-xs font-semibold text-slate-400 group-hover:text-slate-200 transition font-sans">{{ $tech['name'] }}</span>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Our Portfolio Section -->
        <section id="portfolio" class="py-20 bg-[#070b13] relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-cyan-400 border border-cyan-500/20 uppercase mb-4">
                        {{ __('landing.portfolio.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-6">
                        {{ __('landing.portfolio.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed sm:text-lg">
                        {{ __('landing.portfolio.subtitle') }}
                    </p>
                </div>

                <!-- Portfolio project list -->
                <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                    @foreach(['project1', 'project2', 'project3'] as $projectKey)
                        <div class="relative rounded-3xl bg-slate-900/30 border border-slate-800/80 p-6 hover:border-cyan-500/20 transition duration-300 group flex flex-col justify-between shadow-2xl">
                            <div>
                                <!-- Image Placeholder Container -->
                                <div class="w-full aspect-[4/3] rounded-2xl bg-slate-950/90 border border-slate-800 p-4 mb-6 relative overflow-hidden flex items-center justify-center">
                                    <svg class="absolute inset-0 w-full h-full text-indigo-500/5" fill="none" viewBox="0 0 100 100">
                                        <grid width="10" height="10" patternUnits="userSpaceOnUse"/>
                                        <line x1="0" y1="0" x2="100" y2="100" stroke="currentColor"/>
                                        <line x1="100" y1="0" x2="0" y2="100" stroke="currentColor"/>
                                    </svg>
                                    
                                    <div class="text-center z-10">
                                        <span class="text-[10px] text-slate-600 uppercase tracking-widest block mb-1 font-sans">Platform</span>
                                        <span class="text-xs font-extrabold text-indigo-400 font-sans">GOSOR PLATFORM</span>
                                    </div>

                                    <!-- Percentage metrics tag -->
                                    <span class="absolute top-4 start-4 inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-emerald-500/10 text-[10px] font-bold text-emerald-400 border border-emerald-500/20 shadow-inner">
                                        <svg class="h-3 w-3" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306 8.9-8.91M21 7.5H18M21 7.5V10.5" />
                                        </svg>
                                        {{ __('landing.portfolio.items.' . $projectKey . '.tag') }}
                                    </span>
                                </div>

                                <!-- Title -->
                                <h3 class="text-xl font-bold text-slate-100 mb-3 group-hover:text-cyan-400 transition">
                                    {{ __('landing.portfolio.items.' . $projectKey . '.title') }}
                                </h3>

                                <!-- Description -->
                                <p class="text-slate-400 text-sm leading-relaxed mb-6">
                                    {{ __('landing.portfolio.items.' . $projectKey . '.description') }}
                                </p>
                            </div>

                            <!-- Showcase Study link -->
                            <a href="#contact" class="inline-flex items-center gap-1.5 text-xs font-bold text-indigo-400 group-hover:text-cyan-400 transition mt-auto">
                                <span>{{ __('landing.portfolio.items.' . $projectKey . '.cta') }}</span>
                                <svg class="h-4 w-4 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                </svg>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Our Strategic Goals Section -->
        <section id="goals" class="py-20 bg-[#05070c] relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-indigo-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-indigo-400 border border-indigo-500/20 uppercase mb-4 font-sans">
                        {{ __('landing.goals.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-4">
                        {{ __('landing.goals.title') }}
                    </h2>
                    <p class="text-slate-400">
                        {{ __('landing.goals.subtitle') }}
                    </p>
                </div>

                <!-- Strategic Goals Grid -->
                <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6 max-w-6xl mx-auto">
                    @php
                        $goalMeta = [
                            'sustainability' => [
                                'color' => 'from-orange-500/10 to-amber-500/5 text-orange-400 border-orange-500/20',
                                'svg' => '<svg class="w-20 h-20 text-orange-500/15 group-hover:text-orange-500/25 transition duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.594 3.94c.09-.542.56-.94 1.11-.94h2.593c.55 0 1.02.398 1.11.94l.213 1.281c.063.374.313.686.645.87.074.04.147.083.22.127.324.196.72.257 1.075.124l1.217-.456a1.125 1.125 0 0 1 1.37.49l1.296 2.247a1.125 1.125 0 0 1-.26 1.43l-1.003.828c-.293.241-.438.613-.43.992a7.723 7.723 0 0 1 0 .255c-.008.378.137.75.43.991l1.004.827c.424.35.534.954.26 1.43l-1.297 2.247a1.125 1.125 0 0 1-1.369.491l-1.217-.456c-.355-.133-.75-.072-1.076.124a6.57 6.57 0 0 1-.22.128c-.331.183-.581.495-.644.869l-.213 1.28c-.09.543-.56.941-1.11.941h-2.594c-.55 0-1.02-.398-1.11-.94l-.213-1.281c-.062-.374-.312-.686-.644-.87a6.52 6.52 0 0 1-.22-.127c-.325-.196-.72-.257-1.076-.124l-1.217.456a1.125 1.125 0 0 1-1.369-.49l-1.297-2.247a1.125 1.125 0 0 1 .26-1.43l1.004-.827c.292-.24.437-.613.43-.992a6.932 6.932 0 0 1 0-.255c.007-.378-.138-.75-.43-.991l-1.004-.827a1.125 1.125 0 0 1-.26-1.43l1.297-2.247a1.125 1.125 0 0 1 1.37-.491l1.216.456c.356.133.751.072 1.076-.124.072-.044.146-.087.22-.128.332-.183.582-.495.644-.869l.214-1.28Z"/><circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"/></svg>'
                            ],
                            'satisfaction' => [
                                'color' => 'from-purple-500/10 to-indigo-500/5 text-purple-400 border-purple-500/20',
                                'svg' => '<svg class="w-20 h-20 text-purple-500/15 group-hover:text-purple-500/25 transition duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.182 15.182a4.5 4.5 0 0 1-6.364 0M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM9.75 9.75c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Zm6.75 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75Z"/></svg>'
                            ],
                            'innovation' => [
                                'color' => 'from-pink-500/10 to-rose-500/5 text-pink-400 border-pink-500/20',
                                'svg' => '<svg class="w-20 h-20 text-pink-500/15 group-hover:text-pink-500/25 transition duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 18a3.75 3.75 0 0 0 .495-7.467 5.99 5.99 0 0 0-1.925 3.546 5.974 5.974 0 0 1-2.133-1A3.75 3.75 0 0 0 12 18Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 9.75c0 .071 0 .141.002.211a5.986 5.986 0 0 0 3.748-3.748 3.75 3.75 0 1 0-3.75 3.537Z"/></svg>'
                            ],
                            'quality' => [
                                'color' => 'from-cyan-500/10 to-blue-500/5 text-cyan-400 border-cyan-500/20',
                                'svg' => '<svg class="w-20 h-20 text-cyan-500/15 group-hover:text-cyan-500/25 transition duration-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 18a3.75 3.75 0 0 0 .495-7.467 5.99 5.99 0 0 0-1.925 3.546 5.974 5.974 0 0 1-2.133-1A3.75 3.75 0 0 0 12 18Z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 3v1.5M12 18.75V21M5.25 12H3.75M20.25 12h-1.5M6.53 6.53l1.06 1.06M16.41 16.41l1.06 1.06M6.53 17.47l1.06-1.06M16.41 7.59l1.06-1.06"/></svg>'
                            ]
                        ];
                    @endphp

                    @foreach(['sustainability', 'satisfaction', 'innovation', 'quality'] as $key)
                        <div class="relative group rounded-3xl bg-gradient-to-b {{ $goalMeta[$key]['color'] }} border p-8 hover:-translate-y-1.5 transition-all duration-300 flex flex-col justify-between h-80 shadow-2xl overflow-hidden">
                            <div>
                                <h3 class="text-2xl font-bold text-slate-100 group-hover:text-cyan-300 transition mb-4">
                                    {{ __('landing.goals.items.' . $key . '.title') }}
                                </h3>
                                <p class="text-slate-400 text-sm leading-relaxed">
                                    {{ __('landing.goals.items.' . $key . '.description') }}
                                </p>
                            </div>
                            
                            <!-- Large background graphic -->
                            <div class="absolute bottom-6 end-6 select-none pointer-events-none">
                                {!! $goalMeta[$key]['svg'] !!}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>

        <!-- Testimonials / Success Stories Section -->
        <section class="py-20 bg-[#070b13] relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-cyan-400 border border-cyan-500/20 uppercase mb-4">
                        {{ __('landing.testimonials.badge') }}
                    </span>
                    <h2 class="text-3xl font-extrabold sm:text-4xl text-slate-100 tracking-tight mb-6">
                        {{ __('landing.testimonials.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed">
                        {{ __('landing.testimonials.subtitle') }}
                    </p>
                </div>

                <!-- Testimonial Slider Panel -->
                <div class="relative max-w-4xl mx-auto">
                    <!-- Left Slide Arrow -->
                    <button type="button" class="absolute start-[-20px] md:start-[-60px] top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-slate-900 border border-slate-800 text-slate-400 hover:text-cyan-400 hover:bg-slate-950 transition duration-150 flex items-center justify-center shadow-lg z-20">
                        <svg class="h-5 w-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                    </button>

                    <!-- Quote Card container -->
                    <div class="rounded-3xl bg-slate-900/40 border border-slate-800/80 p-8 sm:p-12 backdrop-blur-md shadow-2xl relative text-center">
                        <!-- Upper Quote mark in indigo glowing box -->
                        <div class="w-12 h-12 rounded-xl bg-indigo-500/10 text-indigo-400 border border-indigo-500/25 flex items-center justify-center mx-auto mb-6 shadow-lg shadow-indigo-500/5">
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
                            </svg>
                        </div>

                        <!-- 5 Star rating -->
                        <div class="flex justify-center items-center gap-1 mb-6 text-amber-400">
                            @for($s = 0; $s < 5; $s++)
                                <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                </svg>
                            @endfor
                        </div>

                        <!-- Testimonial Quote -->
                        <p class="text-base sm:text-xl text-slate-200 leading-relaxed italic max-w-2xl mx-auto mb-8">
                            "{{ __('landing.testimonials.items.test1.quote') }}"
                        </p>

                        <!-- Reviewer Name & Title -->
                        <div class="flex flex-col items-center">
                            <span class="text-sm font-bold text-slate-100 uppercase tracking-wider">{{ __('landing.testimonials.items.test1.author') }}</span>
                            <span class="text-xs text-indigo-400 font-semibold mt-1 font-sans">{{ __('landing.testimonials.items.test1.role') }}</span>
                        </div>
                    </div>

                    <!-- Right Slide Arrow -->
                    <button type="button" class="absolute end-[-20px] md:end-[-60px] top-1/2 transform -translate-y-1/2 w-10 h-10 rounded-full bg-slate-900 border border-slate-800 text-slate-400 hover:text-cyan-400 hover:bg-slate-950 transition duration-150 flex items-center justify-center shadow-lg z-20">
                        <svg class="h-5 w-5 rtl:rotate-180" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5 15.75 12l-7.5 7.5" />
                        </svg>
                    </button>
                </div>

            </div>
        </section>

        <!-- Let's Start a Conversation / Contact Section (Screenshot 2 layout) -->
        <section id="contact" class="py-20 border-t border-slate-900/60 bg-gradient-to-b from-[#070b13] to-slate-950 relative overflow-hidden">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-3xl mx-auto mb-16">
                    <span class="inline-flex items-center gap-1.5 rounded-full bg-cyan-500/10 px-3.5 py-1.5 text-xs font-semibold tracking-wider text-cyan-400 border border-cyan-500/20 uppercase mb-4 font-sans">
                        {{ __('landing.contact.badge') }}
                    </span>
                    <h2 class="text-4xl font-extrabold text-slate-100 tracking-tight mb-4">
                        {{ __('landing.contact.title') }}
                    </h2>
                    <p class="text-slate-400 leading-relaxed max-w-2xl mx-auto">
                        {{ __('landing.contact.subtitle') }}
                    </p>
                </div>

                <!-- Two-Column Contact Setup -->
                <div class="grid lg:grid-cols-5 gap-12 max-w-6xl mx-auto items-start">
                    
                    <!-- Left Side Details: Location, Phone, Website, Follow Us Cards -->
                    <div class="lg:col-span-2 space-y-6">
                        <!-- Location Card -->
                        <div class="relative rounded-2xl bg-slate-900/40 border border-slate-800/80 p-5 flex items-center gap-4 hover:border-cyan-500/20 transition-all duration-300">
                            <div class="w-11 h-11 rounded-xl bg-cyan-500/10 text-cyan-400 flex items-center justify-center shrink-0">
                                <svg class="w-5.5 h-5.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.location_title') }}</span>
                                <span class="text-sm font-semibold text-slate-200 mt-0.5 block">{{ __('landing.contact.details.location_val') }}</span>
                            </div>
                        </div>

                        <!-- Phone Card -->
                        <div class="relative rounded-2xl bg-slate-900/40 border border-slate-800/80 p-5 flex items-center gap-4 hover:border-cyan-500/20 transition-all duration-300">
                            <div class="w-11 h-11 rounded-xl bg-indigo-500/10 text-indigo-400 flex items-center justify-center shrink-0">
                                <svg class="w-5.5 h-5.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.387a20.373 20.373 0 0 1-9.351-9.351c-.155-.44.011-.928.387-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.phone_title') }}</span>
                                <span class="text-sm font-semibold text-slate-200 mt-0.5 block font-sans">{{ __('landing.contact.details.phone_val') }}</span>
                            </div>
                        </div>

                        <!-- Website Card -->
                        <div class="relative rounded-2xl bg-slate-900/40 border border-slate-800/80 p-5 flex items-center gap-4 hover:border-cyan-500/20 transition-all duration-300">
                            <div class="w-11 h-11 rounded-xl bg-pink-500/10 text-pink-400 flex items-center justify-center shrink-0">
                                <svg class="w-5.5 h-5.5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5" />
                                </svg>
                            </div>
                            <div>
                                <span class="block text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.web_title') }}</span>
                                <span class="text-sm font-semibold text-slate-200 mt-0.5 block font-sans">{{ __('landing.contact.details.web_val') }}</span>
                            </div>
                        </div>

                        <!-- Follow Us Card -->
                        <div class="relative rounded-2xl bg-slate-900/40 border border-slate-800/80 p-5 flex flex-col gap-3 hover:border-cyan-500/20 transition-all duration-300">
                            <span class="text-xs font-semibold text-slate-500 uppercase tracking-wider">{{ __('landing.contact.details.follow') }}</span>
                            <div class="flex items-center gap-3 mt-1">
                                <!-- Facebook Link -->
                                <a href="#" class="w-10 h-10 rounded-full bg-slate-950 border border-slate-850 hover:border-cyan-500/40 hover:text-cyan-400 flex items-center justify-center transition duration-150">
                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                                </a>
                                <!-- LinkedIn Link -->
                                <a href="#" class="w-10 h-10 rounded-full bg-slate-950 border border-slate-850 hover:border-cyan-500/40 hover:text-cyan-400 flex items-center justify-center transition duration-150">
                                    <svg class="h-4.5 w-4.5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Right Side Input Form -->
                    <div class="lg:col-span-3 rounded-3xl bg-slate-900/30 border border-slate-800/80 p-8 backdrop-blur-md shadow-2xl relative">
                        <!-- Subtle border flare -->
                        <div class="absolute inset-x-0 top-0 h-px bg-gradient-to-r from-transparent via-cyan-500/20 to-transparent"></div>

                        <form onsubmit="event.preventDefault(); alert('Message sent successfully! / تم إرسال الرسالة بنجاح!');" class="space-y-5">
                            
                            <!-- Name & Email Inputs Row -->
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.name') }}</label>
                                    <input type="text" placeholder="{{ __('landing.contact.form.name_placeholder') }}" class="w-full rounded-xl bg-slate-950/80 border border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 outline-none transition duration-150">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.email') }}</label>
                                    <input type="email" placeholder="{{ __('landing.contact.form.email_placeholder') }}" class="w-full rounded-xl bg-slate-950/80 border border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 outline-none transition duration-150 font-sans">
                                </div>
                            </div>

                            <!-- Phone & Company Inputs Row -->
                            <div class="grid sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.phone') }}</label>
                                    <input type="tel" placeholder="{{ __('landing.contact.form.phone_placeholder') }}" class="w-full rounded-xl bg-slate-950/80 border border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 outline-none transition duration-150 font-sans">
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.company') }}</label>
                                    <input type="text" placeholder="{{ __('landing.contact.form.company_placeholder') }}" class="w-full rounded-xl bg-slate-950/80 border border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 outline-none transition duration-150">
                                </div>
                            </div>

                            <!-- Project Type Dropdown Select -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.project_type') }}</label>
                                <div class="relative">
                                    <select class="w-full rounded-xl bg-slate-950/80 border border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-300 outline-none transition duration-150 appearance-none">
                                        <option value="">{{ __('landing.contact.form.project_type') }}</option>
                                        <option value="web">Web Development</option>
                                        <option value="mobile">Mobile Application</option>
                                        <option value="ecommerce">E-Commerce Platform</option>
                                        <option value="custom">Custom System</option>
                                    </select>
                                    <!-- Select arrow icon -->
                                    <div class="pointer-events-none absolute inset-y-0 end-0 flex items-center px-4 text-slate-400">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Message Textarea -->
                            <div>
                                <label class="block text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">{{ __('landing.contact.form.message') }}</label>
                                <textarea rows="4" placeholder="{{ __('landing.contact.form.message_placeholder') }}" class="w-full rounded-xl bg-slate-950/80 border border-slate-800 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-3 text-sm text-slate-100 placeholder-slate-600 outline-none transition duration-150 resize-none"></textarea>
                            </div>

                            <!-- Form Submit Action -->
                            <div>
                                <button type="submit" class="w-full rounded-xl bg-gradient-to-r from-cyan-500 to-indigo-600 px-6 py-4 font-semibold text-white shadow-lg shadow-cyan-500/20 hover:scale-101 hover:shadow-cyan-500/35 transition duration-150 text-center">
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
    <footer class="border-t border-slate-900 bg-gradient-to-b from-slate-950 to-[#05070c] pt-20 pb-8 text-slate-400 relative overflow-hidden">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
            
            <!-- Grid Layout -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-12 pb-16 border-b border-slate-900">
                
                <!-- Column 1: Logo & description & Newsletter -->
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center">
                        <svg class="h-8 w-auto text-cyan-400" viewBox="0 0 160 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 29C19.4772 29 15 24.5228 15 19C15 13.4772 19.4772 9 25 9C29.2 9 32.8 11.6 34.2 15.2L29.6 16.8C28.8 14.5 26.6 13.2 25 13.2C21.8 13.2 19.2 15.8 19.2 19C19.2 22.2 21.8 24.8 25 24.8C27.5 24.8 29.5 22.8 29.8 20.8H24.8V17H34V20.2C34 25 30 29 25 29Z" fill="currentColor"/>
                            <circle cx="50" cy="19" r="7" stroke="currentColor" stroke-width="3" stroke-dasharray="28 8"/>
                            <circle cx="50" cy="19" r="3" fill="currentColor"/>
                            <path d="M72 11.5C69.5 10.5 66.5 11 65 12.5C63.5 14 64.5 16.5 66.5 17.5L69.5 19C72.5 20.5 73.5 23 72 25.5C70.5 28 66.5 28.5 64 27.5L65.2 23.5C67 24.2 68.8 24 69.5 23C70.2 22 69.8 20.8 68.2 20L65.2 18.5C62.2 17 61.2 14.5 62.7 12C64.2 9.5 68.2 9 70.8 10L72 11.5Z" fill="currentColor"/>
                            <circle cx="89" cy="19" r="7" stroke="currentColor" stroke-width="3"/>
                            <line x1="84" y1="19" x2="94" y2="19" stroke="currentColor" stroke-width="2"/>
                            <path d="M103 10H112C116 10 118 12 118 15C118 17.5 116.5 19 114 19.5L118.5 28H113.5L109.5 20H106.8V28H103V10ZM106.8 16.5H111.5C112.8 16.5 113.8 16 113.8 14.8C113.8 13.5 112.8 13 111.5 13H106.8V16.5Z" fill="currentColor"/>
                            <rect x="15" y="32" width="104" height="2" fill="url(#logo-gradient-footer)"/>
                            <defs>
                                <linearGradient id="logo-gradient-footer" x1="15" y1="32" x2="119" y2="32" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#22d3ee" stop-opacity="0.8"/>
                                    <stop offset="1" stop-color="#4f46e5" stop-opacity="0"/>
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>

                    <p class="text-sm text-slate-400 max-w-sm leading-relaxed">
                        {{ __('landing.footer.desc') }}
                    </p>

                    <!-- Subscribe Newsletter Field -->
                    <div class="space-y-3 pt-2">
                        <span class="block text-xs font-semibold text-slate-300 uppercase tracking-wider">{{ __('landing.footer.newsletter') }}</span>
                        <form onsubmit="event.preventDefault(); alert('Subscribed successfully! / تم الاشتراك بنجاح!');" class="flex gap-2 max-w-md">
                            <input type="email" required placeholder="{{ __('landing.footer.newsletter_placeholder') }}" class="w-full min-w-0 rounded-xl bg-slate-950/80 border border-slate-900 focus:border-cyan-500/80 focus:ring-1 focus:ring-cyan-500/40 px-4 py-2.5 text-sm text-slate-200 placeholder-slate-650 outline-none transition duration-150 font-sans">
                            <button type="submit" class="shrink-0 rounded-xl bg-indigo-600 hover:bg-indigo-500 hover:shadow-indigo-600/20 shadow-lg px-5 py-2.5 text-sm font-semibold text-white transition duration-150">
                                {{ __('landing.footer.subscribe') }}
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Column 2: Quick Links (Nav links) -->
                <div>
                    <h4 class="text-sm font-bold text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.links_title1') }}</h4>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#home" class="hover:text-cyan-400 transition">{{ __('landing.nav.home') }}</a></li>
                        <li><a href="#about" class="hover:text-cyan-400 transition">{{ __('landing.nav.about') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-400 transition">{{ __('landing.nav.services') }}</a></li>
                        <li><a href="#products" class="hover:text-cyan-400 transition">{{ __('landing.nav.products') }}</a></li>
                        <li><a href="#portfolio" class="hover:text-cyan-400 transition">{{ __('landing.nav.portfolio') }}</a></li>
                        <li><a href="#contact" class="hover:text-cyan-400 transition">{{ __('landing.nav.contact') }}</a></li>
                    </ul>
                </div>

                <!-- Column 3: Quick Links (Services links) -->
                <div>
                    <h4 class="text-sm font-bold text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.links_title2') }}</h4>
                    <ul class="space-y-4 text-sm">
                        <li><a href="#services" class="hover:text-cyan-400 transition">{{ __('landing.services.items.web.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-400 transition">{{ __('landing.services.items.mobile.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-400 transition">{{ __('landing.services.items.ecommerce.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-400 transition">{{ __('landing.services.items.education.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-400 transition">{{ __('landing.services.items.erp_crm.title') }}</a></li>
                        <li><a href="#services" class="hover:text-cyan-400 transition">{{ __('landing.services.items.ai.title') }}</a></li>
                    </ul>
                </div>

                <!-- Column 4: Contact Info -->
                <div>
                    <h4 class="text-sm font-bold text-slate-200 uppercase tracking-wider mb-6">{{ __('landing.footer.contact_title') }}</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-center gap-3">
                            <!-- Phone icon -->
                            <svg class="h-4.5 w-4.5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.387a20.373 20.373 0 0 1-9.351-9.351c-.155-.44.011-.928.387-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                            <span class="font-sans">01550099355</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <!-- Email icon -->
                            <svg class="h-4.5 w-4.5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <span class="font-sans">info@gosorsolutions.com</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <!-- Pin icon -->
                            <svg class="h-4.5 w-4.5 text-indigo-400" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                            <span>Cairo, Egypt</span>
                        </li>
                    </ul>
                </div>

            </div>

            <!-- Bottom Row: Copyright + socials -->
            <div class="flex flex-col sm:flex-row justify-between items-center gap-6 pt-8 text-xs sm:text-sm">
                <span>&copy; {{ date('Y') }} {{ __('landing.footer.rights') }}</span>
                
                <!-- Social media circular buttons -->
                <div class="flex items-center gap-3">
                    <!-- Facebook -->
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-950 border border-slate-900 hover:border-cyan-500/40 hover:text-cyan-400 flex items-center justify-center transition duration-150">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                    </a>
                    <!-- LinkedIn -->
                    <a href="#" class="w-9 h-9 rounded-full bg-slate-950 border border-slate-900 hover:border-cyan-500/40 hover:text-cyan-400 flex items-center justify-center transition duration-150">
                        <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                    </a>
                    <!-- Email -->
                    <a href="mailto:info@gosorsolutions.com" class="w-9 h-9 rounded-full bg-slate-950 border border-slate-900 hover:border-cyan-500/40 hover:text-cyan-400 flex items-center justify-center transition duration-150">
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                        </svg>
                    </a>
                </div>
            </div>
            
        </div>
    </footer>

    <!-- Interactive Scripts (Locale menu & Mobile menu togglers) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
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
            const iconHamburger = document.getElementById('menu-icon-hamburger');
            const iconClose = document.getElementById('menu-icon-close');

            if (mobileBtn && mobilePanel) {
                mobileBtn.addEventListener('click', function() {
                    const isHidden = mobilePanel.classList.toggle('hidden');
                    if (isHidden) {
                        iconHamburger.classList.remove('hidden');
                        iconClose.classList.add('hidden');
                    } else {
                        iconHamburger.classList.add('hidden');
                        iconClose.classList.remove('hidden');
                    }
                });
            }
        });
    </script>
</body>
</html>
