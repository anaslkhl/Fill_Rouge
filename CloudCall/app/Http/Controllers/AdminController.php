<?php

namespace App\Http\Controllers;

use App\Models\CallReason;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // ── Dashboard Overview ──────────────────────────────────────────────────
    public function index()
    {
        $users = User::where('role', '!=', 'admin')->get();

        return view('admin-dashboard', compact('users'));
    }

    // ── User Management ─────────────────────────────────────────────────────

    /**
     * Suspend an agent or supervisor account.
     */
    public function suspend(User $user)
    {
        abort_if($user->role === 'admin', 403, 'Cannot suspend an admin account.');

        $user->update(['is_suspended' => true]);

        return back()->with('success', "Account '{$user->name}' has been suspended.");
    }

    /**
     * Reactivate a previously suspended account.
     */
    public function activate(User $user)
    {
        $user->update(['is_suspended' => false]);

        return back()->with('success', "Account '{$user->name}' is now active.");
    }

    // ── Business Config — Qualification List ────────────────────────────────

    /**
     * Add a new call-end reason.
     */
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

    /**
     * Remove a call-end reason.
     */
    public function destroyReason(CallReason $reason)
    {
        $reason->delete();

        return back()->with('success', 'Reason removed.');
    }
}