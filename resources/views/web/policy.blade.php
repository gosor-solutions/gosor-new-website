@extends('layouts.web.master')

@section('title', __('policy.meta.title'))
@section('description', __('policy.meta.description'))

@section('content')
    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-200/80 dark:border-slate-800/80 bg-white/85 dark:bg-[#070b13]/85 backdrop-blur-xl transition-all duration-300 shadow-xs">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                
                <!-- Logo & Brand Badge -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="flex items-center gap-2 group" title="Gosor Solutions">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions Logo" class="h-10 w-auto logo-themed"/>
                    </a>
                    <div class="h-6 w-px bg-slate-300 dark:bg-slate-700 hidden sm:block"></div>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border border-cyan-500/20">
                        <x-lucide-shield-check class="w-3.5 h-3.5"/>
                        Policy & Security
                    </span>
                </div>

                <!-- Action links -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-cyan-600 dark:hover:text-cyan-400 transition rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800">
                        <x-feathericon-arrow-left class="w-4 h-4 rtl:rotate-180"/>
                        <span>{{ __('policy.nav.back_home') }}</span>
                    </a>

                    <a href="{{ route('gosor-hr') }}" class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-emerald-600 dark:text-emerald-400 hover:text-emerald-500 transition rounded-xl bg-emerald-500/10 border border-emerald-500/20">
                        <span>{{ __('policy.nav.gosor_hr') }}</span>
                    </a>

                    <!-- Theme Toggle -->
                    <button type="button" id="theme-toggle-btn" aria-label="Toggle theme" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 text-slate-600 dark:text-slate-300 hover:text-cyan-500 dark:hover:text-cyan-400 transition shadow-xs cursor-pointer">
                        <svg class="w-5 h-5 hidden dark:block text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden text-indigo-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Language Selector -->
                    <div class="flex items-center gap-1 bg-slate-100 dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-xl p-1 text-xs font-semibold">
                        <a href="{{ route('set-locale', 'ar') }}" class="px-2.5 py-1.5 rounded-lg transition {{ app()->getLocale() === 'ar' ? 'bg-cyan-600 text-white shadow-xs' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }}">AR</a>
                        <a href="{{ route('set-locale', 'en') }}" class="px-2.5 py-1.5 rounded-lg transition {{ app()->getLocale() === 'en' ? 'bg-cyan-600 text-white shadow-xs' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }}">EN</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <main class="py-16 md:py-24 relative z-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Policy Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 border border-cyan-500/20 mb-4">
                    <x-lucide-lock class="w-3.5 h-3.5"/>
                    {{ __('policy.header.badge') }}
                </span>
                <h1 class="text-3xl sm:text-5xl font-extrabold text-slate-900 dark:text-white tracking-tight mb-6">
                    {{ __('policy.header.title') }}
                </h1>
                <p class="text-base sm:text-lg text-slate-600 dark:text-slate-300 leading-relaxed max-w-2xl mx-auto mb-4">
                    {{ __('policy.header.subtitle') }}
                </p>
                <div class="text-xs text-slate-400 font-medium">
                    {{ __('policy.header.last_updated') }}
                </div>
            </div>

            <!-- Policy Sections Accordion/Cards -->
            <div class="space-y-8">
                
                <!-- 1. Overview -->
                <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center shrink-0">
                            <x-lucide-info class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.overview.title') }}
                        </h2>
                    </div>
                    <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                        {{ __('policy.sections.overview.content') }}
                    </p>
                </div>

                <!-- 2. Data Collection -->
                <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-indigo-500/10 text-indigo-600 dark:text-indigo-400 flex items-center justify-center shrink-0">
                            <x-lucide-database class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.data_collection.title') }}
                        </h2>
                    </div>
                    <p class="text-sm text-slate-600 dark:text-slate-300 mb-4">
                        {{ __('policy.sections.data_collection.intro') }}
                    </p>
                    <ul class="space-y-3 mb-6">
                        @foreach(__('policy.sections.data_collection.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-check-circle-2 class="w-5 h-5 text-indigo-500 shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="p-4 rounded-2xl bg-indigo-50/50 dark:bg-indigo-950/30 border border-indigo-200/80 dark:border-indigo-800/60 text-xs sm:text-sm text-indigo-900 dark:text-indigo-200 leading-relaxed">
                        <strong>📌 {{ app()->getLocale() === 'ar' ? 'ملاحظة هامة:' : 'Important Notice:' }}</strong>
                        {{ __('policy.sections.data_collection.note') }}
                    </div>
                </div>

                <!-- 3. Data Usage -->
                <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-purple-500/10 text-purple-600 dark:text-purple-400 flex items-center justify-center shrink-0">
                            <x-lucide-cpu class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.data_usage.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.data_usage.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-check-circle-2 class="w-5 h-5 text-purple-500 shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 4. Security & Encryption -->
                <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 flex items-center justify-center shrink-0">
                            <x-lucide-shield-alert class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.security.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.security.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-shield-check class="w-5 h-5 text-emerald-500 shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 5. Zero Sharing -->
                <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-rose-500/10 text-rose-600 dark:text-rose-400 flex items-center justify-center shrink-0">
                            <x-lucide-ban class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.sharing.title') }}
                        </h2>
                    </div>
                    <p class="text-sm sm:text-base text-slate-600 dark:text-slate-300 leading-relaxed">
                        {{ __('policy.sections.sharing.content') }}
                    </p>
                </div>

                <!-- 6. User Rights -->
                <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/10 text-cyan-600 dark:text-cyan-400 flex items-center justify-center shrink-0">
                            <x-lucide-user-check class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.rights.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.rights.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-check-circle-2 class="w-5 h-5 text-cyan-500 shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 7. Terms of Service -->
                <div class="rounded-3xl bg-white dark:bg-slate-900 border border-slate-200/80 dark:border-slate-800 p-6 sm:p-8 shadow-sm" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-teal-500/10 text-teal-600 dark:text-teal-400 flex items-center justify-center shrink-0">
                            <x-lucide-file-text class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.terms.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.terms.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-check-circle-2 class="w-5 h-5 text-teal-500 shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 8. Contact -->
                <div class="rounded-3xl bg-gradient-to-r from-slate-900 via-slate-800 to-indigo-950 p-8 sm:p-10 text-white shadow-xl" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-cyan-500/20 text-cyan-400 flex items-center justify-center shrink-0">
                            <x-lucide-mail class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-white">
                            {{ __('policy.sections.contact.title') }}
                        </h2>
                    </div>
                    <p class="text-sm text-slate-300 mb-6">
                        {{ __('policy.sections.contact.content') }}
                    </p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-xs sm:text-sm">
                        @if(isset($settings['email']) && $settings['email'])
                        <div class="flex items-center gap-3 p-3.5 rounded-xl bg-white/5 border border-white/10">
                            <x-eva-email-outline class="w-5 h-5 text-cyan-400"/>
                            <a href="mailto:{{ $settings['email'] }}" class="hover:underline font-mono text-slate-200">{{ $settings['email'] }}</a>
                        </div>
                        @endif
                        @if(isset($settings['phone']) && $settings['phone'])
                        <div class="flex items-center gap-3 p-3.5 rounded-xl bg-white/5 border border-white/10">
                            <x-heroicon-o-phone class="w-5 h-5 text-emerald-400"/>
                            <span class="font-mono text-slate-200">{{ $settings['phone'] }}</span>
                        </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Back to Home CTA -->
            <div class="text-center mt-12">
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 px-6 py-3.5 text-sm font-bold text-white rounded-2xl bg-gradient-to-r from-cyan-600 to-indigo-600 hover:from-cyan-500 hover:to-indigo-500 shadow-lg shadow-cyan-500/20 transition-all transform hover:-translate-y-0.5">
                    <x-feathericon-arrow-left class="w-4 h-4 rtl:rotate-180"/>
                    <span>{{ __('policy.nav.back_home') }}</span>
                </a>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200 dark:border-slate-800/80 bg-white/80 dark:bg-[#070b13] py-8 relative z-10 text-center text-xs text-slate-400">
        <p>&copy; {{ date('Y') }} {{ __('landing.footer.rights') }}</p>
    </footer>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const themeBtn = document.getElementById('theme-toggle-btn');
            if (themeBtn) {
                themeBtn.addEventListener('click', function() {
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
                });
            }
        });
    </script>
    @endpush
@endsection
