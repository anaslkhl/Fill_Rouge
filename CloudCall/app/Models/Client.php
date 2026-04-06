<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable = [
        'name',
        'phone',
        'issue',
        'uuid'
    ];


    public function callLogs()
    {
        return $this->hasMany(CallLogs::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(callFeedback::class);
    }

    // protected static function booted()
    // {


    //     $agent = User::where('role', 'agent')->wehre('status', 'available')->first();

    //     if (!$agent) {
    //         return back()->with('error', 'No agent available');
    //     }

    //     $user_id = $agent->id;

    //     static::created(function ($client) {
    //         CallLogs::create([
    //             'client_id' => $client->id, 
    //             'status' => 'pending'
    //         ]);
    //     });
    // }
}
