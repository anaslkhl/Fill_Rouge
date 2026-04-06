<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    //


    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('client.index', compact('clients'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:256',
            'phone' => 'required|string|max:16',
            'issue' => 'nullable|string|max:1024'
        ]);

        $client = Client::firstOrCreate(
            ['phone' => $data['phone']],
            [
                'name' => $data['name'],
                'issue' => $data['issue'],
                'uuid' => Str::uuid()
            ]
        );

        $client->update([
            'name' => $data['name'],
            'issue' => $data['issue']
        ]);

        $log = CallLogs::startCall($client);

        if (!$log) {
            return back()->with('error', 'No available agent');
        }

        return redirect()->route('client.call', ['uuid' => $client->uuid]);
    }


    public function show(Client $client)
    {
        $client->load('callLogs');
        return view('client.show', compact('client'));
    }

    public function home()
    {
        return view('client-page');
    }

    public function call($uuid)
    {
        $client = Client::where('uuid', $uuid)->firstOrFail();

        $call = CallLogs::where('client_id', $client->id)
            ->latest()
            ->first();

        return view('client-call', compact('client', 'call'));
    }



    public function update(Request $request, Client $client)
    {
        $data = $request->validate([
            'name' => 'string|max:256',
            'phone' => 'string|max:16',
            'issue' => 'string|max:1024'
        ]);

        $client->update($data);

        return redirect()->route('client.index')->with('success', 'Client updated successfully');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('client.index')->with('Success', 'Client deleted successfully');
    }
}
