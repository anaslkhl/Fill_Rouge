<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\AgentCallsExport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class AgentReportController extends Controller
{
    public function index()
    {
        $agents = User::where('role', 'agent')->get();
        return view('report-supervisor', compact('agents'));
    }

    public function export(Request $request)
    {
        $request->validate([
            'agent_id'   => 'required|exists:users,id',
            'from_date'  => 'required|date',
            'to_date'    => 'required|date|after_or_equal:from_date',
        ]);

        $agentId = $request->agent_id;
        $from    = $request->from_date . ' 00:00:00';
        $to      = $request->to_date . ' 23:59:59';


        return Excel::download(
            new AgentCallsExport($agentId, $from, $to),
            'agent_calls_' . $agentId . '_' . $request->from_date . '_to_' . $request->to_date . '.xlsx'
        );
    }
}
