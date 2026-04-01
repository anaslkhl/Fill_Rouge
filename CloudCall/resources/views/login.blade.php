@extends('layouts.app')
@section('content')

<div class="w-full max-w-md mx-auto p-6 bg-[#111827] rounded-2xl shadow-lg">

    <!-- Tabs -->
    <div class="flex mb-4">
        <button type="button" id="tab-login" onclick="switchTab('login')" class="flex-1 py-2 bg-blue-600 rounded-l-xl font-semibold text-white">Sign In</button>
        <button type="button" id="tab-register" onclick="switchTab('register')" class="flex-1 py-2 bg-gray-700 rounded-r-xl font-semibold text-gray-300">Register</button>
    </div>

    <!-- Login Form -->
    <form action="/user/login" id="panel-login" class="block space-y-4" method="POST">
        @csrf
        <input type="email" name="email" placeholder="Email" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="password" name="password" placeholder="Password" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <button type="submit" class="w-full py-2 bg-blue-500 rounded-xl font-semibold">Sign In</button>
        <p class="text-xs text-gray-400 text-center">
            Don't have an account?
            <button type="button" onclick="switchTab('register')" class="text-blue-400">Register</button>
        </p>
    </form>

    <!-- Register Form -->
    <form action="/user/register" method="POST" id="panel-register" class="hidden space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Full Name" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="email" name="email" placeholder="Email" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="tel" name="phone" placeholder="Phone" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <select name="role" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
            <option value="">Select role…</option>
            <option value="agent">Agent</option>
            <option value="supervisor">Supervisor</option>
            <option value="admin">Admin</option>
        </select>
        <input type="password" name="password" placeholder="Password" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="password" name="password_confirmation" placeholder="Confirm Password" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <button type="submit" class="w-full py-2 bg-purple-500 rounded-xl font-semibold">Create Account</button>
        <p class="text-xs text-gray-400 text-center">
            Already have an account?
            <button type="button" onclick="switchTab('login')" class="text-blue-400">Sign In</button>
        </p>
    </form>

</div>
<script>
    function switchTab(tab) {
        document.getElementById('panel-login').classList.toggle('hidden', tab !== 'login');
        document.getElementById('panel-login').classList.toggle('block', tab === 'login');
        document.getElementById('panel-register').classList.toggle('hidden', tab !== 'register');
        document.getElementById('panel-register').classList.toggle('block', tab === 'register');

        document.getElementById('tab-login').classList.toggle('bg-blue-600', tab === 'login');
        document.getElementById('tab-login').classList.toggle('bg-gray-700', tab !== 'login');
        document.getElementById('tab-register').classList.toggle('bg-blue-600', tab === 'register');
        document.getElementById('tab-register').classList.toggle('bg-gray-700', tab !== 'register');
    }
</script>

@endsection