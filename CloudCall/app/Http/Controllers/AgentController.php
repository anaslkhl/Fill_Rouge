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
            ->where('agent_id', $agentId)
            ->where('status', 'oncall')->latest()->first();
        dd($agentId, $call);
        return view('dashboard.agent', compact('call'));
    }
}
