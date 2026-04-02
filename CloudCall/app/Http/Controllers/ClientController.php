<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'name' => 'string|max:256',
            'phone' => 'string|max:16',
            'issue' => 'string|max:1024'
        ]);

        $client = Client::create($data);
        // if (!$client) {
        //     return "client not created";
        // }
        $log = CallLogs::startCall($client);
        if (!$log) {
            return back()->with('Failed', 'there is no available agent');
        }

        return view('home');
    }

    public function show($client)
    {
        $client->load('callLogs');
        return view('client.show', compact('client'));
    }


    public function update(Request $request, Client $client)
    {
        $client->update($request->validated());
        return redirect()->route('client.index')->with('Success', 'Client updated successfully');
    }


    public function destroy(Client $client)
    {
        $client->delete();
        return redirect('client.index')->with('Success', 'Client deleted successfully');
    }
}
