<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    //


    public function myclients()
    {
        $agentId = Auth::id();

        $call = CallLogs::with('client')
            ->where('user_id', $agentId)
            ->where('status', 'calling')->latest()->first();
        return view('agent-dashboard', compact('call'));
    }
}
