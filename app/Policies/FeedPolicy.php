<?php

namespace App\Policies;

use App\Models\Feed;
use App\Models\User;

class FeedPolicy
{
    public function edit(User $user, Feed $feed): bool
    {
        return $feed->user_id === $user->id;
    }

    public function update(User $user, Feed $feed): bool
    {
        return $feed->user_id === $user->id;
    }

    public function destroy(User $user, Feed $feed): bool
    {
        return $feed->user_id === $user->id;
    }
}
