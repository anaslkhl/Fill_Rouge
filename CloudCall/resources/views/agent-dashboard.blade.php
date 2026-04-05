@extends('layouts.app')

@section('title', 'Agent Dashboard')
@section('content')
<div class="space-y-6 max-w-2xl mx-auto">

    {{-- Incoming Call Requests --}}
    @if($call)
    <div class="relative bg-slate-900 rounded-2xl border border-white/5 shadow-2xl overflow-hidden">
        <div class="h-[3px] w-full bg-gradient-to-r from-sky-400 via-sky-500 to-transparent"></div>
        <div class="p-6">
            <div class="flex items-center gap-2.5 mb-5">
                <span class="w-2 h-2 rounded-full bg-sky-400 shadow-[0_0_8px_2px_rgba(56,189,248,0.6)] animate-pulse"></span>
                <h2 class="text-xs font-bold tracking-widest uppercase text-slate-400">Incoming Call Requests</h2>
            </div>
            <ul class="space-y-3">
                <li class="flex items-center gap-4 px-4 py-3 rounded-xl bg-white/[0.03] border border-white/[0.05] hover:bg-sky-500/[0.06] hover:border-sky-500/20 transition-all duration-200">
                    <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-slate-700 to-slate-800 border border-sky-400/20 flex items-center justify-center text-sky-400 font-bold text-base flex-shrink-0">
                        {{ strtoupper(substr($call->client->name ?? 'V', 0, 1)) }}
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-semibold text-slate-100 truncate">{{ $call->client->name ?? 'vide' }}</p>
                        <div class="flex items-center gap-2 mt-1 flex-wrap">
                            <span class="text-xs text-slate-500">{{ $call->client->phone ?? 'vide' }}</span>
                            <span class="text-xs text-slate-500 bg-white/[0.04] border border-white/[0.06] px-2 py-0.5 rounded-full">{{ $call->client->issue ?? 'vide' }}</span>
                        </div>
                    </div>
                    <form action="{{ route('call.start', $call->id) }}" method="POST">
                        @csrf
                        <button class="inline-flex items-center gap-1.5 bg-gradient-to-br from-green-600 to-green-700 hover:brightness-110 text-white text-xs font-semibold px-3.5 py-2 rounded-lg shadow-[0_4px_12px_rgba(22,163,74,0.35)] hover:shadow-[0_6px_18px_rgba(22,163,74,0.45)] hover:-translate-y-px transition-all duration-150">
                            <svg class="w-3.5 h-3.5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 013.07 9.81a19.79 19.79 0 01-3.07-8.63A2 2 0 012 .18h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
                            </svg>
                            Call
                        </button>
                    </form>

                </li>
            </ul>
        </div>
    </div>
    @else
    <p class="text-sm text-gray-400">No active client to call</p>
    @endif

    {{-- Log Call Result --}}
    <div class="relative bg-slate-900 rounded-2xl border border-white/5 shadow-2xl overflow-hidden">
        <div class="h-[3px] w-full bg-gradient-to-r from-sky-400 via-indigo-500 to-transparent"></div>
        <div class="p-6">
            <div class="flex items-center gap-2.5 mb-5">
                <span class="w-2 h-2 rounded-full bg-indigo-400 shadow-[0_0_8px_2px_rgba(129,140,248,0.6)] animate-pulse"></span>
                <h2 class="text-xs font-bold tracking-widest uppercase text-slate-400">Log Call Result</h2>
            </div>
            <form action="#" method="POST" class="space-y-4">
                @csrf

                <div class="space-y-1.5">
                    <label class="block text-[0.7rem] font-semibold tracking-widest uppercase text-slate-500 pl-0.5">Result</label>
                    <div class="relative">
                        <select name="result" class="w-full appearance-none bg-white/[0.04] border border-white/[0.08] rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-sky-400/50 focus:bg-sky-400/[0.04] focus:ring-2 focus:ring-sky-400/10 transition-all duration-200">
                            <option value="" class="bg-slate-900">Select Result</option>
                            <option value="sale" class="bg-slate-900">Sale</option>
                            <option value="callback" class="bg-slate-900">Callback</option>
                            <option value="wrong_number" class="bg-slate-900">Wrong Number</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-3.5 flex items-center">
                            <svg class="w-4 h-4 text-slate-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <polyline points="6 9 12 15 18 9" />
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[0.7rem] font-semibold tracking-widest uppercase text-slate-500 pl-0.5">Duration</label>
                    <input type="text" name="duration" placeholder="Duration (minutes)"
                        class="w-full bg-white/[0.04] border border-white/[0.08] rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-sky-400/50 focus:bg-sky-400/[0.04] focus:ring-2 focus:ring-sky-400/10 transition-all duration-200">
                </div>

                <div class="space-y-1.5">
                    <label class="block text-[0.7rem] font-semibold tracking-widest uppercase text-slate-500 pl-0.5">Notes</label>
                    <textarea name="notes" placeholder="Add any relevant notes..." rows="3"
                        class="w-full bg-white/[0.04] border border-white/[0.08] rounded-xl px-4 py-2.5 text-sm text-slate-200 placeholder-slate-600 outline-none focus:border-sky-400/50 focus:bg-sky-400/[0.04] focus:ring-2 focus:ring-sky-400/10 transition-all duration-200 resize-y"></textarea>
                </div>

                <button type="submit" class="inline-flex items-center gap-2 bg-gradient-to-br from-sky-500 to-sky-600 hover:brightness-110 text-white text-sm font-semibold px-5 py-2.5 rounded-xl shadow-[0_4px_16px_rgba(14,165,233,0.35)] hover:shadow-[0_8px_24px_rgba(14,165,233,0.45)] hover:-translate-y-px transition-all duration-150">
                    <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
                        <path d="M19 21H5a2 2 0 01-2-2V5a2 2 0 012-2h11l5 5v11a2 2 0 01-2 2z" />
                        <polyline points="17 21 17 13 7 13 7 21" />
                        <polyline points="7 3 7 8 15 8" />
                    </svg>
                    Save Result
                </button>
            </form>
        </div>
    </div>

</div>
@endsection