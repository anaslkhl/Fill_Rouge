@extends('layouts.app')
@section('content')
@if(auth()->user()->role === 'admin')
<form action="/user/register" method="POST" id="panel-register" class="space-y-4">
    @csrf

    {{-- Header with icon --}}
    <div class="text-center mb-6 pb-2 border-b border-white/[0.06]">
        <div class="inline-flex items-center justify-center w-12 h-12 rounded-2xl bg-gradient-to-br from-violet-500/20 to-purple-500/20 border border-white/[0.08] mb-3">
            <svg class="w-6 h-6 text-violet-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                <circle cx="12" cy="7" r="4" />
                <path d="M16 3.13a4 4 0 010 7.75" />
                <path d="M22 21v-2a4 4 0 00-3-3.85" />
            </svg>
        </div>
        <h3 class="text-white font-semibold text-base tracking-tight">Create New Account</h3>
        <p class="text-[11px] text-white/[0.35] mt-1">Add agents, supervisors, or admins to the system</p>
    </div>

    {{-- Full Name with icon --}}
    <div class="relative group">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-white/[0.25] group-focus-within:text-violet-400 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
        </div>
        <input type="text"
            name="name"
            id="register-name"
            placeholder="Full Name"
            value="{{ old('name') }}"
            class="w-full pl-10 pr-3.5 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm placeholder-white/[0.22] focus:outline-none focus:border-violet-400/40 focus:bg-[#09101d] focus:ring-1 focus:ring-violet-400/20 transition-all duration-200">
    </div>
    @error('name')
    <p class="text-[11px] text-red-400 mt-1 ml-1">{{ $message }}</p>
    @enderror

    {{-- Email with icon --}}
    <div class="relative group mt-4">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-white/[0.25] group-focus-within:text-violet-400 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z" />
                <polyline points="22,6 12,13 2,6" />
            </svg>
        </div>
        <input type="email"
            name="email"
            id="register-email"
            placeholder="Email Address"
            value="{{ old('email') }}"
            class="w-full pl-10 pr-3.5 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm placeholder-white/[0.22] focus:outline-none focus:border-violet-400/40 focus:bg-[#09101d] focus:ring-1 focus:ring-violet-400/20 transition-all duration-200">
    </div>
    @error('email')
    <p class="text-[11px] text-red-400 mt-1 ml-1">{{ $message }}</p>
    @enderror

    {{-- Phone with icon --}}
    <div class="relative group mt-4">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-white/[0.25] group-focus-within:text-violet-400 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07 19.5 19.5 0 01-6-6 19.79 19.79 0 01-3.07-8.67A2 2 0 014.11 2h3a2 2 0 012 1.72c.127.96.361 1.903.7 2.81a2 2 0 01-.45 2.11L8.09 9.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0122 14.92z" />
            </svg>
        </div>
        <input type="tel"
            name="phone"
            id="register-phone"
            placeholder="Phone Number"
            value="{{ old('phone') }}"
            class="w-full pl-10 pr-3.5 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm placeholder-white/[0.22] focus:outline-none focus:border-violet-400/40 focus:bg-[#09101d] focus:ring-1 focus:ring-violet-400/20 transition-all duration-200">
    </div>
    @error('phone')
    <p class="text-[11px] text-red-400 mt-1 ml-1">{{ $message }}</p>
    @enderror

    {{-- Role Selection with icon and styling --}}
    <div class="relative group mt-4">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-white/[0.25] group-focus-within:text-violet-400 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M12 2v4M12 18v4M4.93 4.93l2.83 2.83M16.24 16.24l2.83 2.83M2 12h4M18 12h4M4.93 19.07l2.83-2.83M16.24 7.76l2.83-2.83" />
                <circle cx="12" cy="12" r="3" />
            </svg>
        </div>
        <select name="role"
            id="register-role"
            class="w-full pl-10 pr-9 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm appearance-none cursor-pointer focus:outline-none focus:border-violet-400/40 focus:bg-[#09101d] focus:ring-1 focus:ring-violet-400/20 transition-all duration-200">
            <option value="" disabled selected>Select user role…</option>
            <option value="agent" {{ old('role') == 'agent' ? 'selected' : '' }}> Agent</option>
            <option value="supervisor" {{ old('role') == 'supervisor' ? 'selected' : '' }}> Supervisor</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}> Admin</option>
        </select>
        <div class="absolute inset-y-0 right-0 pr-3.5 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-white/[0.25]" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="6 9 12 15 18 9" />
            </svg>
        </div>
    </div>
    @error('role')
    <p class="text-[11px] text-red-400 mt-1 ml-1">{{ $message }}</p>
    @enderror

    {{-- Divider --}}
    <div class="relative my-6">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-white/[0.06]"></div>
        </div>
        <div class="relative flex justify-center">
            <span class="px-3 text-[10px] font-medium text-white/[0.25] bg-[#080c14]">SECURITY</span>
        </div>
    </div>

    {{-- Password with strength indicator --}}
    <div class="relative group">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-white/[0.25] group-focus-within:text-violet-400 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0110 0v4" />
            </svg>
        </div>
        <input type="password"
            name="password"
            id="register-password"
            placeholder="Password"
            class="w-full pl-10 pr-3.5 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm placeholder-white/[0.22] focus:outline-none focus:border-violet-400/40 focus:bg-[#09101d] focus:ring-1 focus:ring-violet-400/20 transition-all duration-200">
        <button type="button"
            onclick="togglePassword('register-password', this)"
            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-white/[0.25] hover:text-white/[0.45] transition-colors">
            <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" />
                <circle cx="12" cy="12" r="3" />
            </svg>
        </button>
    </div>

    {{-- Confirm Password --}}
    <div class="relative group mt-4">
        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-white/[0.25] group-focus-within:text-violet-400 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8">
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                <path d="M7 11V7a5 5 0 0110 0v4" />
                <line x1="12" y1="16" x2="12" y2="16" />
            </svg>
        </div>
        <input type="password"
            name="password_confirmation"
            id="register-password-confirm"
            placeholder="Confirm Password"
            class="w-full pl-10 pr-3.5 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm placeholder-white/[0.22] focus:outline-none focus:border-violet-400/40 focus:bg-[#09101d] focus:ring-1 focus:ring-violet-400/20 transition-all duration-200">
    </div>
    @error('password')
    <p class="text-[11px] text-red-400 mt-1 ml-1">{{ $message }}</p>
    @enderror

    {{-- Submit Button with hover effects --}}
    <button type="submit"
        class="group relative w-full py-3 mt-6 bg-gradient-to-r from-violet-600 to-purple-600 rounded-[10px] text-sm font-semibold text-white tracking-wide shadow-[0_2px_16px_rgba(109,40,217,0.3)] hover:shadow-[0_6px_24px_rgba(109,40,217,0.45)] hover:-translate-y-0.5 transition-all duration-200 overflow-hidden">
        <span class="relative z-10 flex items-center justify-center gap-2">
            <svg class="w-4 h-4 group-hover:scale-110 transition-transform duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
                <circle cx="12" cy="7" r="4" />
                <path d="M16 3.13a4 4 0 010 7.75" />
            </svg>
            Create Account
        </span>
        <div class="absolute inset-0 bg-gradient-to-r from-violet-500 to-purple-500 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
    </button>

    
</form>

<script>
    // Toggle password visibility
    function togglePassword(inputId, button) {
        const input = document.getElementById(inputId);
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);

        // Change icon based on visibility
        const svg = button.querySelector('svg');
        if (type === 'text') {
            svg.innerHTML = '<path d="M17.94 17.94A10.07 10.07 0 0112 20c-7 0-11-8-11-8a18.45 18.45 0 015.06-5.94M9.9 4.24A9.12 9.12 0 0112 4c7 0 11 8 11 8a18.5 18.5 0 01-2.16 3.19m-6.72-1.07a3 3 0 11-4.24-4.24" /><line x1="1" y1="1" x2="23" y2="23" />';
        } else {
            svg.innerHTML = '<path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z" /><circle cx="12" cy="12" r="3" />';
        }
    }
</script>
@endif
@endsection