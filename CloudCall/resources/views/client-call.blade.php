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
            <a href="{{ route('client.call', $client->uuid) }}" class="text-xs font-medium text-slate-400 hover:text-white px-3.5 py-2 rounded-lg hover:bg-white/[0.05] transition-all duration-150">My call</a>

        </div>

        <div id="nav-status" class="flex items-center gap-3">
            @if($call)
            <span class="text-slate-400 text-xs">Loading status...</span>
            @endif
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
        <div id="call-status-container" class="relative bg-slate-900/90 backdrop-blur-sm rounded-3xl border border-white/[0.06] shadow-2xl overflow-hidden">
            <div id="call-status-content" class="relative p-6">

                {{-- ── Section Header ── --}}
                <div class="flex items-center gap-2.5 mb-5">
                    <span class="w-2 h-2 rounded-full
      @if($call?->status === 'calling') bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.5)]
      @elseif($call?->status === 'ongoing') bg-emerald-400 shadow-[0_0_8px_2px_rgba(52,211,153,0.5)]
      @elseif($call?->status === 'missed') bg-rose-400
      @else bg-slate-500 @endif">
                    </span>
                    <h2 class="text-[0.68rem] font-bold tracking-[0.15em] uppercase text-slate-400">Call Status</h2>
                </div>

                @if(!$call)
                {{-- No call --}}
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-full bg-white/[0.03] border border-white/[0.06] flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-slate-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-slate-300">No active call</p>
                        <p class="text-xs text-slate-500 mt-0.5">You have not submitted a call request yet.</p>
                    </div>
                </div>

                @elseif($call->status === 'calling')
                {{-- Top line --}}
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-sky-400/40 to-transparent"></div>
                <div class="flex items-center gap-4">
                    <div class="relative w-13 h-13 rounded-full bg-sky-400/10 border border-sky-400/20 flex items-center justify-center flex-shrink-0">
                        <div class="absolute inset-[-6px] rounded-full border border-sky-400/25 animate-ping"></div>
                        <svg class="w-5 h-5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-[0.15em] uppercase text-sky-400 bg-sky-400/10 border border-sky-400/20 px-2.5 py-1 rounded-full mb-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-pulse"></span>Calling
                        </span>
                        <p class="text-sm font-semibold text-slate-200">Connecting to an agent</p>
                        <p class="text-xs text-slate-500 mt-0.5">Please stay on the line. An agent will answer shortly.</p>
                    </div>
                    <div class="flex gap-1 items-center flex-shrink-0">
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-bounce [animation-delay:0ms]"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-bounce [animation-delay:150ms]"></span>
                        <span class="w-1.5 h-1.5 rounded-full bg-sky-400 animate-bounce [animation-delay:300ms]"></span>
                    </div>
                </div>

                @elseif($call->status === 'ongoing')
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-emerald-400/40 to-transparent"></div>
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-full bg-emerald-400/10 border border-emerald-400/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-[0.15em] uppercase text-emerald-400 bg-emerald-400/10 border border-emerald-400/20 px-2.5 py-1 rounded-full mb-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>Ongoing
                        </span>
                        <p class="text-sm font-semibold text-slate-200">Call in progress</p>
                        <p class="text-xs text-slate-500 mt-0.5">You're connected with an agent right now.</p>
                    </div>
                </div>

                @elseif($call->status === 'missed')
                <div class="absolute top-0 left-0 right-0 h-px bg-gradient-to-r from-transparent via-rose-400/40 to-transparent"></div>
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-full bg-rose-400/10 border border-rose-400/20 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-rose-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M10.68 13.31a16 16 0 003.41 2.6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.42 19.42 0 01-3.33-2.67" />
                            <line x1="1" y1="1" x2="23" y2="23" />
                        </svg>
                    </div>
                    <div>
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-[0.15em] uppercase text-rose-400 bg-rose-400/10 border border-rose-400/20 px-2.5 py-1 rounded-full mb-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-rose-400"></span>Missed
                        </span>
                        <p class="text-sm font-semibold text-slate-200">Call was missed</p>
                        <p class="text-xs text-slate-500 mt-0.5">No agent was available. Please submit a new request.</p>
                    </div>
                </div>

                @elseif($call->status === 'ended')
                <div class="flex items-center gap-4">
                    <div class="w-13 h-13 rounded-full bg-white/[0.03] border border-white/[0.06] flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2">
                            <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                        </svg>
                    </div>
                    <div>
                        <span class="inline-flex items-center gap-1.5 text-[10px] font-bold tracking-[0.15em] uppercase text-slate-500 bg-white/[0.03] border border-white/[0.06] px-2.5 py-1 rounded-full mb-2">
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-500"></span>Ended
                        </span>
                        <p class="text-sm font-semibold text-slate-200">Call has ended</p>
                        <p class="text-xs text-slate-500 mt-0.5">Your call was completed. We hope we were able to help!</p>
                    </div>
                </div>
                @endif

                {{-- ── Progress Steps ── --}}
                @if($call)
                <div class="mt-6 pt-5 border-t border-white/[0.05]">
                    <div class="flex items-start">

                        {{-- Step: Submitted --}}
                        <div class="flex flex-col items-center flex-1">
                            <div class="relative flex items-center justify-center w-7 h-7 rounded-full border bg-slate-950
          {{ in_array($call->status, ['calling','ongoing','ended','missed']) ? 'border-emerald-400/50' : 'border-white/[0.08]' }}">
                                @if(in_array($call->status, ['calling','ongoing','ended','missed']))
                                <svg class="w-3 h-3 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                @endif
                                {{-- connector --}}
                                <div class="absolute top-3.5 left-full w-full h-px
            {{ in_array($call->status, ['calling','ongoing','ended','missed']) ? 'bg-emerald-400/30' : 'bg-white/[0.06]' }}">
                                </div>
                            </div>
                            <span class="mt-2 text-[10px] font-semibold tracking-wide
          {{ in_array($call->status, ['calling','ongoing','ended','missed']) ? 'text-emerald-400' : 'text-slate-600' }}">
                                Submitted
                            </span>
                        </div>

                        {{-- Step: Calling --}}
                        <div class="flex flex-col items-center flex-1">
                            <div class="relative flex items-center justify-center w-7 h-7 rounded-full border bg-slate-950
          {{ $call->status === 'calling' ? 'border-sky-400/60 ring-2 ring-sky-400/10' : (in_array($call->status, ['ongoing','ended']) ? 'border-emerald-400/50' : ($call->status === 'missed' ? 'border-rose-400/50' : 'border-white/[0.08]')) }}">
                                @if(in_array($call->status, ['ongoing','ended']))
                                <svg class="w-3 h-3 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                @elseif($call->status === 'calling')
                                <svg class="w-2.5 h-2.5 text-sky-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                                </svg>
                                @elseif($call->status === 'missed')
                                <svg class="w-2.5 h-2.5 text-rose-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.8">
                                    <line x1="18" y1="6" x2="6" y2="18" />
                                    <line x1="6" y1="6" x2="18" y2="18" />
                                </svg>
                                @endif
                                <div class="absolute top-3.5 left-full w-full h-px
            {{ in_array($call->status, ['ongoing','ended']) ? 'bg-emerald-400/30' : 'bg-white/[0.06]' }}">
                                </div>
                            </div>
                            <span class="mt-2 text-[10px] font-semibold tracking-wide
          {{ $call->status === 'calling' ? 'text-sky-400' : (in_array($call->status, ['ongoing','ended']) ? 'text-emerald-400' : ($call->status === 'missed' ? 'text-rose-400' : 'text-slate-600')) }}">
                                Calling
                            </span>
                        </div>

                        {{-- Step: Ongoing --}}
                        <div class="flex flex-col items-center flex-1">
                            <div class="relative flex items-center justify-center w-7 h-7 rounded-full border bg-slate-950
          {{ $call->status === 'ongoing' ? 'border-emerald-400/60 ring-2 ring-emerald-400/10' : ($call->status === 'ended' ? 'border-emerald-400/50' : 'border-white/[0.08]') }}">
                                @if($call->status === 'ended')
                                <svg class="w-3 h-3 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                @elseif($call->status === 'ongoing')
                                <svg class="w-2.5 h-2.5 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                    <circle cx="12" cy="12" r="10" />
                                    <polyline points="12 6 12 12 16 14" />
                                </svg>
                                @endif
                                <div class="absolute top-3.5 left-full w-full h-px
            {{ $call->status === 'ended' ? 'bg-emerald-400/30' : 'bg-white/[0.06]' }}">
                                </div>
                            </div>
                            <span class="mt-2 text-[10px] font-semibold tracking-wide
          {{ $call->status === 'ongoing' ? 'text-emerald-400' : ($call->status === 'ended' ? 'text-emerald-400' : 'text-slate-600') }}">
                                Ongoing
                            </span>
                        </div>

                        {{-- Step: Ended --}}
                        <div class="flex flex-col items-center flex-1">
                            <div class="flex items-center justify-center w-7 h-7 rounded-full border bg-slate-950
          {{ $call->status === 'ended' ? 'border-emerald-400/50' : 'border-white/[0.08]' }}">
                                @if($call->status === 'ended')
                                <svg class="w-3 h-3 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg>
                                @endif
                            </div>
                            <span class="mt-2 text-[10px] font-semibold tracking-wide
          {{ $call->status === 'ended' ? 'text-emerald-400' : 'text-slate-600' }}">
                                Ended
                            </span>
                        </div>

                    </div>
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