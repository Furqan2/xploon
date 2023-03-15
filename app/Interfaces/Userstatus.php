<?php

namespace App\Interfaces;

interface Userstatus
{
    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \Illuminate\Foundation\Auth\User
     */
    public function getUser();
}