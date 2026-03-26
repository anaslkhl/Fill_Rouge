@extends('layouts.app')

@section('title', 'Admin Dashboard')
@section('page-title', 'Admin Dashboard')

@section('content')

<!-- Stats Cards -->
<div class="grid grid-cols-3 gap-6">
    <div class="bg-slate-900 rounded-2xl p-6 shadow-lg">
        <h2 class="text-slate-400 text-sm">Total Users</h2>
        <p class="text-2xl font-bold mt-2">24</p>
    </div>
    <div class="bg-slate-900 rounded-2xl p-6 shadow-lg">
        <h2 class="text-slate-400 text-sm">Active Agents</h2>
        <p class="text-2xl font-bold mt-2">12</p>
    </div>
    <div class="bg-slate-900 rounded-2xl p-6 shadow-lg">
        <h2 class="text-slate-400 text-sm">Supervisors</h2>
        <p class="text-2xl font-bold mt-2">3</p>
    </div>
</div>

<!-- Agents Section -->
<div class="bg-slate-900 rounded-2xl p-6 shadow-lg mt-6">
    <h2 class="text-xl font-semibold mb-4">Agents</h2>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="border-b border-slate-700 py-2">Name</th>
                <th class="border-b border-slate-700 py-2">Status</th>
                <th class="border-b border-slate-700 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through agents -->
            <tr>
                <td class="py-2">Alice</td>
                <td class="py-2"><span class="bg-green-500 px-2 rounded-full text-black">Online</span></td>
                <td class="py-2">
                    <button class="bg-blue-600 px-2 py-1 rounded hover:bg-blue-700 text-white">Edit</button>
                    <button class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 text-white">Suspend</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Supervisors Section -->
<div class="bg-slate-900 rounded-2xl p-6 shadow-lg mt-6">
    <h2 class="text-xl font-semibold mb-4">Supervisors</h2>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="border-b border-slate-700 py-2">Name</th>
                <th class="border-b border-slate-700 py-2">Status</th>
                <th class="border-b border-slate-700 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through supervisors -->
            <tr>
                <td class="py-2">Bob</td>
                <td class="py-2"><span class="bg-yellow-500 px-2 rounded-full text-black">Offline</span></td>
                <td class="py-2">
                    <button class="bg-blue-600 px-2 py-1 rounded hover:bg-blue-700 text-white">Edit</button>
                    <button class="bg-red-600 px-2 py-1 rounded hover:bg-red-700 text-white">Suspend</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Admins Section -->
<div class="bg-slate-900 rounded-2xl p-6 shadow-lg mt-6">
    <h2 class="text-xl font-semibold mb-4">Admins</h2>
    <table class="w-full text-left border-collapse">
        <thead>
            <tr>
                <th class="border-b border-slate-700 py-2">Name</th>
                <th class="border-b border-slate-700 py-2">Status</th>
                <th class="border-b border-slate-700 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through admins -->
            <tr>
                <td class="py-2">Charlie</td>
                <td class="py-2"><span class="bg-gray-500 px-2 rounded-full text-black">Offline</span></td>
                <td class="py-2">
                    <button class="bg-blue-600 px-2 py-1 rounded hover:bg-blue-700 text-white">Edit</button>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<!-- System Logs -->
<div class="bg-slate-900 rounded-2xl p-6 shadow-lg mt-6">
    <h2 class="text-xl font-semibold mb-4">System Logs</h2>
    <div class="max-h-64 overflow-y-auto text-slate-300">
        <p>[2026-03-26 14:00] Admin logged in</p>
        <p>[2026-03-26 14:05] Agent Alice created a new call log</p>
        <p>[2026-03-26 14:10] Supervisor Bob assigned a client</p>
    </div>
</div>

@endsection