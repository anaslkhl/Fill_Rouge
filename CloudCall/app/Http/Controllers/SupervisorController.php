<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use App\Models\User;
use Illuminate\Http\Request;

class SupervisorController extends Controller
{
    //

    public function dashboard()
    {
        $today = now()->toDateString();

        
        $agents = User::where('role', 'agent')->get();

        $todayCalls = CallLogs::whereDate('created_at', $today)->get();

        $totalCalls = $todayCalls->count();

        $successfulCalls = $todayCalls->where('status', 'success')->count();

        $successRate = $totalCalls > 0
            ? round(($successfulCalls / $totalCalls) * 100, 1)
            : 0;

        $avgDuration = round($todayCalls->avg('duration') ?? 0);

        $agentsWithStats = $agents->map(function ($agent) use ($today) {

            $calls = CallLogs::where('user_id', $agent->id)
                ->whereDate('created_at', $today)
                ->get();

            $totalCalls = $calls->count();

            $successfulCalls = $calls->where('result', 'resolved')->count();

            $successRate = $totalCalls > 0
                ? round(($successfulCalls / $totalCalls) * 100, 1)
                : 0;

            $avgDuration = round($calls->avg('duration') ?? 0);

            return [
                'id' => $agent->id,
                'name' => $agent->name,
                'status' => $agent->status ?? 'offline',
                'total_calls' => $totalCalls,
                'success_rate' => $successRate,
                'avg_duration' => $avgDuration,
            ];
        });

        $clients = User::whereNotIn('role', ['agent', 'supervisor', 'admin'])->get();

        return view('supervisor-dashboard', compact(
            'agentsWithStats',
            'totalCalls',
            'successRate',
            'avgDuration',
            'agents',
            'clients'
        ));
    }
}
