<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallReason extends Model
{
    protected $fillable = ['label', 'category', 'description'];
}