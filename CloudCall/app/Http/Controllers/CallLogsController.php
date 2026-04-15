<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use App\Models\Client;
use App\Models\User;
use CallStatusUpdated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class CallLogsController extends Controller
{
    //


    public function index()
    {
        $callLogs = CallLogs::latest()->get();

        return view('calllogs.index', compact('callLogs'));
    }

    public function show($id)
    {
        $calllog = CallLogs::findOrFail($id);

        return view('calllog.show', compact('calllog'));
    }

    public function startCall($id)
    {
        $call = CallLogs::with('agent')->findOrFail($id);

        if ($call->status !== 'calling') {
            return back()->with('error', 'Call cannot be started');
        }

        if (!$call->agent) {
            return back()->with('error', 'No agent assigned');
        }

        DB::transaction(function () use ($call) {
            $call->update([
                'status' => 'ongoing'
            ]);

            $call->agent->update([
                'status' => 'oncall'
            ]);
        });

        return back()->with('success', 'Call started');
    }


    public function endCall(Request $request, CallLogs $log)
    {
        $log->update([
            'status' => 'ended',
            'duration' => $request->duration,
            'result' => $request->result,
            'notes' => $request->note
        ]);

        $agent = $log->agent();
        $agent->update([
            'status' => 'online'
        ]);
        return redirect()->back()->with('success', 'Call Updated');
    }

    public function destroy($id)
    {
        $calllog = CallLogs::findOrFail($id);
        $calllog->delete();

        return redirect()->back()->with('Success', 'Calllog deleted successfully');
    }
}
