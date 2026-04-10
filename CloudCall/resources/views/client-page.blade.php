@extends('layouts.app')

@section('title', 'CloudCall Home')
@section('content')

{{-- NAVBAR --}}
<nav class="fixed top-0 left-0 right-0 z-50 bg-slate-950/60 backdrop-blur-2xl border-b border-white/[0.05]">
    <div class="max-w-6xl mx-auto px-6 h-16 flex items-center justify-between">

        <a href="{{ route('login.form') }}" class="text-xs font-medium text-white bg-white/[0.06] px-3.5 py-2 rounded-lg">User/Login</a>
        <a href="{{ route('client.home') }}" class="flex items-center gap-2.5 group">
            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-sky-400 to-sky-600 flex items-center justify-center shadow-[0_0_12px_rgba(56,189,248,0.4)] group-hover:shadow-[0_0_20px_rgba(56,189,248,0.65)] transition-all duration-200">
                <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
            </div>
            <span class="text-sm font-bold tracking-tight text-white">Cloud<span class="text-sky-400">Call</span></span>
        </a>

        <div class="hidden md:flex items-center gap-1">
            <a href="{{ route('client.home') }}" class="text-xs font-medium text-white bg-white/[0.06] px-3.5 py-2 rounded-lg">Home</a>
            @if($client)
            <a href="{{ route('client.call', $client->uuid) }}" class="text-xs font-medium text-slate-400 hover:text-white px-3.5 py-2 rounded-lg hover:bg-white/[0.05] transition-all duration-150">My call</a>
            @else
            <a href="{{ route('client.callform') }}" class="text-xs font-medium text-slate-400 hover:text-white px-3.5 py-2 rounded-lg hover:bg-white/[0.05] transition-all duration-150">New Request</a>
            @endif
        </div>


    </div>
</nav>

{{-- HERO --}}
<section class="relative min-h-screen flex flex-col items-center justify-center overflow-hidden bg-slate-950">
    <div class="absolute inset-0 bg-[url('https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=1920&q=80')] bg-cover bg-center opacity-10"></div>
    <div class="absolute inset-0 bg-gradient-to-b from-slate-950/80 via-slate-950/50 to-slate-950"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_80%_50%_at_50%_20%,_rgba(56,189,248,0.12)_0%,_transparent_70%)]"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.03)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.03)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_60%_60%_at_50%_50%,black,transparent)]"></div>
    <div class="absolute top-1/3 left-1/4 w-72 h-72 bg-sky-500/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/3 right-1/4 w-96 h-96 bg-indigo-500/[0.08] rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 text-center px-6 max-w-4xl mx-auto">
        <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-3.5 py-1.5 rounded-full mb-8">
            <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
            Professional Call Center Platform
        </span>

        <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold tracking-tight mb-6 leading-[1.08]">
            <span class="bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent">Connect Smarter.</span><br>
            <span class="bg-gradient-to-br from-sky-300 via-sky-400 to-sky-600 bg-clip-text text-transparent">Call Better.</span>
        </h1>

        <p class="text-slate-400 text-base sm:text-lg leading-relaxed max-w-2xl mx-auto mb-10">
            CloudCall connects you with dedicated professional agents in seconds.
            Submit a request, track your call status in real-time, and get the help you need — all in one place.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-3 mb-16">
            <a href="{{ route('client.callform') }}" class="inline-flex items-center gap-2 bg-gradient-to-br from-sky-500 to-sky-600 hover:brightness-110 text-white font-semibold px-8 py-3.5 rounded-xl shadow-[0_4px_24px_rgba(14,165,233,0.45)] hover:shadow-[0_8px_32px_rgba(14,165,233,0.55)] hover:-translate-y-0.5 transition-all duration-150 text-sm">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
                Submit a Call Request
            </a>
            <a href="#features" class="inline-flex items-center gap-2 text-slate-400 hover:text-white bg-white/[0.04] hover:bg-white/[0.08] border border-white/[0.08] px-8 py-3.5 rounded-xl text-sm font-medium transition-all duration-150">
                Learn More
                <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <polyline points="6 9 12 15 18 9" />
                </svg>
            </a>
        </div>

        <div class="inline-grid grid-cols-3 gap-px bg-white/[0.06] rounded-2xl overflow-hidden border border-white/[0.06] shadow-xl">
            <div class="bg-slate-950/80 backdrop-blur-sm px-8 py-5 text-center">
                <p class="text-2xl font-bold text-white tracking-tight">99%</p>
                <p class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Uptime</p>
            </div>
            <div class="bg-slate-950/80 backdrop-blur-sm px-8 py-5 text-center">
                <p class="text-2xl font-bold text-white tracking-tight">&lt;30s</p>
                <p class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Avg. Response</p>
            </div>
            <div class="bg-slate-950/80 backdrop-blur-sm px-8 py-5 text-center">
                <p class="text-2xl font-bold text-white tracking-tight">24/7</p>
                <p class="text-[11px] text-slate-500 mt-0.5 tracking-wide">Support</p>
            </div>
        </div>
    </div>

    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex flex-col items-center gap-1.5 text-slate-600">
        <span class="text-[10px] tracking-widest uppercase">Scroll</span>
        <svg class="w-4 h-4 animate-bounce" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <polyline points="6 9 12 15 18 9" />
        </svg>
    </div>
</section>

{{-- FEATURES --}}
<section id="features" class="bg-slate-950 py-24 px-6">
    <div class="max-w-5xl mx-auto">
        <div class="text-center mb-16">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-indigo-400 bg-indigo-400/10 border border-indigo-400/20 px-3.5 py-1.5 rounded-full mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-indigo-400"></span>
                Why CloudCall
            </span>
            <h2 class="text-3xl font-bold bg-gradient-to-br from-white to-slate-400 bg-clip-text text-transparent tracking-tight">Everything you need in one platform</h2>
            <p class="text-slate-500 text-sm mt-3 max-w-lg mx-auto">Built for clients who value speed, transparency, and professional service.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <div class="group relative bg-slate-900 rounded-2xl p-6 border border-white/[0.05] hover:border-sky-400/20 transition-all duration-300 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top-left,_rgba(56,189,248,0.05)_0%,_transparent_60%)] opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                <div class="w-10 h-10 rounded-xl bg-sky-400/10 border border-sky-400/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-white mb-1.5">Real-Time Tracking</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Monitor your call request status live — from submission to completion — with instant status updates.</p>
            </div>

            <div class="group relative bg-slate-900 rounded-2xl p-6 border border-white/[0.05] hover:border-indigo-400/20 transition-all duration-300 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top-left,_rgba(99,102,241,0.05)_0%,_transparent_60%)] opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                <div class="w-10 h-10 rounded-xl bg-indigo-400/10 border border-indigo-400/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-indigo-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-white mb-1.5">Professional Agents</h3>
                <p class="text-xs text-slate-500 leading-relaxed">Vetted, trained specialists are on standby to handle your requests with care and expertise.</p>
            </div>

            <div class="group relative bg-slate-900 rounded-2xl p-6 border border-white/[0.05] hover:border-emerald-400/20 transition-all duration-300 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top-left,_rgba(52,211,153,0.05)_0%,_transparent_60%)] opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                <div class="w-10 h-10 rounded-xl bg-emerald-400/10 border border-emerald-400/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-white mb-1.5">Simple Interface</h3>
                <p class="text-xs text-slate-500 leading-relaxed">No training needed. Submit a request in seconds and manage everything from a clean dashboard.</p>
            </div>

            <div class="group relative bg-slate-900 rounded-2xl p-6 border border-white/[0.05] hover:border-amber-400/20 transition-all duration-300 overflow-hidden">
                <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top-left,_rgba(251,191,36,0.05)_0%,_transparent_60%)] opacity-0 group-hover:opacity-100 transition-opacity duration-300 pointer-events-none"></div>
                <div class="w-10 h-10 rounded-xl bg-amber-400/10 border border-amber-400/20 flex items-center justify-center mb-4">
                    <svg class="w-5 h-5 text-amber-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                    </svg>
                </div>
                <h3 class="text-sm font-semibold text-white mb-1.5">Secure & Private</h3>
                <p class="text-xs text-slate-500 leading-relaxed">All your data is encrypted and stored securely. Your privacy is our top priority.</p>
            </div>
        </div>
    </div>
</section>

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