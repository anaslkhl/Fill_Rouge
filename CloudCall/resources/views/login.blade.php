@extends('layouts.app')
@section('content')

<div class="w-full max-w-md mx-auto p-7 bg-[#0c1120] rounded-2xl border border-white/[0.07] shadow-[0_24px_48px_rgba(0,0,0,0.5)] relative overflow-hidden before:absolute before:content-[''] before:-top-20 before:-right-20 before:w-48 before:h-48 before:bg-[radial-gradient(circle,rgba(56,139,253,0.08)_0%,transparent_70%)] before:pointer-events-none">

    <!-- Tabs -->
    <div class="flex mb-7 bg-[#080c14] border border-white/[0.06] rounded-xl p-[3px] gap-[3px]">
        <button type="button" id="tab-login" onclick="switchTab('login')" class="flex-1 py-2.5 bg-[#131d35] border border-[rgba(96,165,250,0.18)] rounded-[9px] text-[13.5px] font-medium text-blue-400 shadow-[0_1px_8px_rgba(96,165,250,0.08)] transition-all duration-200">Sign In</button>
    </div>

    <!-- Login Form -->
    <form action="/user/login" id="panel-login" class="block space-y-3" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full px-3.5 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm placeholder-white/[0.22] focus:outline-none focus:border-blue-400/35 focus:bg-[#09101d] transition-all duration-200">
        <input type="password" name="password" placeholder="Password" class="w-full px-3.5 py-[11px] rounded-[10px] bg-[#080c14] border border-white/[0.08] text-[#e2e8f0] text-sm placeholder-white/[0.22] focus:outline-none focus:border-blue-400/35 focus:bg-[#09101d] transition-all duration-200">
        <button type="submit" class="w-full py-3 mt-0.5 bg-blue-700 rounded-[10px] text-sm font-semibold text-white tracking-wide shadow-[0_2px_16px_rgba(29,78,216,0.3)] hover:bg-blue-600 hover:shadow-[0_4px_22px_rgba(29,78,216,0.45)] hover:-translate-y-px transition-all duration-200">Sign In</button>
        @auth
        @if(auth()->user()->role === 'admin')
        <p class="text-[12.5px] text-white/[0.28] text-center">
            Don't have an account?
            <button type="button" onclick="switchTab('register')" class="text-blue-400 font-medium hover:text-blue-300 transition-colors">Register</button>
        </p>
        @endif
        @endauth
    </form>

    <!-- Register Form -->
  

</div>
<script>
    function switchTab(tab) {
        document.getElementById('panel-login').classList.toggle('hidden', tab !== 'login');
        document.getElementById('panel-login').classList.toggle('block', tab === 'login');
        document.getElementById('panel-register').classList.toggle('hidden', tab !== 'register');
        document.getElementById('panel-register').classList.toggle('block', tab === 'register');

        document.getElementById('tab-login').classList.toggle('bg-[#131d35]', tab === 'login');
        document.getElementById('tab-login').classList.toggle('border', tab === 'login');
        document.getElementById('tab-login').classList.toggle('border-[rgba(96,165,250,0.18)]', tab === 'login');
        document.getElementById('tab-login').classList.toggle('text-blue-400', tab === 'login');
        document.getElementById('tab-login').classList.toggle('text-white/35', tab !== 'login');
        document.getElementById('tab-register').classList.toggle('bg-[#131d35]', tab === 'register');
        document.getElementById('tab-register').classList.toggle('border', tab === 'register');
        document.getElementById('tab-register').classList.toggle('border-[rgba(96,165,250,0.18)]', tab === 'register');
        document.getElementById('tab-register').classList.toggle('text-blue-400', tab === 'register');
        document.getElementById('tab-register').classList.toggle('text-white/35', tab !== 'register');
    }
</script>

@endsection