@extends('layouts.app')

@section('title', 'CloudCall Home')
@section('content')
<div class="space-y-12">

    <section class="bg-slate-900 rounded-2xl p-10 shadow-lg text-center max-w-4xl mx-auto">
        <h1 class="text-4xl font-bold mb-4">Welcome to CloudCall</h1>
        <p class="text-slate-300 mb-6">
            Manage your calls efficiently and connect with our professional agents. 
            Track your request status in real-time and avoid manual paperwork.
        </p>
        <a href="{{ route('client.callform') }}" 
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded-lg">
            Submit a Call Request
        </a>
    </section>

    <section class="bg-slate-900 rounded-2xl p-8 shadow-lg max-w-4xl mx-auto">
        <h2 class="text-2xl font-bold mb-4">Why CloudCall?</h2>
        <ul class="list-disc pl-5 space-y-2 text-slate-300">
            <li>Track your requests in real-time</li>
            <li>Professional agents ready to assist you</li>
            <li>Simple and easy-to-use interface</li>
            <li>All data stored securely</li>
        </ul>
    </section>

    <footer class="bg-slate-800 rounded-2xl p-6 text-center text-slate-400 max-w-4xl mx-auto">
        &copy; 2026 CloudCall. All rights reserved. Contact us at support@cloudcall.com
    </footer>

</div>
@endsection