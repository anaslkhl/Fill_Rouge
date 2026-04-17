<?php

namespace App\Http\Controllers;

use App\Models\CallLogs;
use App\Models\CallReason;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();

        return view('admin-dashboard', compact('users'));
    }



    public function dashboard()
    {
        $users           = User::all();
        $totalUsers      = $users->count();
        $agentCount      = $users->where('role', 'agent')->count();
        $supervisorCount = $users->where('role', 'supervisor')->count();
        $suspendedCount  = $users->where('is_suspended', true)->count();

        $callsToday = CallLogs::whereDate('created_at', now()->toDateString())->count();

        $errorCount = DB::table('failed_jobs')->count();

        $activeSessions = DB::table('sessions')
            ->where('last_activity', '>', now()->subMinutes(5)->getTimestamp())
            ->count();

        return view('admin-dashboard', compact(
            'totalUsers',
            'agentCount',
            'supervisorCount',
            'suspendedCount',
            'callsToday',
            'errorCount',
            'activeSessions'
        ));
    }


    public function users()
    {
        $users           = User::where('role', '!=', 'admin')->get();
        $totalUsers      = $users->count();
        $agentCount      = $users->where('role', 'agent')->count();
        $supervisorCount = $users->where('role', 'supervisor')->count();
        $suspendedCount  = $users->where('is_suspended', true)->count();

        return view('admin-users', compact(
            'users',
            'totalUsers',
            'agentCount',
            'supervisorCount',
            'suspendedCount'
        ));
    }

    public function suspendUser(User $user)
    {
        $user->update(['is_suspended' => true]);

        return redirect()->route('admin.users')
            ->with('success', "{$user->name} has been suspended.");
    }

    public function activateUser(User $user)
    {
        $user->update(['is_suspended' => false]);

        return redirect()->route('admin.users')
            ->with('success', "{$user->name} has been activated.");
    }
}
