@extends('layouts.web.master')

@section('title', __('landing.success.title') . ' - ' . config('app.name'))

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full px-6 text-center">
            <div class="mb-8 flex justify-center">
                <div class="w-20 h-20 rounded-full bg-emerald-500/10 border border-emerald-500/20 flex items-center justify-center text-emerald-500 dark:text-emerald-400 shadow-sm">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl font-bold mb-4 bg-gradient-to-r from-slate-900 to-indigo-900 dark:from-slate-100 dark:to-cyan-100 bg-clip-text text-transparent">
                {{ __('landing.success.title') }}
            </h1>

            <p class="text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                {{ __('landing.success.message') }}
            </p>

            <div class="text-sm text-slate-500">
                {{ __('landing.success.redirect_text') }} <span id="countdown" class="font-bold text-cyan-600 dark:text-cyan-400">5</span> {{ __('landing.success.seconds') }}
            </div>

            <div class="mt-8">
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 shadow-sm text-slate-700 hover:text-slate-900 dark:bg-slate-900/60 dark:hover:bg-slate-900 dark:border-slate-800 dark:text-slate-300 dark:hover:text-white px-6 py-3 font-semibold transition duration-300">
                    {{ __('landing.success.back_home') }}
                </a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
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
@endpush
