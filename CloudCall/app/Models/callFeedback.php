<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class callFeedback extends Model
{
    //

    protected $table = 'call_feedbacks';

    protected $fillable = [
        'call_log_id',
        'client_id',
        'feedback',
        'rating'
    ];


    public function call()
    {
        return $this->belongsTo(CallLogs::class, 'call_log_id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
