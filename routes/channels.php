<?php

use App\Models\Channel;
use Illuminate\Support\Facades\Broadcast;

// Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
//     return (int) $user->id === (int) $id;
// });

Broadcast::channel('channels.{channel}', function ($user, Channel $channel) {
    return $channel->isSubscribed($user);
});

// for the workspace presence channel
Broadcast::channel('workspace', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});
