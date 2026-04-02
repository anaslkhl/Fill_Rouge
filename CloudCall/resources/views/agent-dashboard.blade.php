@extends('layouts.app')

@section('title', 'Agent Dashboard')
@section('content')
<div class="space-y-6">
    <div class="bg-slate-900 p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-4">Incoming Call Requests</h2>
        <!-- Example list -->
        <ul>
            <li class="py-2 border-b border-slate-700">
                
                <p>{{$call->client->name ?? 'vide'}}</p>
                <p>{{$call->client->phone ?? 'vide'}}</p>
                <p>{{$call->client->issue ?? 'vide'}}</p>
                <button class="ml-4 bg-green-600 px-2 py-1 rounded hover:bg-green-700">Call</button>
            </li>
        </ul>
    </div>

    <div class="bg-slate-900 p-6 rounded-2xl shadow-lg">
        <h2 class="text-xl font-bold mb-4">Log Call Result</h2>
        <form action="#" method="POST" class="space-y-4">
            @csrf
            <select name="result" class="w-full p-2 rounded bg-slate-800">
                <option value="">Select Result</option>
                <option value="sale">Sale</option>
                <option value="callback">Callback</option>
                <option value="wrong_number">Wrong Number</option>
            </select>
            <input type="text" name="duration" placeholder="Duration (minutes)" class="w-full p-2 rounded bg-slate-800">
            <textarea name="notes" placeholder="Notes" class="w-full p-2 rounded bg-slate-800"></textarea>
            <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700">Save</button>
        </form>
    </div>
</div>
@endsection