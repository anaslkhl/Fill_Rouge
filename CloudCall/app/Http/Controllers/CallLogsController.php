<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use App\Models\Client;
use Illuminate\Http\Request;

use function Symfony\Component\Clock\now;

class CallLogsController extends Controller
{
    //

    public function store(Request $request)
    {
        $data = $request->validated();

        $client = Client::create($data);
    }

    public function startcall(Client $client)
    {
        $log = CallLogs::create([
            'client_id' => $client->id,
            'status' => 'calling',
            'created_at' => now()
        ]);
        return $log;
    }

    public function endcall()
}
