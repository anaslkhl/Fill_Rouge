<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use Illuminate\Http\Request;

class callFedbackController extends Controller
{
    //
    public function store(Request $request, $callId)
    {
        $data = $request->validate([
            'feedback' => 'required|string|max:1000',
            'rating' => 'nullable|integer|min:1|max:5',
        ]);

        $call = CallLogs::with('client', 'feedback')->findOrFail($callId);

        if ($call->status !== 'ended') {
            return back()->with('error', 'Call not finished yet');
        }

        if ($call->feedback) {
            return back()->with('error', 'Feedback already submitted');
        }

        $call->feedback()->create([
            'call_log_id' => $call->id,
            'client_id' => $call->client_id,
            'feedback' => $data['feedback'],
            'rating' => $data['rating'],
        ]);

        return redirect('/')->with('success', 'Feedback submitted successfully');
    }
}
