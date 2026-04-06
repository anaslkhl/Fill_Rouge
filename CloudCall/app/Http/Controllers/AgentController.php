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
            ->whereIn('status', ['calling', 'ongoing'])
            ->latest()
            ->first();

        $callLogs = CallLogs::with('client')
            ->where('user_id', $agentId)
            ->latest()
            ->get();

        return view('agent-dashboard', compact('call', 'callLogs'));
    }
}
