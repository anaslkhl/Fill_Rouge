<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

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
        $data = $request->validated();

        $client = Client::create($data);
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
}
