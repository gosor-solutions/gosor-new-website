@extends('layouts.web.master')

@section('title', __('landing.success.title') . ' - ' . config('app.name'))

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full px-6 text-center">
            <div class="mb-8 flex justify-center">
                <div class="w-20 h-20 rounded-full bg-[#283891]/10 border border-[#283891]/20 flex items-center justify-center text-[#283891] dark:text-[#7d93ff]">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                </div>
            </div>

            <h1 class="text-3xl font-bold mb-4 text-slate-900 dark:text-white">
                {{ __('landing.success.title') }}
            </h1>

            <p class="text-slate-600 dark:text-slate-400 mb-8 leading-relaxed">
                {{ __('landing.success.message') }}
            </p>

            <div class="text-sm text-slate-500 dark:text-slate-400">
                {{ __('landing.success.redirect_text') }} <span id="countdown" class="font-bold text-[#283891] dark:text-[#7d93ff]">5</span> {{ __('landing.success.seconds') }}
            </div>

            <div class="mt-8">
                <a href="{{ route('landing') }}" class="inline-flex items-center gap-2 rounded-xl bg-white hover:bg-slate-50 border border-slate-200 text-slate-700 hover:text-slate-900 dark:bg-[#0c101d] dark:hover:bg-[#18223c] dark:border-[#18223c] dark:text-slate-300 dark:hover:text-white px-6 py-3 font-semibold transition duration-300 hover:-translate-y-0.5">
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
