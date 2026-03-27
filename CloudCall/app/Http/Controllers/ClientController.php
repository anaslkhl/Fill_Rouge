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
        ret
    }

    public function store(Request $request)
    {
        $data = $request->validated();

        $client = Client::create($data);
    }
}
