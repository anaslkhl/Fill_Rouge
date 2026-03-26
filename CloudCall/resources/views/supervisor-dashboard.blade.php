@extends('layouts.app')

@section('title', 'Supervisor Dashboard')
@section('content')
    @include('partials.stats-cards')
    @include('partials.agent-table')
    <div class="bg-slate-900 rounded-2xl p-6 shadow-lg mt-6">
        <h2 class="text-xl font-semibold mb-4">Team Performance</h2>
        <p class="text-slate-400">Average call success rate: 82%</p>
        <p class="text-slate-400">Agents online: 12</p>
    </div>
@endsection