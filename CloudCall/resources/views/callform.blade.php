@extends('layouts.app')

@section('title', 'Call Request Form')
@section('content')

{{-- NAVBAR --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-slate-950/60 backdrop-blur-2xl border-b border-white/[0.05]">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">
        <a href="{{ route('client.home') }}" class="flex items-center gap-2.5 group">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center shadow-[0_0_12px_rgba(56,189,248,0.4)] group-hover:shadow-[0_0_20px_rgba(56,189,248,0.65)] transition-all duration-200">
                <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
            </div>
            <span class="text-sm font-bold tracking-tight text-white">Cloud<span class="text-sky-400">Call</span></span>
        </a>
        <div class="hidden md:flex items-center gap-1">
            <a href="{{ route('client.home') }}" class="text-xs font-medium text-slate-400 hover:text-white px-3.5 py-2 rounded-lg hover:bg-white/[0.05] transition-all duration-150">Home</a>
            <a href="{{ route('client.callform') }}" class="text-xs font-medium text-white bg-white/[0.06] px-3.5 py-2 rounded-lg">New Request</a>
            <a href="#" class="text-xs font-medium text-slate-400 hover:text-white px-3.5 py-2 rounded-lg hover:bg-white/[0.05] transition-all duration-150">History</a>
        </div>
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-slate-700 to-slate-800 border border-white/10 flex items-center justify-center text-xs font-bold text-slate-300 cursor-pointer hover:border-sky-400/30 hover:text-sky-400 transition-all duration-150">
                {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
            </div>
          
        </div>
    </div>
</nav>

{{-- PAGE --}}
<div class="min-h-screen bg-slate-950 pt-24 pb-16 px-4 flex flex-col items-center justify-center relative overflow-hidden">

    {{-- Background effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_40%_at_50%_20%,_rgba(56,189,248,0.07)_0%,_transparent_70%)] pointer-events-none"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.025)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.025)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_30%,black,transparent)] pointer-events-none"></div>
    <div class="absolute top-1/4 left-1/3 w-80 h-80 bg-sky-500/[0.06] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/3 w-64 h-64 bg-indigo-500/[0.06] rounded-full blur-3xl pointer-events-none"></div>

    {{-- Page Header --}}
    <div class="text-center mb-10 relative z-10">
        <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-3.5 py-1.5 rounded-full mb-4">
            <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
            </svg>
            New Call Request
        </span>
        <h1 class="text-3xl font-bold bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent tracking-tight">Submit a Call Request</h1>
        <p class="text-slate-500 text-sm mt-2.5 max-w-sm mx-auto leading-relaxed">Fill in your details below and a professional agent will reach out to you shortly.</p>
    </div>

    {{-- Form Card --}}
    <div class="relative w-full max-w-xl z-10">

        {{-- Card glow border --}}
        <div class="absolute -inset-px rounded-3xl bg-gradient-to-br from-sky-400/20 via-transparent to-indigo-400/10 pointer-events-none"></div>

        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/50 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top,_rgba(56,189,248,0.04)_0%,_transparent_60%)] pointer-events-none"></div>

            <div class="relative p-8">
                <form action="{{ route('client.store') }}" method="POST" class="space-y-5">
                    @csrf

                    {{-- Name --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-sky-400/70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Full Name
                        </label>
                        <input type="text" name="name" placeholder="Your full name"
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-sky-400/50 focus:bg-sky-400/[0.03] focus:ring-2 focus:ring-sky-400/10 transition-all duration-200">
                    </div>

                    {{-- Phone --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-sky-400/70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                            </svg>
                            Phone Number
                        </label>
                        <input type="tel" name="phone" placeholder="+1 234 567 8900"
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-sky-400/50 focus:bg-sky-400/[0.03] focus:ring-2 focus:ring-sky-400/10 transition-all duration-200">
                    </div>

                    {{-- Issue --}}
                    <div class="space-y-1.5">
                        <label class="flex items-center gap-1.5 text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">
                            <svg class="w-3 h-3 text-sky-400/70" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                            </svg>
                            Issue Description
                        </label>
                        <textarea name="issue" placeholder="Describe your issue or the reason for your call..." rows="4"
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-sky-400/50 focus:bg-sky-400/[0.03] focus:ring-2 focus:ring-sky-400/10 transition-all duration-200 resize-y"></textarea>
                    </div>

                    {{-- Divider --}}
                    <div class="h-px bg-white/[0.05]"></div>

                    {{-- Actions --}}
                    <div class="flex items-center justify-between gap-4 pt-1">
                        <a href="{{ route('client.home') }}" class="inline-flex items-center gap-1.5 text-xs text-slate-500 hover:text-slate-300 transition-colors duration-150">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="15 18 9 12 15 6" />
                            </svg>
                            Back to Home
                        </a>
                        <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-br from-sky-500 to-sky-600 hover:brightness-110 text-white text-sm font-semibold px-7 py-2.5 rounded-xl shadow-[0_4px_20px_rgba(14,165,233,0.4)] hover:shadow-[0_8px_28px_rgba(14,165,233,0.5)] hover:-translate-y-px transition-all duration-150">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                            </svg>
                            Submit
                        </button>
                    </div>

                </form>
            </div>
        </div>

        {{-- Trust note --}}
        <p class="text-center text-[11px] text-slate-600 mt-5 flex items-center justify-center gap-1.5">
            <svg class="w-3 h-3 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
            </svg>
            Your information is encrypted and never shared with third parties.
        </p>

    </div>
</div>

{{-- FOOTER --}}
<footer class="bg-slate-950 border-t border-white/[0.05] px-6 py-10">
    <div class="max-w-5xl mx-auto">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6 mb-8">
            <div>
                <div class="flex items-center gap-2.5 mb-2">
                    <div class="w-7 h-7 rounded-lg bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center shadow-[0_0_10px_rgba(56,189,248,0.35)]">
                        <svg class="w-3.5 h-3.5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-white">Cloud<span class="text-sky-400">Call</span></span>
                </div>
                <p class="text-xs text-slate-500 max-w-xs leading-relaxed">Professional call management platform connecting clients with dedicated agents.</p>
            </div>
            <div class="flex items-center gap-1">
                <a href="{{ route('client.home') }}" class="text-xs text-slate-500 hover:text-sky-400 px-3 py-1.5 rounded-lg hover:bg-sky-400/[0.06] transition-all duration-150">Home</a>
                <a href="{{ route('client.callform') }}" class="text-xs text-slate-500 hover:text-sky-400 px-3 py-1.5 rounded-lg hover:bg-sky-400/[0.06] transition-all duration-150">New Request</a>
                <a href="mailto:support@cloudcall.com" class="text-xs text-slate-500 hover:text-sky-400 px-3 py-1.5 rounded-lg hover:bg-sky-400/[0.06] transition-all duration-150">Support</a>
            </div>
        </div>
        <div class="h-px bg-white/[0.05] mb-5"></div>
        <div class="flex flex-col sm:flex-row items-center justify-between gap-2 text-[11px] text-slate-600">
            <span>&copy; 2026 CloudCall. All rights reserved.</span>
            <a href="mailto:support@cloudcall.com" class="text-sky-400/60 hover:text-sky-400 transition-colors duration-150">support@cloudcall.com</a>
        </div>
    </div>
</footer>

@endsection