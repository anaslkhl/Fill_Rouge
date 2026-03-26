<div class="w-full max-w-md mx-auto p-6 bg-[#111827] rounded-2xl shadow-lg">

    <!-- Tabs -->
    <div class="flex mb-4">
        <button id="tab-login" onclick="switchTab('login')" class="flex-1 py-2 bg-blue-600 rounded-l-xl font-semibold text-white">Sign In</button>
        <button id="tab-register" onclick="switchTab('register')" class="flex-1 py-2 bg-gray-700 rounded-r-xl font-semibold text-gray-300">Register</button>
    </div>

    <!-- Login Form -->
    <div id="panel-login" class="block space-y-4">
        <input type="email" placeholder="Email" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="password" placeholder="Password" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <button onclick="alert('Login!')" class="w-full py-2 bg-blue-500 rounded-xl font-semibold">Sign In</button>
        <p class="text-xs text-gray-400 text-center">
            Don't have an account?
            <button onclick="switchTab('register')" class="text-blue-400">Register</button>
        </p>
    </div>

    <!-- Register Form -->
    <div id="panel-register" class="hidden space-y-4">
        <input type="text" placeholder="First Name" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="text" placeholder="Last Name" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="email" placeholder="Email" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="tel" placeholder="Phone" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <select class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
            <option value="">Select role…</option>
            <option>Agent</option>
            <option>Supervisor</option>
            <option>Admin</option>
        </select>
        <input type="password" placeholder="Password" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <input type="password" placeholder="Confirm Password" class="w-full p-2 rounded-xl bg-[#0F172A] border border-gray-600 text-white">
        <button onclick="alert('Register!')" class="w-full py-2 bg-purple-500 rounded-xl font-semibold">Create Account</button>
        <p class="text-xs text-gray-400 text-center">
            Already have an account?
            <button onclick="switchTab('login')" class="text-blue-400">Sign In</button>
        </p>
    </div>

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