<?php

namespace App\Broadcasting\Weather;

use App\Models\User;

class FetchChannel 
{
    /**
     * Create a new channel instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Authenticate the user's access to the channel.
     */
    public function join(User $user): array|bool
    {
        return true;
        // return true;
    }
}
