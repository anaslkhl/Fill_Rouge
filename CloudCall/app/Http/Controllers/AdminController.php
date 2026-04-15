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




    public function suspend(User $user)
    {
        abort_if($user->role === 'admin', 403, 'Cannot suspend an admin account.');

        $user->update(['is_suspended' => true]);

        return back()->with('success', "Account '{$user->name}' has been suspended.");
    }

    public function activate(User $user)
    {
        $user->update(['is_suspended' => false]);

        return back()->with('success', "Account '{$user->name}' is now active.");
    }


    public function storeReason(Request $request)
    {
        $request->validate([
            'label' => 'required|string|max:120|unique:call_reasons,label',
            'category' => 'nullable|string|in:resolved,unresolved,canceled,other',
            'description' => 'nullable|string|max:500',
        ]);

        CallReason::create([
            'label' => trim($request->label),
            'category' => $request->category ?? 'other',
            'description' => $request->description,
        ]);

        return back()->with('success', 'Call-end reason added successfully.');
    }

    public function dashboard()
    {
        $users = User::all();
        $totalUsers = $users->count();
        $agentCount = $users->where('role', 'agent')->count();
        $supervisorCount = $users->where('role', 'supervisor')->count();

        $callsToday = CallLogs::whereDate('created_at', now()->toDateString())->count();

        $errorCount = DB::table('failed_jobs')->count(); // Example: replace with your actual error tracking


        $activeSessions = DB::table('sessions')->where('last_activity', '>', now()->subMinutes(5)->getTimestamp())->count();

        return view('admin-dashboard', compact(
            'users',
            'totalUsers',
            'agentCount',
            'supervisorCount',
            'callsToday',
            'errorCount',
            'activeSessions'
        ));
    }


    public function destroyReason(CallReason $reason)
    {
        $reason->delete();

        return back()->with('success', 'Reason removed.');
    }
}
