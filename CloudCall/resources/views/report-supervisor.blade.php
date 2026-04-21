{{-- resources/views/supervisor/agent-report.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-gray-900 to-gray-800 flex items-center justify-center p-6">
    <div class="w-full max-w-md bg-gray-800/50 backdrop-blur-sm rounded-2xl shadow-2xl border border-gray-700 p-6">

        {{-- Header with icon --}}
        <div class="flex items-center gap-3 mb-2">
            <div class="p-2 bg-blue-500/10 rounded-xl">
                <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a3 3 0 013-3h0a3 3 0 013 3v2m-3-8a3 3 0 100-6 3 3 0 000 6zM5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </div>
            <div>
                <h1 class="text-xl font-bold text-white">Agent Report</h1>
                <p class="text-sm text-gray-400">Export call data for a specific agent</p>
            </div>
        </div>

        <div class="h-px bg-gray-700 my-4"></div>

        @if ($errors->any())
        <div class="mb-5 bg-red-900/30 border border-red-700 text-red-200 rounded-lg p-3 text-sm">
            @foreach ($errors->all() as $error)
            <p class="flex items-center gap-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $error }}
            </p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="{{ route('supervisor.report.export') }}">
            @csrf

            {{-- Agent selection --}}
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-300 mb-2">Select Agent</label>
                <select name="agent_id" required
                    class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition">
                    <option value="" disabled selected>— Choose an agent —</option>
                    @foreach ($agents as $agent)
                    <option value="{{ $agent->id }}" {{ old('agent_id') == $agent->id ? 'selected' : '' }}>
                        {{ $agent->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            {{-- Date range --}}
            <div class="grid grid-cols-2 gap-4 mb-6">
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">From</label>
                    <input type="date" name="from_date" value="{{ old('from_date') }}" required
                        class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-300 mb-2">To</label>
                    <input type="date" name="to_date" value="{{ old('to_date') }}" required
                        class="w-full bg-gray-900 border border-gray-700 text-white rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                </div>
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm rounded-xl py-3 transition duration-200 flex items-center justify-center gap-2 shadow-lg shadow-blue-500/20">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                </svg>
                Download Excel Report
            </button>
        </form>

        <p class="text-xs text-center text-gray-500 mt-6">
            Generates .xlsx file with call logs, feedback & ratings
        </p>
    </div>
</div>
@endsection