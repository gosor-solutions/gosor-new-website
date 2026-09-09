@extends('layouts.web.master')

@section('title', __('edu_bridge.meta.title'))
@section('meta_description', __('edu_bridge.meta.description'))
@section('meta_keywords', __('edu_bridge.meta.keywords'))

@section('content')
    <!-- Navigation Header -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-200/80 dark:border-[#18223c] bg-white/90 dark:bg-[#06080e]/90 backdrop-blur-md transition-all duration-200">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                
                <!-- Logo & Brand Badge -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="flex items-center gap-2 group" title="Gosor Solutions">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions Logo" class="h-32 sm:h-40 w-auto logo-themed"/>
                    </a>
                </div>

                <!-- Desktop Navigation Links -->
                <nav class="hidden lg:flex space-x-1 rtl:space-x-reverse items-center">
                    <a href="#student-app" class="px-3.5 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.student_app') }}</a>
                    <a href="#portals" class="px-3.5 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.portals') }}</a>
                    <a href="#features" class="px-3.5 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.features') }}</a>
                    <a href="#modules" class="px-3.5 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.modules') }}</a>
                    <a href="#pricing" class="px-3.5 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.pricing') }}</a>
                    <a href="#faq" class="px-3.5 py-2 text-sm font-medium text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.faq') }}</a>
                </nav>

                <!-- Actions: Theme Toggle, Language Switcher, CTA -->
                <div class="flex items-center gap-2 sm:gap-3">
                    <!-- Theme Toggle -->
                    <button id="theme-toggle-btn" class="p-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-[#0c101d] transition cursor-pointer" aria-label="Toggle Theme">
                        <x-heroicon-o-sun class="w-5 h-5 hidden dark:block text-amber-400"/>
                        <x-heroicon-o-moon class="w-5 h-5 block dark:hidden text-[#283891]"/>
                    </button>

                    <!-- Language Switcher -->
                    <div class="relative">
                        <button id="lang-dropdown-btn" class="flex items-center gap-1.5 px-3 py-2 rounded-xl border border-slate-200 dark:border-[#18223c] text-xs font-semibold text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0c101d] transition cursor-pointer">
                            <x-heroicon-o-globe-alt class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                            <span>{{ app()->getLocale() === 'ar' ? 'العربية' : 'English' }}</span>
                            <x-heroicon-o-chevron-down class="w-3.5 h-3.5 opacity-60"/>
                        </button>
                        <div id="lang-dropdown-menu" class="hidden absolute end-0 mt-2 w-32 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] py-1 z-50 text-xs font-medium">
                            <a href="{{ route('set-locale', 'ar') }}" class="flex items-center justify-between px-3 py-2 hover:bg-[#283891]/10 text-slate-700 dark:text-slate-200 {{ app()->getLocale() === 'ar' ? 'text-[#283891] dark:text-[#7d93ff] font-bold' : '' }}">
                                <span>العربية</span>
                                @if(app()->getLocale() === 'ar') <span class="w-1.5 h-1.5 rounded-full bg-[#283891]"></span> @endif
                            </a>
                            <a href="{{ route('set-locale', 'en') }}" class="flex items-center justify-between px-3 py-2 hover:bg-[#283891]/10 text-slate-700 dark:text-slate-200 {{ app()->getLocale() === 'en' ? 'text-[#283891] dark:text-[#7d93ff] font-bold' : '' }}">
                                <span>English</span>
                                @if(app()->getLocale() === 'en') <span class="w-1.5 h-1.5 rounded-full bg-[#283891]"></span> @endif
                            </a>
                        </div>
                    </div>

                    <!-- Book Demo Button -->
                    <a href="#demo-form" class="hidden sm:inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-bold text-white bg-[#283891] hover:bg-[#1d2b75] hover:-translate-y-0.5 active:scale-95 transition">
                        <span>{{ __('edu_bridge.nav.request_demo') }}</span>
                        <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180"/>
                    </a>

                    <!-- Mobile Menu Button -->
                    <button id="mobile-menu-btn" class="lg:hidden p-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] text-slate-600 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-[#0c101d] transition" aria-label="Toggle Mobile Menu">
                        <x-heroicon-o-bars-3 class="w-5 h-5"/>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Drawer Menu -->
        <div id="mobile-menu-panel" class="lg:hidden max-h-0 opacity-0 overflow-hidden transition-all duration-300 bg-white/95 dark:bg-[#06080e]/95 border-b border-slate-200 dark:border-[#18223c]">
            <div class="px-4 pt-2 pb-6 space-y-2">
                <a href="#student-app" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0c101d]">{{ __('edu_bridge.nav.student_app') }}</a>
                <a href="#portals" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0c101d]">{{ __('edu_bridge.nav.portals') }}</a>
                <a href="#features" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0c101d]">{{ __('edu_bridge.nav.features') }}</a>
                <a href="#modules" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0c101d]">{{ __('edu_bridge.nav.modules') }}</a>
                <a href="#pricing" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0c101d]">{{ __('edu_bridge.nav.pricing') }}</a>
                <a href="#faq" class="block px-3 py-2 rounded-lg text-sm font-medium text-slate-700 dark:text-slate-200 hover:bg-slate-100 dark:hover:bg-[#0c101d]">{{ __('edu_bridge.nav.faq') }}</a>
                <div class="pt-3">
                    <a href="#demo-form" class="w-full inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl text-sm font-bold text-white bg-[#283891] hover:bg-[#1d2b75] hover:-translate-y-0.5 active:scale-95 transition">
                        {{ __('edu_bridge.nav.request_demo') }}
                    </a>
                </div>
            </div>
        </div>
    </header>

    <main class="relative overflow-hidden">
        
        <!-- HERO SECTION (HUMAN & REALISTIC SAAS SPLIT LAYOUT) -->
        <section class="relative pt-12 pb-16 lg:pt-16 lg:pb-24 overflow-hidden border-b border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                    
                    <!-- Left Hero Text Column -->
                    <div class="lg:col-span-6 text-center lg:text-start space-y-6">
                        
                        <!-- Badge -->
                        <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40">
                            <span class="w-2 h-2 rounded-full bg-[#283891] animate-pulse"></span>
                            <span>{{ __('edu_bridge.hero.badge') }}</span>
                        </div>

                        <!-- Main Headline -->
                        <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight leading-[1.25]">
                            {{ __('edu_bridge.hero.title_start') }}
                            <span class="text-[#283891] dark:text-[#7d93ff] underline decoration-[#283891]/30 dark:decoration-[#283891]/60 underline-offset-8">
                                {{ __('edu_bridge.hero.title_highlight') }}
                            </span>
                            {{ __('edu_bridge.hero.title_end') }}
                        </h1>

                        <!-- Subtitle -->
                        <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 leading-relaxed max-w-xl mx-auto lg:mx-0">
                            {{ __('edu_bridge.hero.subtitle') }}
                        </p>

                        <!-- CTAs -->
                        <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3 pt-2">
                            <a href="#demo-form" class="w-full sm:w-auto px-7 py-3.5 text-sm font-bold text-white rounded-xl bg-[#283891] hover:bg-[#1d2b75] hover:-translate-y-0.5 active:scale-95 transition flex items-center justify-center gap-2">
                                <span>{{ __('edu_bridge.hero.cta_primary') }}</span>
                                <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180"/>
                            </a>
                            <a href="#student-app" class="w-full sm:w-auto px-7 py-3.5 text-sm font-bold text-slate-700 dark:text-slate-200 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:bg-slate-50 dark:hover:bg-[#18223c] hover:-translate-y-0.5 transition flex items-center justify-center gap-2">
                                <x-heroicon-o-device-phone-mobile class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                                <span>{{ __('edu_bridge.hero.cta_secondary') }}</span>
                            </a>
                        </div>

                        <!-- Trust Checklist -->
                        <div class="pt-4 border-t border-slate-200/80 dark:border-[#18223c]">
                            <div class="flex flex-wrap items-center justify-center lg:justify-start gap-4 text-xs font-medium text-slate-500 dark:text-slate-400">
                                <span class="flex items-center gap-1.5">
                                    <x-heroicon-s-check-circle class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                                    ربط أوتوماتيك مع Zoom
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <x-heroicon-s-check-circle class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                                    حماية الفيديوهات 100%
                                </span>
                                <span class="flex items-center gap-1.5">
                                    <x-heroicon-s-check-circle class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                                    تطبيق Android & iOS
                                </span>
                            </div>
                        </div>

                    </div>

                    <!-- Right Hero Dashboard Mockup Column -->
                    <div class="lg:col-span-6">
                        <div class="relative rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] overflow-hidden">
                            
                            <!-- Browser Top Bar -->
                            <div class="px-4 py-3 bg-slate-100 dark:bg-[#18223c]/60 border-b border-slate-200 dark:border-[#18223c] flex items-center justify-between">
                                <div class="flex items-center gap-1.5">
                                    <span class="w-3 h-3 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                    <span class="w-3 h-3 rounded-full bg-slate-300 dark:bg-slate-700"></span>
                                    <span class="w-3 h-3 rounded-full bg-[#283891]"></span>
                                </div>
                                <div class="px-3 py-0.5 rounded-md bg-white dark:bg-[#0c101d] text-[11px] font-mono text-slate-500 dark:text-slate-400 border border-slate-200 dark:border-[#18223c] flex items-center gap-1.5">
                                    <x-heroicon-o-lock-closed class="w-3 h-3 text-[#283891] dark:text-[#7d93ff]"/>
                                    <span>app.edubridge.io/dashboard</span>
                                </div>
                                <div class="w-12"></div>
                            </div>

                            <!-- Dashboard Body Content -->
                            <div class="p-5 sm:p-6 space-y-5 bg-slate-50/50 dark:bg-[#06080e]/40 text-xs">
                                
                                <!-- Academy Header Bar -->
                                <div class="flex items-center justify-between pb-3 border-b border-slate-200 dark:border-[#18223c]">
                                    <div class="flex items-center gap-2.5">
                                        <div class="w-8 h-8 rounded-lg bg-[#283891] text-white font-bold flex items-center justify-center text-xs">
                                            EB
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-900 dark:text-white text-sm">{{ __('edu_bridge.hero.preview.academy_name') }}</div>
                                            <div class="text-[10px] text-slate-500">{{ __('edu_bridge.hero.preview.term') }}</div>
                                        </div>
                                    </div>
                                    <span class="px-2.5 py-1 rounded-md bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] font-semibold text-[11px] flex items-center gap-1">
                                        <span class="w-1.5 h-1.5 rounded-full bg-[#283891]"></span>
                                        السيستم يعمل بنشاط
                                    </span>
                                </div>

                                <!-- 3 Stat Chips -->
                                <div class="grid grid-cols-3 gap-3">
                                    <div class="p-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c]">
                                        <div class="text-slate-500 dark:text-slate-400 text-[10px]">{{ __('edu_bridge.hero.preview.active_students') }}</div>
                                        <div class="text-base font-bold text-slate-900 dark:text-white mt-0.5">1,420</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c]">
                                        <div class="text-slate-500 dark:text-slate-400 text-[10px]">{{ __('edu_bridge.hero.preview.today_classes') }}</div>
                                        <div class="text-base font-bold text-[#283891] dark:text-[#7d93ff] mt-0.5">6 حصص</div>
                                    </div>
                                    <div class="p-3 rounded-xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c]">
                                        <div class="text-slate-500 dark:text-slate-400 text-[10px]">{{ __('edu_bridge.hero.preview.attendance_rate') }}</div>
                                        <div class="text-base font-bold text-[#283891] dark:text-[#7d93ff] mt-0.5">96.4%</div>
                                    </div>
                                </div>

                                <!-- Live Zoom Class Active Card -->
                                <div class="p-4 rounded-xl bg-white dark:bg-[#0c101d] border border-[#283891]/30 dark:border-[#283891]/40 space-y-2.5">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center gap-2">
                                            <span class="w-2 h-2 rounded-full bg-[#283891] animate-ping"></span>
                                            <span class="font-bold text-[#283891] dark:text-[#7d93ff] text-[11px]">{{ __('edu_bridge.hero.preview.live_now_badge') }}</span>
                                        </div>
                                        <span class="text-[10px] text-slate-400 font-mono">Zoom Cloud Sync</span>
                                    </div>
                                    <div class="font-bold text-slate-900 dark:text-white text-xs sm:text-sm">
                                        {{ __('edu_bridge.hero.preview.live_now_title') }}
                                    </div>
                                    <div class="flex items-center justify-between pt-1">
                                        <span class="text-slate-500 text-[11px] flex items-center gap-1">
                                            <x-heroicon-o-users class="w-3.5 h-3.5 text-[#283891] dark:text-[#7d93ff]"/>
                                            {{ __('edu_bridge.hero.preview.live_now_stats') }}
                                        </span>
                                        <button class="px-3 py-1 rounded-lg bg-[#283891] text-white font-bold text-[10px]">
                                            {{ __('edu_bridge.hero.preview.join_live') }}
                                        </button>
                                    </div>
                                </div>

                                <!-- Quick Actions Row -->
                                <div class="flex items-center justify-between gap-2 pt-1">
                                    <button class="flex-1 py-2 px-2.5 rounded-lg bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-slate-700 dark:text-slate-300 font-semibold text-[10px] text-center hover:border-[#283891] transition">
                                        {{ __('edu_bridge.hero.preview.quick_zoom') }}
                                    </button>
                                    <button class="flex-1 py-2 px-2.5 rounded-lg bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-slate-700 dark:text-slate-300 font-semibold text-[10px] text-center hover:border-[#283891] transition">
                                        {{ __('edu_bridge.hero.preview.quick_whatsapp') }}
                                    </button>
                                    <button class="flex-1 py-2 px-2.5 rounded-lg bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-slate-700 dark:text-slate-300 font-semibold text-[10px] text-center hover:border-[#283891] transition">
                                        {{ __('edu_bridge.hero.preview.quick_cert') }}
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>


        <!-- REALISTIC STUDENT MOBILE APP SECTION -->
        <section id="student-app" class="py-16 lg:py-24 bg-slate-50/70 dark:bg-[#06080e] relative border-b border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-heroicon-o-device-phone-mobile class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                        {{ __('edu_bridge.student_app.badge') }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('edu_bridge.student_app.title') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-base text-slate-600 dark:text-slate-400">
                        {{ __('edu_bridge.student_app.subtitle') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-center">
                    
                    <!-- Left Column: 3 Real App Features -->
                    <div class="lg:col-span-4 space-y-4">
                        
                        <div class="p-5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-0.5 transition duration-200">
                            <div class="w-9 h-9 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-3">
                                <x-heroicon-o-play-circle class="w-5 h-5"/>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">
                                {{ __('edu_bridge.student_app.features.video_streaming.title') }}
                            </h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('edu_bridge.student_app.features.video_streaming.desc') }}
                            </p>
                        </div>

                        <div class="p-5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-0.5 transition duration-200">
                            <div class="w-9 h-9 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-3">
                                <x-heroicon-o-video-camera class="w-5 h-5"/>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">
                                {{ __('edu_bridge.student_app.features.zoom_join.title') }}
                            </h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('edu_bridge.student_app.features.zoom_join.desc') }}
                            </p>
                        </div>

                        <div class="p-5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-0.5 transition duration-200">
                            <div class="w-9 h-9 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-3">
                                <x-heroicon-o-bell class="w-5 h-5"/>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">
                                {{ __('edu_bridge.student_app.features.instant_alerts.title') }}
                            </h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('edu_bridge.student_app.features.instant_alerts.desc') }}
                            </p>
                        </div>

                    </div>

                    <!-- Center Column: Realistic Smartphone UI Mockup -->
                    <div class="lg:col-span-4 flex justify-center">
                        <div class="relative w-[300px] sm:w-[320px] rounded-[44px] p-3 bg-[#0c101d] border-4 border-slate-300 dark:border-[#18223c]">
                            
                            <!-- Dynamic Island / Notch -->
                            <div class="absolute top-4 start-1/2 -translate-x-1/2 w-28 h-4 bg-[#06080e] rounded-full z-30 flex items-center justify-between px-3">
                                <div class="w-2 h-2 rounded-full bg-slate-800"></div>
                                <div class="w-2 h-2 rounded-full bg-slate-800/80"></div>
                            </div>

                            <!-- Screen Container -->
                            <div class="rounded-[36px] bg-[#06080e] text-white pt-8 pb-3 px-3.5 space-y-3 border border-slate-800 text-xs">
                                
                                <!-- Status bar -->
                                <div class="flex items-center justify-between text-[10px] text-slate-400 px-1">
                                    <span class="font-bold">9:41</span>
                                    <div class="flex items-center gap-1.5">
                                        <x-heroicon-s-wifi class="w-3 h-3"/>
                                        <span class="text-[9px]">5G</span>
                                        <div class="w-4 h-2 rounded-xs border border-slate-400 p-0.5 flex items-center">
                                            <div class="w-full h-full bg-[#283891] rounded-2xs"></div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Student App Header -->
                                <div class="flex items-center justify-between border-b border-slate-800 pb-2.5 pt-1">
                                    <div class="flex items-center gap-2">
                                        <div class="w-7 h-7 rounded-full bg-[#283891] flex items-center justify-center font-bold text-[10px]">
                                            ع
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-200 text-[11px]">{{ __('edu_bridge.student_app.mockup.greeting') }}</div>
                                            <div class="text-[9px] text-slate-400">{{ __('edu_bridge.student_app.mockup.subtitle') }}</div>
                                        </div>
                                    </div>
                                    <div class="relative p-1.5 rounded-lg bg-slate-800 text-slate-300">
                                        <x-heroicon-o-bell class="w-3.5 h-3.5"/>
                                        <span class="absolute top-1 end-1 w-1.5 h-1.5 bg-rose-500 rounded-full"></span>
                                    </div>
                                </div>

                                <!-- Live Zoom Class Card -->
                                <div class="p-3 rounded-xl bg-[#0c101d] border border-[#283891]/40 space-y-2">
                                    <div class="flex items-center justify-between text-[10px]">
                                        <span class="px-2 py-0.5 rounded-md bg-[#283891]/20 text-[#7d93ff] font-bold flex items-center gap-1">
                                            <span class="w-1.5 h-1.5 rounded-full bg-[#283891] animate-ping"></span>
                                            {{ __('edu_bridge.student_app.mockup.live_badge') }}
                                        </span>
                                        <span class="text-slate-400 text-[9px]">Zoom Live</span>
                                    </div>
                                    <div class="font-bold text-white text-[11px] line-clamp-1">
                                        {{ __('edu_bridge.student_app.mockup.live_title') }}
                                    </div>
                                    <button class="w-full py-1.5 rounded-lg text-[10px] font-bold bg-[#283891] text-white hover:bg-[#1d2b75] transition">
                                        {{ __('edu_bridge.student_app.mockup.join_btn') }}
                                    </button>
                                </div>

                                <!-- Recorded Video Card -->
                                <div class="p-2.5 rounded-xl bg-[#0c101d] border border-slate-800 space-y-1.5">
                                    <div class="flex items-center justify-between text-[10px] text-slate-300">
                                        <span class="font-semibold flex items-center gap-1 line-clamp-1">
                                            <x-heroicon-o-play-circle class="w-3.5 h-3.5 text-[#7d93ff] shrink-0"/>
                                            {{ __('edu_bridge.student_app.mockup.recorded_title') }}
                                        </span>
                                    </div>
                                    <!-- Progress bar -->
                                    <div class="w-full bg-slate-800 rounded-full h-1 overflow-hidden">
                                        <div class="bg-[#283891] h-full w-2/3 rounded-full"></div>
                                    </div>
                                    <div class="text-[8px] text-slate-400 text-end">
                                        {{ __('edu_bridge.student_app.mockup.recorded_time') }}
                                    </div>
                                </div>

                                <!-- Task Status Badge -->
                                <div class="p-2 rounded-xl bg-[#0c101d] border border-slate-800 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-5 h-5 rounded-md bg-[#283891]/20 text-[#7d93ff] flex items-center justify-center shrink-0">
                                            <x-heroicon-o-check class="w-3 h-3"/>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-200 text-[10px]">{{ __('edu_bridge.student_app.mockup.task_badge') }}</div>
                                            <div class="text-[#7d93ff] text-[9px]">{{ __('edu_bridge.student_app.mockup.task_grade') }}</div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Digital Certificate QR Widget -->
                                <div class="p-2 rounded-xl bg-[#0c101d] border border-slate-800 flex items-center justify-between">
                                    <div class="flex items-center gap-2">
                                        <div class="w-5 h-5 rounded-md bg-[#283891]/20 text-[#7d93ff] flex items-center justify-center shrink-0">
                                            <x-heroicon-o-qr-code class="w-3 h-3"/>
                                        </div>
                                        <div>
                                            <div class="font-bold text-slate-200 text-[10px]">{{ __('edu_bridge.student_app.mockup.cert_title') }}</div>
                                            <div class="text-slate-400 text-[8px]">{{ __('edu_bridge.student_app.mockup.cert_code') }}</div>
                                        </div>
                                    </div>
                                    <span class="text-[9px] px-2 py-0.5 rounded-md bg-[#283891] text-white font-bold">
                                        {{ __('edu_bridge.student_app.mockup.share_btn') }}
                                    </span>
                                </div>

                                <!-- Bottom Navigation Bar -->
                                <div class="pt-2 border-t border-slate-800 flex items-center justify-around text-[9px] text-slate-400">
                                    <div class="flex flex-col items-center text-[#7d93ff] font-bold">
                                        <x-heroicon-s-home class="w-3.5 h-3.5"/>
                                        <span>{{ __('edu_bridge.student_app.mockup.nav_home') }}</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <x-heroicon-o-book-open class="w-3.5 h-3.5"/>
                                        <span>{{ __('edu_bridge.student_app.mockup.nav_courses') }}</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <x-heroicon-o-clipboard-document-check class="w-3.5 h-3.5"/>
                                        <span>{{ __('edu_bridge.student_app.mockup.nav_tasks') }}</span>
                                    </div>
                                    <div class="flex flex-col items-center">
                                        <x-heroicon-o-user class="w-3.5 h-3.5"/>
                                        <span>{{ __('edu_bridge.student_app.mockup.nav_profile') }}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Right Column: 3 Additional App Features -->
                    <div class="lg:col-span-4 space-y-4">
                        
                        <div class="p-5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-0.5 transition duration-200">
                            <div class="w-9 h-9 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-3">
                                <x-heroicon-o-clipboard-document-check class="w-5 h-5"/>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">
                                {{ __('edu_bridge.student_app.features.task_submission.title') }}
                            </h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('edu_bridge.student_app.features.task_submission.desc') }}
                            </p>
                        </div>

                        <div class="p-5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-0.5 transition duration-200">
                            <div class="w-9 h-9 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-3">
                                <x-heroicon-o-qr-code class="w-5 h-5"/>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">
                                {{ __('edu_bridge.student_app.features.digital_wallet.title') }}
                            </h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('edu_bridge.student_app.features.digital_wallet.desc') }}
                            </p>
                        </div>

                        <div class="p-5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:border-[#283891]/50 hover:-translate-y-0.5 transition duration-200">
                            <div class="w-9 h-9 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-3">
                                <x-heroicon-o-credit-card class="w-5 h-5"/>
                            </div>
                            <h3 class="text-sm font-bold text-slate-900 dark:text-white mb-1">
                                {{ __('edu_bridge.student_app.features.mobile_payments.title') }}
                            </h3>
                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                {{ __('edu_bridge.student_app.features.mobile_payments.desc') }}
                            </p>
                        </div>

                    </div>

                </div>
            </div>
        </section>


        <!-- 4-PORTALS SECTION (CLEAN WORKSPACES) -->
        <section id="portals" class="py-16 lg:py-24 relative border-b border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-heroicon-o-squares-2x2 class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                        {{ __('edu_bridge.portals.badge') }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('edu_bridge.portals.title') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-base text-slate-600 dark:text-slate-400">
                        {{ __('edu_bridge.portals.subtitle') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    <!-- 1. Admin Portal -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-1 hover:border-[#283891]/50 transition-all duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-building-library class="w-5 h-5"/>
                        </div>
                        <span class="inline-block text-[10px] font-bold text-[#283891] dark:text-[#7d93ff] mb-1.5">
                            {{ __('edu_bridge.portals.items.admin.tag') }}
                        </span>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.portals.items.admin.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.portals.items.admin.desc') }}
                        </p>
                    </div>

                    <!-- 2. Instructor Portal -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-1 hover:border-[#283891]/50 transition-all duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-user-group class="w-5 h-5"/>
                        </div>
                        <span class="inline-block text-[10px] font-bold text-[#283891] dark:text-[#7d93ff] mb-1.5">
                            {{ __('edu_bridge.portals.items.instructor.tag') }}
                        </span>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.portals.items.instructor.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.portals.items.instructor.desc') }}
                        </p>
                    </div>

                    <!-- 3. Student Hub & App -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-1 hover:border-[#283891]/50 transition-all duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-academic-cap class="w-5 h-5"/>
                        </div>
                        <span class="inline-block text-[10px] font-bold text-[#283891] dark:text-[#7d93ff] mb-1.5">
                            {{ __('edu_bridge.portals.items.student.tag') }}
                        </span>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.portals.items.student.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.portals.items.student.desc') }}
                        </p>
                    </div>

                    <!-- 4. QA & Supervisor -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-1 hover:border-[#283891]/50 transition-all duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-shield-check class="w-5 h-5"/>
                        </div>
                        <span class="inline-block text-[10px] font-bold text-[#283891] dark:text-[#7d93ff] mb-1.5">
                            {{ __('edu_bridge.portals.items.qa.tag') }}
                        </span>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.portals.items.qa.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.portals.items.qa.desc') }}
                        </p>
                    </div>

                </div>
            </div>
        </section>


        <!-- CORE FEATURES (SIMPLE 6 GRID) -->
        <section id="features" class="py-16 lg:py-24 bg-slate-50/70 dark:bg-[#06080e] relative border-b border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-2xl mx-auto mb-14">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-heroicon-o-sparkles class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                        {{ __('edu_bridge.features.badge') }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('edu_bridge.features.title') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-base text-slate-600 dark:text-slate-400">
                        {{ __('edu_bridge.features.subtitle') }}
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    
                    <!-- Zoom -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-0.5 hover:border-[#283891]/50 transition duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-video-camera class="w-5 h-5"/>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.features.cards.zoom.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.features.cards.zoom.desc') }}
                        </p>
                    </div>

                    <!-- Bunny Video -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-0.5 hover:border-[#283891]/50 transition duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-film class="w-5 h-5"/>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.features.cards.bunny.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.features.cards.bunny.desc') }}
                        </p>
                    </div>

                    <!-- Digital Certificates QR -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-0.5 hover:border-[#283891]/50 transition duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-qr-code class="w-5 h-5"/>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.features.cards.certificates.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.features.cards.certificates.desc') }}
                        </p>
                    </div>

                    <!-- Campaigns -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-0.5 hover:border-[#283891]/50 transition duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-chat-bubble-left-right class="w-5 h-5"/>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.features.cards.campaigns.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.features.cards.campaigns.desc') }}
                        </p>
                    </div>

                    <!-- Financial & Payments -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-0.5 hover:border-[#283891]/50 transition duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-banknotes class="w-5 h-5"/>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.features.cards.financial.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.features.cards.financial.desc') }}
                        </p>
                    </div>

                    <!-- Tasks & Projects -->
                    <div class="p-6 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] hover:-translate-y-0.5 hover:border-[#283891]/50 transition duration-200">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center mb-4">
                            <x-heroicon-o-rectangle-stack class="w-5 h-5"/>
                        </div>
                        <h3 class="text-base font-bold text-slate-900 dark:text-white mb-2">
                            {{ __('edu_bridge.features.cards.tasks.title') }}
                        </h3>
                        <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                            {{ __('edu_bridge.features.cards.tasks.desc') }}
                        </p>
                    </div>

                </div>
            </div>
        </section>


        <!-- SYSTEM MODULES EXPLORER -->
        <section id="modules" class="py-16 lg:py-24 relative border-b border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-heroicon-o-cpu-chip class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                        {{ __('edu_bridge.modules_tab.badge') }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('edu_bridge.modules_tab.title') }}
                    </h2>
                </div>

                <!-- Tabs Navigation -->
                <div class="flex flex-wrap items-center justify-center gap-2 mb-8">
                    <button class="module-tab-btn active px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition cursor-pointer" data-tab="academic">
                        {{ __('edu_bridge.modules_tab.tabs.academic') }}
                    </button>
                    <button class="module-tab-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition cursor-pointer" data-tab="lms_video">
                        {{ __('edu_bridge.modules_tab.tabs.lms_video') }}
                    </button>
                    <button class="module-tab-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition cursor-pointer" data-tab="marketing">
                        {{ __('edu_bridge.modules_tab.tabs.marketing') }}
                    </button>
                    <button class="module-tab-btn px-4 py-2.5 rounded-xl text-xs sm:text-sm font-semibold transition cursor-pointer" data-tab="support">
                        {{ __('edu_bridge.modules_tab.tabs.support') }}
                    </button>
                </div>

                <!-- Tab Panes Card -->
                <div class="rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-6 sm:p-10">
                    
                    <!-- 1. Academic Tab -->
                    <div id="tab-academic" class="module-tab-pane">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                            <div class="lg:col-span-8 space-y-4">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                                    {{ __('edu_bridge.modules_tab.details.academic.heading') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('edu_bridge.modules_tab.details.academic.desc') }}
                                </p>
                                <ul class="space-y-2.5 pt-2">
                                    @foreach(__('edu_bridge.modules_tab.details.academic.points') as $point)
                                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                                            <div class="w-5 h-5 rounded-md bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                                <x-heroicon-o-check class="w-3.5 h-3.5"/>
                                            </div>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="lg:col-span-4 p-5 rounded-xl bg-slate-50 dark:bg-[#18223c]/40 border border-slate-200 dark:border-[#18223c] text-center">
                                <x-heroicon-o-calendar-days class="w-10 h-10 text-[#283891] dark:text-[#7d93ff] mx-auto mb-2"/>
                                <div class="text-sm font-bold text-slate-900 dark:text-white">إدارة المجموعات والراوندات</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400 mt-1">تحديد المواعيد، توزيع المحاضرين، ومتابعة الطلاب بسهولة.</div>
                            </div>
                        </div>
                    </div>

                    <!-- 2. LMS & Video Tab -->
                    <div id="tab-lms_video" class="module-tab-pane hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                            <div class="lg:col-span-8 space-y-4">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                                    {{ __('edu_bridge.modules_tab.details.lms_video.heading') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('edu_bridge.modules_tab.details.lms_video.desc') }}
                                </p>
                                <ul class="space-y-2.5 pt-2">
                                    @foreach(__('edu_bridge.modules_tab.details.lms_video.points') as $point)
                                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                                            <div class="w-5 h-5 rounded-md bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                                <x-heroicon-o-check class="w-3.5 h-3.5"/>
                                            </div>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="lg:col-span-4 p-5 rounded-xl bg-slate-50 dark:bg-[#18223c]/40 border border-slate-200 dark:border-[#18223c] text-center">
                                <x-heroicon-o-lock-closed class="w-10 h-10 text-[#283891] dark:text-[#7d93ff] mx-auto mb-2"/>
                                <div class="text-sm font-bold text-slate-900 dark:text-white">حماية وتشفير الفيديوهات</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400 mt-1">بث مشفر بدون تقطيع مع علامة مائية باسم الطالب.</div>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Marketing & WhatsApp Tab -->
                    <div id="tab-marketing" class="module-tab-pane hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                            <div class="lg:col-span-8 space-y-4">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                                    {{ __('edu_bridge.modules_tab.details.marketing.heading') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('edu_bridge.modules_tab.details.marketing.desc') }}
                                </p>
                                <ul class="space-y-2.5 pt-2">
                                    @foreach(__('edu_bridge.modules_tab.details.marketing.points') as $point)
                                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                                            <div class="w-5 h-5 rounded-md bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                                <x-heroicon-o-check class="w-3.5 h-3.5"/>
                                            </div>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="lg:col-span-4 p-5 rounded-xl bg-slate-50 dark:bg-[#18223c]/40 border border-slate-200 dark:border-[#18223c] text-center">
                                <x-heroicon-o-chat-bubble-bottom-center-text class="w-10 h-10 text-[#283891] dark:text-[#7d93ff] mx-auto mb-2"/>
                                <div class="text-sm font-bold text-slate-900 dark:text-white">رسائل واتساب وتنبيهات</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400 mt-1">تذكير بمواعيد الحصص والأقساط آلياً.</div>
                            </div>
                        </div>
                    </div>

                    <!-- 4. Support & QA Tab -->
                    <div id="tab-support" class="module-tab-pane hidden">
                        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                            <div class="lg:col-span-8 space-y-4">
                                <h3 class="text-xl font-bold text-slate-900 dark:text-white">
                                    {{ __('edu_bridge.modules_tab.details.support.heading') }}
                                </h3>
                                <p class="text-sm text-slate-600 dark:text-slate-400 leading-relaxed">
                                    {{ __('edu_bridge.modules_tab.details.support.desc') }}
                                </p>
                                <ul class="space-y-2.5 pt-2">
                                    @foreach(__('edu_bridge.modules_tab.details.support.points') as $point)
                                        <li class="flex items-center gap-2.5 text-xs sm:text-sm text-slate-700 dark:text-slate-300">
                                            <div class="w-5 h-5 rounded-md bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                                                <x-heroicon-o-check class="w-3.5 h-3.5"/>
                                            </div>
                                            <span>{{ $point }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="lg:col-span-4 p-5 rounded-xl bg-slate-50 dark:bg-[#18223c]/40 border border-slate-200 dark:border-[#18223c] text-center">
                                <x-heroicon-o-chart-bar-square class="w-10 h-10 text-[#283891] dark:text-[#7d93ff] mx-auto mb-2"/>
                                <div class="text-sm font-bold text-slate-900 dark:text-white">تذاكر الدعم وتقييمات الجودة</div>
                                <div class="text-xs text-slate-500 dark:text-slate-400 mt-1">حل مشاكل الطلاب واستبيانات تقييم المدرسين.</div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- PRICING PLANS (CLEAN SAAS PRICING TABLE) -->
        <section id="pricing" class="py-16 lg:py-24 bg-slate-50/70 dark:bg-[#06080e] relative border-b border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-2xl mx-auto mb-10">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-heroicon-o-tag class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                        {{ __('edu_bridge.pricing.badge') }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('edu_bridge.pricing.title') }}
                    </h2>
                    <p class="mt-2 text-sm sm:text-base text-slate-600 dark:text-slate-400">
                        {{ __('edu_bridge.pricing.subtitle') }}
                    </p>

                    <!-- Billing Toggle -->
                    <div class="mt-6 inline-flex items-center p-1.5 rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c]">
                        <button id="billing-monthly-btn" class="billing-toggle-btn active px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer">
                            {{ __('edu_bridge.pricing.billing.monthly') }}
                        </button>
                        <button id="billing-yearly-btn" class="billing-toggle-btn px-4 py-2 rounded-xl text-xs font-bold transition cursor-pointer flex items-center gap-1.5">
                            <span>{{ __('edu_bridge.pricing.billing.yearly') }}</span>
                            <span class="px-1.5 py-0.5 rounded-full bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] text-[10px] font-bold">20%</span>
                        </button>
                    </div>
                </div>

                <!-- Plans Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-stretch">
                    
                    <!-- 1. Starter Plan -->
                    <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-8 flex flex-col justify-between hover:border-slate-300 dark:hover:border-slate-700 hover:-translate-y-1 transition-all duration-200">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                                {{ __('edu_bridge.pricing.plans.starter.name') }}
                            </h3>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400 min-h-[32px]">
                                {{ __('edu_bridge.pricing.plans.starter.desc') }}
                            </p>

                            <!-- Price Monthly -->
                            <div class="price-box-monthly mt-5 flex items-baseline gap-1">
                                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ __('edu_bridge.pricing.plans.starter.monthly_price') }}</span>
                                <span class="text-xs text-slate-500 font-semibold">{{ __('edu_bridge.pricing.plans.starter.currency') }} {{ __('edu_bridge.pricing.plans.starter.period') }}</span>
                            </div>
                            <!-- Price Yearly -->
                            <div class="price-box-yearly hidden mt-5 flex items-baseline gap-1">
                                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ __('edu_bridge.pricing.plans.starter.yearly_price') }}</span>
                                <span class="text-xs text-slate-500 font-semibold">{{ __('edu_bridge.pricing.plans.starter.currency') }} / سنوياً</span>
                            </div>

                            <div class="mt-3 px-3 py-1.5 rounded-lg bg-slate-50 dark:bg-slate-800/50 text-[11px] font-semibold text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-[#18223c] inline-block">
                                {{ __('edu_bridge.pricing.plans.starter.students_limit') }}
                            </div>

                            <ul class="mt-6 space-y-3 border-t border-slate-100 dark:border-[#18223c] pt-6">
                                @foreach(__('edu_bridge.pricing.plans.starter.features') as $feature)
                                    <li class="flex items-start gap-2.5 text-xs text-slate-700 dark:text-slate-300">
                                        <x-heroicon-s-check class="w-4 h-4 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pt-8">
                            <a href="#demo-form" data-plan="starter" class="plan-cta-btn block w-full py-3 rounded-xl text-center text-xs font-bold text-slate-800 dark:text-slate-200 bg-slate-100 dark:bg-slate-800 hover:bg-[#283891] hover:text-white hover:-translate-y-0.5 active:scale-95 transition">
                                {{ __('edu_bridge.pricing.plans.starter.cta') }}
                            </a>
                        </div>
                    </div>

                    <!-- 2. Professional Plan (Highlighted) -->
                    <div class="relative rounded-3xl bg-white dark:bg-[#0c101d] border-2 border-[#283891] p-8 flex flex-col justify-between hover:-translate-y-1 transition-all duration-200">
                        <!-- Top Tag -->
                        <div class="absolute -top-3.5 start-1/2 -translate-x-1/2 px-3 py-1 rounded-full bg-[#283891] text-white text-[10px] font-bold">
                            {{ __('edu_bridge.pricing.plans.professional.badge') }}
                        </div>

                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                                {{ __('edu_bridge.pricing.plans.professional.name') }}
                            </h3>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400 min-h-[32px]">
                                {{ __('edu_bridge.pricing.plans.professional.desc') }}
                            </p>

                            <!-- Price Monthly -->
                            <div class="price-box-monthly mt-5 flex items-baseline gap-1">
                                <span class="text-3xl font-extrabold text-[#283891] dark:text-[#7d93ff]">{{ __('edu_bridge.pricing.plans.professional.monthly_price') }}</span>
                                <span class="text-xs text-slate-500 font-semibold">{{ __('edu_bridge.pricing.plans.professional.currency') }} {{ __('edu_bridge.pricing.plans.professional.period') }}</span>
                            </div>
                            <!-- Price Yearly -->
                            <div class="price-box-yearly hidden mt-5 flex items-baseline gap-1">
                                <span class="text-3xl font-extrabold text-[#283891] dark:text-[#7d93ff]">{{ __('edu_bridge.pricing.plans.professional.yearly_price') }}</span>
                                <span class="text-xs text-slate-500 font-semibold">{{ __('edu_bridge.pricing.plans.professional.currency') }} / سنوياً</span>
                            </div>

                            <div class="mt-3 px-3 py-1.5 rounded-lg bg-[#283891]/10 text-[11px] font-semibold text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 inline-block">
                                {{ __('edu_bridge.pricing.plans.professional.students_limit') }}
                            </div>

                            <ul class="mt-6 space-y-3 border-t border-slate-100 dark:border-[#18223c] pt-6">
                                @foreach(__('edu_bridge.pricing.plans.professional.features') as $feature)
                                    <li class="flex items-start gap-2.5 text-xs text-slate-700 dark:text-slate-300">
                                        <x-heroicon-s-check class="w-4 h-4 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                                        <span class="font-medium">{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pt-8">
                            <a href="#demo-form" data-plan="professional" class="plan-cta-btn block w-full py-3 rounded-xl text-center text-xs font-bold text-white bg-[#283891] hover:bg-[#1d2b75] hover:-translate-y-0.5 active:scale-95 transition">
                                {{ __('edu_bridge.pricing.plans.professional.cta') }}
                            </a>
                        </div>
                    </div>

                    <!-- 3. Enterprise Plan -->
                    <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] p-8 flex flex-col justify-between hover:border-slate-300 dark:hover:border-slate-700 hover:-translate-y-1 transition-all duration-200">
                        <div>
                            <h3 class="text-lg font-bold text-slate-900 dark:text-white">
                                {{ __('edu_bridge.pricing.plans.enterprise.name') }}
                            </h3>
                            <p class="mt-1 text-xs text-slate-500 dark:text-slate-400 min-h-[32px]">
                                {{ __('edu_bridge.pricing.plans.enterprise.desc') }}
                            </p>

                            <!-- Price Monthly -->
                            <div class="price-box-monthly mt-5 flex items-baseline gap-1">
                                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ __('edu_bridge.pricing.plans.enterprise.monthly_price') }}</span>
                                <span class="text-xs text-slate-500 font-semibold">{{ __('edu_bridge.pricing.plans.enterprise.currency') }} {{ __('edu_bridge.pricing.plans.enterprise.period') }}</span>
                            </div>
                            <!-- Price Yearly -->
                            <div class="price-box-yearly hidden mt-5 flex items-baseline gap-1">
                                <span class="text-3xl font-extrabold text-slate-900 dark:text-white">{{ __('edu_bridge.pricing.plans.enterprise.yearly_price') }}</span>
                                <span class="text-xs text-slate-500 font-semibold">{{ __('edu_bridge.pricing.plans.enterprise.currency') }} / سنوياً</span>
                            </div>

                            <div class="mt-3 px-3 py-1.5 rounded-lg bg-slate-50 dark:bg-slate-800/50 text-[11px] font-semibold text-slate-700 dark:text-slate-300 border border-slate-200 dark:border-[#18223c] inline-block">
                                {{ __('edu_bridge.pricing.plans.enterprise.students_limit') }}
                            </div>

                            <ul class="mt-6 space-y-3 border-t border-slate-100 dark:border-[#18223c] pt-6">
                                @foreach(__('edu_bridge.pricing.plans.enterprise.features') as $feature)
                                    <li class="flex items-start gap-2.5 text-xs text-slate-700 dark:text-slate-300">
                                        <x-heroicon-s-check class="w-4 h-4 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="pt-8">
                            <a href="#demo-form" data-plan="enterprise" class="plan-cta-btn block w-full py-3 rounded-xl text-center text-xs font-bold text-slate-800 dark:text-slate-200 bg-slate-100 dark:bg-slate-800 hover:bg-[#283891] hover:text-white hover:-translate-y-0.5 active:scale-95 transition">
                                {{ __('edu_bridge.pricing.plans.enterprise.cta') }}
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        <!-- FAQ ACCORDION SECTION -->
        <section id="faq" class="py-16 lg:py-24 relative border-b border-slate-200/80 dark:border-[#18223c]">
            <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="text-center max-w-2xl mx-auto mb-12">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-3">
                        <x-heroicon-o-question-mark-circle class="w-4 h-4 text-[#283891] dark:text-[#7d93ff]"/>
                        {{ __('edu_bridge.faq.badge') }}
                    </span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-slate-900 dark:text-white tracking-tight">
                        {{ __('edu_bridge.faq.title') }}
                    </h2>
                </div>

                <div class="space-y-4">
                    @foreach(__('edu_bridge.faq.items') as $index => $item)
                        <div class="faq-item rounded-2xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] overflow-hidden">
                            <button class="faq-toggler w-full px-6 py-4.5 flex items-center justify-between text-start cursor-pointer transition">
                                <span class="text-sm sm:text-base font-bold text-slate-900 dark:text-white">
                                    {{ $item['q'] }}
                                </span>
                                <x-heroicon-o-chevron-down class="faq-icon w-4 h-4 text-slate-400 shrink-0 transition-transform duration-200"/>
                            </button>
                            <div class="faq-answer {{ $index === 0 ? '' : 'hidden' }} px-6 pb-5 text-xs sm:text-sm text-slate-600 dark:text-slate-400 leading-relaxed border-t border-slate-100 dark:border-[#18223c]/60 pt-3">
                                {{ $item['a'] }}
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </section>


        <!-- FREE DEMO BOOKING FORM SECTION -->
        <section id="demo-form" class="py-16 lg:py-24 bg-slate-50/70 dark:bg-[#06080e] relative">
            <div class="mx-auto max-w-5xl px-4 sm:px-6 lg:px-8 relative z-10">
                
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-12">
                        
                        <!-- Left Info Column (Gosor Brand Theme) -->
                        <div class="lg:col-span-5 p-8 sm:p-10 bg-[#06080e] text-white flex flex-col justify-between relative overflow-hidden border-b lg:border-b-0 lg:border-e border-[#18223c]">
                            
                            <div class="space-y-6 relative z-10">
                                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-[#283891]/20 text-[#7d93ff] text-xs font-bold border border-[#283891]/40">
                                    <span class="w-1.5 h-1.5 rounded-full bg-[#283891]"></span>
                                    {{ __('edu_bridge.demo.badge') }}
                                </span>
                                <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight leading-tight text-white">
                                    {{ __('edu_bridge.demo.title') }}
                                </h2>
                                <p class="text-xs sm:text-sm text-slate-300 leading-relaxed">
                                    {{ __('edu_bridge.demo.subtitle') }}
                                </p>

                                <div class="space-y-3.5 pt-4">
                                    <div class="flex items-center gap-3 text-xs text-slate-200">
                                        <div class="w-6 h-6 rounded-lg bg-[#283891]/20 text-[#7d93ff] flex items-center justify-center shrink-0 border border-[#283891]/30">
                                            <x-heroicon-s-check class="w-4 h-4"/>
                                        </div>
                                        <span>{{ __('edu_bridge.demo.benefits.free_consultation') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-xs text-slate-200">
                                        <div class="w-6 h-6 rounded-lg bg-[#283891]/20 text-[#7d93ff] flex items-center justify-center shrink-0 border border-[#283891]/30">
                                            <x-heroicon-s-check class="w-4 h-4"/>
                                        </div>
                                        <span>{{ __('edu_bridge.demo.benefits.quick_setup') }}</span>
                                    </div>
                                    <div class="flex items-center gap-3 text-xs text-slate-200">
                                        <div class="w-6 h-6 rounded-lg bg-[#283891]/20 text-[#7d93ff] flex items-center justify-center shrink-0 border border-[#283891]/30">
                                            <x-heroicon-s-check class="w-4 h-4"/>
                                        </div>
                                        <span>{{ __('edu_bridge.demo.benefits.support') }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-8 text-[11px] text-slate-400 relative z-10 flex items-center gap-2">
                                <x-heroicon-o-shield-check class="w-4 h-4 text-[#7d93ff] shrink-0"/>
                                <span>{{ __('edu_bridge.demo.form.privacy_notice') }}</span>
                            </div>
                        </div>

                        <!-- Right Form Column -->
                        <div class="lg:col-span-7 p-8 sm:p-10">
                            
                            <form id="edu-demo-form" action="{{ route('edu-bridge.demo') }}" method="POST" class="space-y-4">
                                @csrf
                                
                                <!-- Spam protection honeypots -->
                                <div style="display:none !important;" aria-hidden="true">
                                    <input type="text" name="_hp_company_website" value="" tabindex="-1" autocomplete="off"/>
                                    <input type="hidden" name="_form_time" value="{{ encrypt(time()) }}"/>
                                </div>

                                <!-- Name -->
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5" for="name">
                                        {{ __('edu_bridge.demo.form.name') }} <span class="text-rose-500">*</span>
                                    </label>
                                    <input type="text" id="name" name="name" required placeholder="{{ __('edu_bridge.demo.form.name_placeholder') }}"
                                           class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-slate-50 dark:bg-[#06080e] text-slate-900 dark:text-white text-xs focus:ring-2 focus:ring-[#283891] focus:border-[#283891] outline-none transition"/>
                                </div>

                                <!-- Email & Phone 2-col -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5" for="email">
                                            {{ __('edu_bridge.demo.form.email') }} <span class="text-rose-500">*</span>
                                        </label>
                                        <input type="email" id="email" name="email" required placeholder="{{ __('edu_bridge.demo.form.email_placeholder') }}"
                                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-slate-50 dark:bg-[#06080e] text-slate-900 dark:text-white text-xs focus:ring-2 focus:ring-[#283891] focus:border-[#283891] outline-none transition"/>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5" for="phone">
                                            {{ __('edu_bridge.demo.form.phone') }} <span class="text-rose-500">*</span>
                                        </label>
                                        <input type="text" id="phone" name="phone" required placeholder="{{ __('edu_bridge.demo.form.phone_placeholder') }}"
                                               class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-slate-50 dark:bg-[#06080e] text-slate-900 dark:text-white text-xs focus:ring-2 focus:ring-[#283891] focus:border-[#283891] outline-none transition"/>
                                    </div>
                                </div>

                                <!-- Institution Type & Headcount 2-col -->
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5" for="institution_type">
                                            {{ __('edu_bridge.demo.form.institution_type') }}
                                        </label>
                                        <select id="institution_type" name="institution_type"
                                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-slate-50 dark:bg-[#06080e] text-slate-900 dark:text-white text-xs focus:ring-2 focus:ring-[#283891] focus:border-[#283891] outline-none transition">
                                            <option value="" disabled selected>{{ __('edu_bridge.demo.form.institution_placeholder') }}</option>
                                            @foreach(__('edu_bridge.demo.form.institution_options') as $key => $label)
                                                <option value="{{ $key }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5" for="students_count">
                                            {{ __('edu_bridge.demo.form.students_count') }}
                                        </label>
                                        <select id="students_count" name="students_count"
                                                class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-slate-50 dark:bg-[#06080e] text-slate-900 dark:text-white text-xs focus:ring-2 focus:ring-[#283891] focus:border-[#283891] outline-none transition">
                                            <option value="" disabled selected>{{ __('edu_bridge.demo.form.students_placeholder') }}</option>
                                            @foreach(__('edu_bridge.demo.form.students_options') as $key => $label)
                                                <option value="{{ $key }}">{{ $label }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <!-- Message -->
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 dark:text-slate-300 mb-1.5" for="message">
                                        {{ __('edu_bridge.demo.form.message') }}
                                    </label>
                                    <textarea id="message" name="message" rows="3" placeholder="{{ __('edu_bridge.demo.form.message_placeholder') }}"
                                              class="w-full px-3.5 py-2.5 rounded-xl border border-slate-200 dark:border-[#18223c] bg-slate-50 dark:bg-[#06080e] text-slate-900 dark:text-white text-xs focus:ring-2 focus:ring-[#283891] focus:border-[#283891] outline-none transition"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <div class="pt-2">
                                    <button type="submit" id="submit-demo-btn"
                                            class="w-full py-3.5 px-6 rounded-xl text-xs font-bold text-white bg-[#283891] hover:bg-[#1d2b75] hover:-translate-y-0.5 active:scale-95 transition flex items-center justify-center gap-2 cursor-pointer">
                                        <span>{{ __('edu_bridge.demo.form.submit') }}</span>
                                        <x-feathericon-arrow-right class="w-4 h-4 rtl:rotate-180"/>
                                    </button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="border-t border-slate-200 dark:border-[#18223c] bg-white dark:bg-[#06080e] py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row items-center justify-between gap-6">
                
                <!-- Logo & Brand Info -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="group">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions Logo" class="h-28 sm:h-36 w-auto logo-themed"/>
                    </a>
                </div>

                <!-- Footer Nav Links -->
                <div class="flex flex-wrap items-center justify-center gap-6 text-xs font-medium text-slate-600 dark:text-slate-400">
                    <a href="#student-app" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.student_app') }}</a>
                    <a href="#portals" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.portals') }}</a>
                    <a href="#features" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.features') }}</a>
                    <a href="#modules" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.modules') }}</a>
                    <a href="#pricing" class="hover:text-[#283891] dark:hover:text-[#7d93ff] transition">{{ __('edu_bridge.nav.pricing') }}</a>
                </div>

                <!-- Copyright & Policy -->
                <div class="flex items-center gap-2.5 text-xs text-slate-400">
                    <span>{{ __('edu_bridge.footer.copyright', ['year' => date('Y')]) }}</span>
                    <span>•</span>
                    <a href="{{ route('privacy-policy') }}" class="hover:text-[#283891] dark:hover:text-[#7d93ff] underline-offset-4 hover:underline transition">
                        {{ __('landing.footer.privacy_policy') }}
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    @if(isset($settings['whatsapp']) && $settings['whatsapp'])
    <a aria-label="whatsapp" href="https://wa.me/{{ preg_replace('/\D/', '', $settings['whatsapp']) }}" target="_blank" 
       class="fixed bottom-6 end-6 z-50 flex h-12 w-12 items-center justify-center rounded-full text-white transition hover:scale-110 active:scale-95"
       style="background-color: #25D366;">
        <x-fab-whatsapp class="w-6 h-6"/>
    </a>
    @endif

    <style>
        .module-tab-btn {
            background-color: transparent;
            color: #64748b;
            border: 1px solid #e2e8f0;
        }
        .dark .module-tab-btn {
            border-color: #18223c;
            color: #94a3b8;
        }
        .module-tab-btn:hover {
            color: #283891;
            border-color: #cbd5e1;
        }
        .dark .module-tab-btn:hover {
            color: #7d93ff;
            border-color: #18223c;
        }
        .module-tab-btn.active, .dark .module-tab-btn.active {
            background-color: #283891;
            color: #ffffff !important;
            border-color: #283891;
        }
        .billing-toggle-btn {
            background-color: transparent;
            color: #64748b;
        }
        .billing-toggle-btn.active, .dark .billing-toggle-btn.active {
            background-color: #283891;
            color: #ffffff;
        }
        .dark .billing-toggle-btn {
            color: #94a3b8;
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
            const studentsSelect = document.getElementById('students_count');

            planCtaButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const plan = this.getAttribute('data-plan');
                    if (studentsSelect && plan) {
                        studentsSelect.value = plan;
                    }
                });
            });

            // Module Tabs Logic
            const tabButtons = document.querySelectorAll('.module-tab-btn');
            const tabPanes = document.querySelectorAll('.module-tab-pane');

            tabButtons.forEach(btn => {
                btn.addEventListener('click', function() {
                    const targetTab = this.getAttribute('data-tab');

                    tabButtons.forEach(b => b.classList.remove('active'));
                    this.classList.add('active');

                    tabPanes.forEach(pane => {
                        if (pane.id === 'tab-' + targetTab) {
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
            const demoForm = document.getElementById('edu-demo-form');
            if (demoForm) {
                demoForm.addEventListener('submit', async function(e) {
                    e.preventDefault();

                    const submitBtn = document.getElementById('submit-demo-btn');
                    const originalBtnContent = submitBtn.innerHTML;

                    submitBtn.disabled = true;
                    submitBtn.innerHTML = `
                        <svg class="animate-spin -ml-1 mr-3 h-4 w-4 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h3zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        {{ __('edu_bridge.demo.form.sending') }}
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
