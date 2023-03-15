<?php

namespace App\Traits;

use App\Models\User;

trait UserTrait
{
    public function getUserName()
    {
        $user = new User();
        return $user;
    }
}