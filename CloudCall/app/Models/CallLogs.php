<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallLogs extends Model
{
    //
    protected $fillable = [
        'client_id',
        'agent_id',
        'result',
        'duration',
        'notes',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
}
