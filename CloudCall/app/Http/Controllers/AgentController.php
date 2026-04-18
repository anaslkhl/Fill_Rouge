<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgentController extends Controller
{
    //


    private function activeCall(): ?CallLogs
    {
        return CallLogs::with('client')
            ->where('user_id', Auth::id())
            ->whereIn('status', ['calling', 'ongoing'])
            ->latest()
            ->first();
    }


    private function allLogs()
    {
        return CallLogs::with('client')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();
    }
 
  
    
    public function dashboard()
    {
        $call     = $this->activeCall();
        $callLogs = $this->allLogs();

        $totalCalls      = $callLogs->count();
        $resolvedCalls   = $callLogs->where('result', 'resolved')->count();
        $unresolvedCalls = $callLogs->where('result', 'unresolved')->count();
        $missedCalls     = $callLogs->where('status', 'missed')->count();

        $recentCalls = $callLogs->take(5);

        return view('agent-dashboard', compact(
            'call',
            'totalCalls',
            'resolvedCalls',
            'unresolvedCalls',
            'missedCalls',
            'recentCalls',
            'callLogs'
        ));
    }

   
    public function incoming()
    {
        $call = $this->activeCall();

        return view('incoming', compact('call'));
    }

    public function logCall()
    {
        $call = $this->activeCall();

        return view('log-call', compact('call'));
    }

   
    public function history()
    {
        $callLogs = $this->allLogs();

        $totalCalls      = $callLogs->count();
        $resolvedCalls   = $callLogs->where('result', 'resolved')->count();
        $unresolvedCalls = $callLogs->where('result', 'unresolved')->count();
        $missedCalls     = $callLogs->where('status', 'missed')->count();

        return view('history', compact(
            'callLogs',
            'totalCalls',
            'resolvedCalls',
            'unresolvedCalls',
            'missedCalls',
        ));
    }
 
   
    public function myclients()
    {
        return $this->dashboard();
    }
}
