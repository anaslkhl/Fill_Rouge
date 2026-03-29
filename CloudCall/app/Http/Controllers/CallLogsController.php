<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

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


   

    public function endCall(Request $request, CallLogs $log)
    {
        $log->update([
            'status' => $request->status,
            'duration' => $request->duration,
            'result' => $request->result,
            'note' => $request->note
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
