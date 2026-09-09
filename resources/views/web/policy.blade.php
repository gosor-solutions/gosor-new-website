@extends('layouts.web.master')

@section('title', __('policy.meta.title'))
@section('description', __('policy.meta.description'))

@section('content')
    <!-- Top Navigation Bar -->
    <header class="sticky top-0 z-50 w-full border-b border-slate-200/80 dark:border-[#18223c] bg-white/95 dark:bg-[#06080e]/95 backdrop-blur-md transition-all duration-300">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex h-20 items-center justify-between">
                
                <!-- Logo & Brand Badge -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="flex items-center gap-2 group transition-transform duration-200 hover:scale-105" title="Gosor Solutions">
                        <img src="{{ isset($settings['logo']) ? asset('storage/' . $settings['logo']) : asset('images/gosor/logo/logo.png') }}" alt="Gosor Solutions Logo" class="h-10 w-auto logo-themed"/>
                    </a>
                    <div class="h-6 w-px bg-slate-300 dark:bg-slate-700 hidden sm:block"></div>
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40">
                        <x-lucide-shield-check class="w-3.5 h-3.5"/>
                        Policy & Security
                    </span>
                </div>

                <!-- Action links -->
                <div class="flex items-center gap-3">
                    <a href="{{ route('landing') }}" class="hidden sm:inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-slate-700 dark:text-slate-200 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:border-slate-300 dark:hover:border-slate-700 transition rounded-xl bg-slate-100 dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c]">
                        <x-feathericon-arrow-left class="w-4 h-4 rtl:rotate-180"/>
                        <span>{{ __('policy.nav.back_home') }}</span>
                    </a>

                    <a href="{{ route('gosor-hr') }}" class="hidden md:inline-flex items-center gap-1.5 px-4 py-2 text-sm font-semibold text-[#283891] dark:text-[#7d93ff] hover:bg-[#283891]/20 transition rounded-xl bg-[#283891]/10 border border-[#283891]/20 hover:-translate-y-0.5">
                        <span>{{ __('policy.nav.gosor_hr') }}</span>
                    </a>

                    <!-- Theme Toggle -->
                    <button type="button" id="theme-toggle-btn" aria-label="Toggle theme" class="inline-flex items-center justify-center w-10 h-10 rounded-xl bg-slate-100 dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] text-slate-600 dark:text-slate-300 hover:text-[#283891] dark:hover:text-[#7d93ff] hover:border-slate-300 dark:hover:border-slate-700 transition cursor-pointer">
                        <svg class="w-5 h-5 hidden dark:block text-amber-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v2.25m6.364.386l-1.591 1.591M21 12h-2.25m-.386 6.364l-1.591-1.591M12 18.75V21m-4.773-4.227l-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0z" />
                        </svg>
                        <svg class="w-5 h-5 block dark:hidden text-[#283891]" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.752 15.002A9.718 9.718 0 0118 15.75c-5.385 0-9.75-4.365-9.75-9.75 0-1.33.266-2.597.748-3.752A9.753 9.753 0 003 11.25C3 16.635 7.365 21 12.75 21a9.753 9.753 0 009.002-5.998z" />
                        </svg>
                    </button>

                    <!-- Language Selector -->
                    <div class="flex items-center gap-1 bg-slate-100 dark:bg-[#0c101d] border border-slate-200 dark:border-[#18223c] rounded-xl p-1 text-xs font-semibold">
                        <a href="{{ route('set-locale', 'ar') }}" class="px-2.5 py-1.5 rounded-lg transition {{ app()->getLocale() === 'ar' ? 'bg-[#283891] text-white' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }}">AR</a>
                        <a href="{{ route('set-locale', 'en') }}" class="px-2.5 py-1.5 rounded-lg transition {{ app()->getLocale() === 'en' ? 'bg-[#283891] text-white' : 'text-slate-600 dark:text-slate-400 hover:text-slate-900 dark:hover:text-white' }}">EN</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <main class="py-16 md:py-24 relative z-10">
        <div class="mx-auto max-w-4xl px-4 sm:px-6 lg:px-8">
            
            <!-- Policy Header -->
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="inline-flex items-center gap-2 px-3.5 py-1 rounded-full text-xs font-semibold bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] border border-[#283891]/20 dark:border-[#283891]/40 mb-4">
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
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] p-6 sm:p-8 hover:border-[#283891]/40 dark:hover:border-[#283891]/40 hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
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
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] p-6 sm:p-8 hover:border-[#283891]/40 dark:hover:border-[#283891]/40 hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
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
                            <x-lucide-check-circle-2 class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                    <div class="p-4 rounded-2xl bg-[#283891]/5 dark:bg-[#283891]/10 border border-[#283891]/20 dark:border-[#283891]/30 text-xs sm:text-sm text-slate-800 dark:text-slate-200 leading-relaxed">
                        <strong class="text-[#283891] dark:text-[#7d93ff]">📌 {{ app()->getLocale() === 'ar' ? 'ملاحظة هامة:' : 'Important Notice:' }}</strong>
                        {{ __('policy.sections.data_collection.note') }}
                    </div>
                </div>

                <!-- 3. Data Usage -->
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] p-6 sm:p-8 hover:border-[#283891]/40 dark:hover:border-[#283891]/40 hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                            <x-lucide-cpu class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.data_usage.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.data_usage.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-check-circle-2 class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 4. Security & Encryption -->
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] p-6 sm:p-8 hover:border-[#283891]/40 dark:hover:border-[#283891]/40 hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                            <x-lucide-shield-alert class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.security.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.security.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-shield-check class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 5. Zero Sharing -->
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] p-6 sm:p-8 hover:border-[#283891]/40 dark:hover:border-[#283891]/40 hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
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
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] p-6 sm:p-8 hover:border-[#283891]/40 dark:hover:border-[#283891]/40 hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                            <x-lucide-user-check class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.rights.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.rights.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-check-circle-2 class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 7. Terms of Service -->
                <div class="rounded-3xl bg-white dark:bg-[#0c101d] border border-slate-200/80 dark:border-[#18223c] p-6 sm:p-8 hover:border-[#283891]/40 dark:hover:border-[#283891]/40 hover:-translate-y-0.5 transition-all duration-300" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/10 text-[#283891] dark:text-[#7d93ff] flex items-center justify-center shrink-0">
                            <x-lucide-file-text class="w-5 h-5"/>
                        </div>
                        <h2 class="text-xl font-bold text-slate-900 dark:text-white">
                            {{ __('policy.sections.terms.title') }}
                        </h2>
                    </div>
                    <ul class="space-y-3">
                        @foreach(__('policy.sections.terms.points') as $point)
                        <li class="flex items-start gap-3 text-sm text-slate-700 dark:text-slate-300">
                            <x-lucide-check-circle-2 class="w-5 h-5 text-[#283891] dark:text-[#7d93ff] shrink-0 mt-0.5"/>
                            <span>{{ $point }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 8. Contact -->
                <div class="rounded-3xl bg-[#0c101d] border border-[#18223c] p-8 sm:p-10 text-white" data-aos="fade-up">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-10 h-10 rounded-xl bg-[#283891]/20 text-[#7d93ff] flex items-center justify-center shrink-0">
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
                            <x-eva-email-outline class="w-5 h-5 text-[#7d93ff]"/>
                            <a href="mailto:{{ $settings['email'] }}" class="hover:underline font-mono text-slate-200">{{ $settings['email'] }}</a>
                        </div>
                        @endif
                        @if(isset($settings['phone']) && $settings['phone'])
                        <div class="flex items-center gap-3 p-3.5 rounded-xl bg-white/5 border border-white/10">
                            <x-heroicon-o-phone class="w-5 h-5 text-[#7d93ff]"/>
                            <span class="font-mono text-slate-200">{{ $settings['phone'] }}</span>
                        </div>
                        @endif
                    </div>
                </div>

            </div>

            <!-- Back to Home CTA -->
            <div class="text-center mt-12">
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 px-6 py-3.5 text-sm font-bold text-white rounded-2xl bg-[#283891] hover:bg-[#1d2b75] transition-all transform hover:-translate-y-0.5 active:translate-y-0">
                    <x-feathericon-arrow-left class="w-4 h-4 rtl:rotate-180"/>
                    <span>{{ __('policy.nav.back_home') }}</span>
                </a>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <footer class="border-t border-slate-200 dark:border-[#18223c] bg-white/80 dark:bg-[#06080e] py-8 relative z-10 text-center text-xs text-slate-400">
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
