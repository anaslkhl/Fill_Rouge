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

        // $stats = [
        //     'total'       => $callLogs->count(),
        //     'resolved'    => $callLogs->where('result', 'resolved')->count(),
        //     'unresolved'  => $callLogs->where('result', 'unresolved')->count(),
        //     'missed'      => $callLogs->where('status', 'missed')->count(),
        // ];

        return view('agent-dashboard', compact('call', 'callLogs'));
    }
}
