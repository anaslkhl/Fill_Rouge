@extends('layouts.app')

@section('title', 'Your Call Status')
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
            <a href="{{ route('client.callform') }}" class="text-xs font-medium text-slate-400 hover:text-white px-3.5 py-2 rounded-lg hover:bg-white/[0.05] transition-all duration-150">New Request</a>
            <span class="text-xs font-medium text-white bg-white/[0.06] px-3.5 py-2 rounded-lg">My Call</span>
        </div>

        <div class="flex items-center gap-3">
            {{-- Live status pill in navbar --}}
            @if($call)
            @if($call->status === 'calling')
            <span class="hidden sm:inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-wider uppercase text-sky-300 bg-sky-400/10 border border-sky-400/20 px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                In Call
            </span>
            @elseif($call->status === 'ongoing')
            <span class="hidden sm:inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-wider uppercase text-emerald-300 bg-emerald-400/10 border border-emerald-400/20 px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                Ongoing
            </span>
            @elseif($call->status === 'ended')
            <span class="hidden sm:inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-wider uppercase text-slate-300 bg-slate-400/10 border border-slate-400/20 px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-slate-400"></span>
                Ended
            </span>
            @elseif($call->status === 'missed')
            <span class="hidden sm:inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-wider uppercase text-red-300 bg-red-400/10 border border-red-400/20 px-2.5 py-1 rounded-full">
                <span class="w-1.5 h-1.5 rounded-full bg-red-400"></span>
                Missed
            </span>
            @endif
            @endif

            <div class="w-8 h-8 rounded-xl bg-gradient-to-br from-slate-700 to-slate-800 border border-white/10 flex items-center justify-center text-xs font-bold text-slate-300">
                {{ strtoupper(substr($client->name ?? 'U', 0, 1)) }}
            </div>
        </div>

    </div>
</nav>

{{-- PAGE --}}
<div class="min-h-screen bg-slate-950 pt-24 pb-16 px-4 relative overflow-hidden">

    {{-- Background effects --}}
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_40%_at_50%_10%,_rgba(56,189,248,0.07)_0%,_transparent_70%)] pointer-events-none"></div>
    <div class="absolute inset-0 bg-[linear-gradient(rgba(56,189,248,0.025)_1px,transparent_1px),linear-gradient(90deg,rgba(56,189,248,0.025)_1px,transparent_1px)] bg-[size:64px_64px] [mask-image:radial-gradient(ellipse_60%_50%_at_50%_20%,black,transparent)] pointer-events-none"></div>
    <div class="absolute top-1/4 left-1/3 w-80 h-80 bg-sky-500/[0.05] rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/3 w-64 h-64 bg-indigo-500/[0.05] rounded-full blur-3xl pointer-events-none"></div>

    <div class="relative z-10 max-w-2xl mx-auto space-y-5">

        {{-- Page Header --}}
        <div class="text-center mb-8">
            <span class="inline-flex items-center gap-1.5 text-[10px] font-semibold tracking-[0.2em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-3.5 py-1.5 rounded-full mb-4">
                <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>
                Live Call Tracking
            </span>
            <h1 class="text-2xl font-bold bg-gradient-to-br from-white via-slate-100 to-slate-400 bg-clip-text text-transparent tracking-tight">Your Call Status</h1>
            <p class="text-slate-500 text-sm mt-2">Track your request in real-time below.</p>
        </div>

        {{-- ── CLIENT INFO CARD ── --}}
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/40 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top-right,_rgba(56,189,248,0.04)_0%,_transparent_60%)] pointer-events-none"></div>
            <div class="relative p-6">
                <div class="flex items-center gap-2.5 mb-5">
                    <span class="w-2 h-2 rounded-full bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.5)]"></span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Client Information</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    <div class="bg-white/[0.02] border border-white/[0.05] rounded-2xl px-4 py-3.5">
                        <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1 flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-sky-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                                <circle cx="12" cy="7" r="4" />
                            </svg>
                            Name
                        </p>
                        <p class="text-sm font-semibold text-slate-200 truncate">{{ $client->name ?? '—' }}</p>
                    </div>
                    <div class="bg-white/[0.02] border border-white/[0.05] rounded-2xl px-4 py-3.5">
                        <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1 flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-sky-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                            </svg>
                            Phone
                        </p>
                        <p class="text-sm font-semibold text-slate-200 truncate">{{ $client->phone ?? '—' }}</p>
                    </div>
                    <div class="bg-white/[0.02] border border-white/[0.05] rounded-2xl px-4 py-3.5">
                        <p class="text-[0.65rem] font-semibold tracking-widest uppercase text-slate-600 mb-1 flex items-center gap-1.5">
                            <svg class="w-3 h-3 text-sky-400/60" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z" />
                            </svg>
                            Issue
                        </p>
                        <p class="text-sm font-semibold text-slate-200 truncate">{{ $client->issue ?? '—' }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- ── CALL STATUS CARD ── --}}
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-indigo-400/40 to-transparent"></div>
            <div class="relative p-6">
                <div class="flex items-center gap-2.5 mb-5">
                    <span class="w-2 h-2 rounded-full bg-indigo-400 shadow-[0_0_8px_2px_rgba(99,102,241,0.5)]"></span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Call Status</h2>
                </div>

                @if(!$call)
                {{-- No call exists --}}
                <div class="flex items-center gap-4 bg-amber-400/[0.06] border border-amber-400/15 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-amber-400/10 border border-amber-400/20 flex items-center justify-center text-lg flex-shrink-0">⏳</div>
                    <div>
                        <p class="text-sm font-semibold text-amber-300">Waiting for an agent...</p>
                        <p class="text-xs text-amber-400/60 mt-0.5">Your request has been received. An agent will call you shortly.</p>
                    </div>
                </div>

                @elseif($call->status === 'calling')
                <div class="flex items-center gap-4 bg-sky-400/[0.06] border border-sky-400/15 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-sky-400/10 border border-sky-400/20 flex items-center justify-center text-lg flex-shrink-0 animate-pulse">📞</div>
                    <div>
                        <p class="text-sm font-semibold text-sky-300">An agent is calling you...</p>
                        <p class="text-xs text-sky-400/60 mt-0.5">Please pick up your phone. The agent is waiting for you.</p>
                    </div>
                </div>

                @elseif($call->status === 'ongoing')
                <div class="flex items-center gap-4 bg-emerald-400/[0.06] border border-emerald-400/15 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-emerald-400/10 border border-emerald-400/20 flex items-center justify-center text-lg flex-shrink-0">✅</div>
                    <div>
                        <p class="text-sm font-semibold text-emerald-300">Call in progress...</p>
                        <p class="text-xs text-emerald-400/60 mt-0.5">Your call is currently active with one of our agents.</p>
                    </div>
                </div>

                @elseif($call->status === 'ended')
                <div class="flex items-center gap-4 bg-slate-400/[0.06] border border-slate-400/15 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-slate-400/10 border border-slate-400/20 flex items-center justify-center text-lg flex-shrink-0">📴</div>
                    <div>
                        <p class="text-sm font-semibold text-slate-300">Call ended</p>
                        <p class="text-xs text-slate-500 mt-0.5">Your call has been completed. Thank you for using CloudCall.</p>
                    </div>
                </div>

                @elseif($call->status === 'missed')
                <div class="flex items-center gap-4 bg-red-400/[0.06] border border-red-400/15 rounded-2xl px-5 py-4">
                    <div class="w-10 h-10 rounded-xl bg-red-400/10 border border-red-400/20 flex items-center justify-center text-lg flex-shrink-0">❌</div>
                    <div>
                        <p class="text-sm font-semibold text-red-300">Missed call</p>
                        <p class="text-xs text-red-400/60 mt-0.5">We tried to reach you but couldn't. Please submit a new request.</p>
                    </div>
                </div>
                @endif

                {{-- Call meta info --}}
                @if($call)
                <div class="mt-4 flex items-center justify-between px-1">
                    <span class="text-[11px] text-slate-600 flex items-center gap-1.5">
                        <svg class="w-3 h-3" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        Submitted {{ $call->created_at->diffForHumans() }}
                    </span>
                    <span class="text-[11px] text-slate-600">
                        {{ $call->created_at->format('M d, Y · H:i') }}
                    </span>
                </div>
                @endif

            </div>
        </div>

        {{-- ── FEEDBACK CARD (only when ended) ── --}}
        @if($call && $call->status === 'ended')
        <div class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-400/40 to-transparent"></div>
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom-left,_rgba(52,211,153,0.04)_0%,_transparent_60%)] pointer-events-none"></div>
            <div class="relative p-6">
                <div class="flex items-center gap-2.5 mb-5">
                    <span class="w-2 h-2 rounded-full bg-emerald-400 shadow-[0_0_8px_2px_rgba(52,211,153,0.5)]"></span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Leave Feedback</h2>
                </div>
                <p class="text-xs text-slate-500 mb-5 leading-relaxed">How was your experience with our agent? Your feedback helps us improve our service.</p>

                <form action="{{ route('feedback.store', $call->id) }}" method="POST" class="space-y-4">
                    @csrf

                    {{-- Star rating --}}
                    <div class="space-y-1.5">
                        <label class="text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">Rating</label>
                        <div class="flex items-center gap-2">
                            @for($i = 1; $i <= 5; $i++)
                                <label class="cursor-pointer">
                                <input type="radio" name="rating" value="{{ $i }}" class="sr-only peer">
                                <svg class="w-7 h-7 text-slate-700 peer-checked:text-amber-400 hover:text-amber-400 transition-colors duration-150" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                                </svg>
                                </label>
                                @endfor
                        </div>
                    </div>

                    {{-- Comment --}}
                    <div class="space-y-1.5">
                        <label class="text-[0.68rem] font-semibold tracking-[0.12em] uppercase text-slate-500 pl-0.5">Comment <span class="normal-case text-slate-600">(optional)</span></label>
                        <textarea name="feedback" rows="3" placeholder="Share your experience..."
                            class="w-full bg-white/[0.03] border border-white/[0.07] hover:border-white/[0.12] rounded-xl px-4 py-3 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-emerald-400/50 focus:bg-emerald-400/[0.03] focus:ring-2 focus:ring-emerald-400/10 transition-all duration-200 resize-y"></textarea>
                    </div>

                    <div class="pt-1">
                        <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-br from-emerald-500 to-emerald-600 hover:brightness-110 text-white text-sm font-semibold px-6 py-2.5 rounded-xl shadow-[0_4px_16px_rgba(52,211,153,0.3)] hover:shadow-[0_8px_24px_rgba(52,211,153,0.4)] hover:-translate-y-px transition-all duration-150">
                            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <polyline points="20 6 9 17 4 12" />
                            </svg>
                            Submit Feedback
                        </button>
                    </div>
                </form>
            </div>
        </div>
        @endif

        {{-- Missed call CTA --}}
        @if($call && $call->status === 'missed')
        <div class="text-center pt-2">
            <a href="{{ route('client.callform') }}" class="inline-flex items-center gap-2 bg-gradient-to-br from-sky-500 to-sky-600 hover:brightness-110 text-white font-semibold px-7 py-3 rounded-xl shadow-[0_4px_20px_rgba(14,165,233,0.4)] hover:shadow-[0_8px_28px_rgba(14,165,233,0.5)] hover:-translate-y-px transition-all duration-150 text-sm">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                </svg>
                Submit a New Request
            </a>
        </div>
        @endif

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