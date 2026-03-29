@extends('layouts.app')

@section('title', 'Call Request Form')
@section('content')
<div class="bg-slate-900 rounded-2xl p-6 shadow-lg max-w-xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Submit a Call Request</h1>
    <form action="{{ route('client.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" placeholder="Name" class="w-full p-2 rounded bg-slate-800">
        <input type="tel" name="phone" placeholder="Phone" class="w-full p-2 rounded bg-slate-800">
        <textarea name="issue" placeholder="Issue Description" class="w-full p-2 rounded bg-slate-800"></textarea>
        <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Submit</button>
    </form>
</div>
@endsection