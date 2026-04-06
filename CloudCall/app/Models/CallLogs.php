<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallLogs extends Model
{
    //
    protected $fillable = [
        'client_id',
        'user_id',
        'result',
        'duration',
        'notes',
        'status'
    ];

    public static function startCall(Client $client)
    {

        $agent = User::where('role', 'agent')->where('status', 'online')->first();


        if (!$agent) {
            return null;
        }

        return self::create([
            'client_id' => $client->id,
            'user_id' => $agent->id,
            'status' => 'calling',
            'created_at' => now()
        ]);
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
    

    public function agent()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function feedback()
    {
        return $this->hasOne(callFeedback::class, 'call_log_id');
    }
}
