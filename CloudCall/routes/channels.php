<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('call.{clientId}', function ($user, $clientId) {
    return (int) $user->id === (int) $clientId;
});
