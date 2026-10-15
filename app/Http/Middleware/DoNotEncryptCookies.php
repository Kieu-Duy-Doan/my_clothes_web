<?php

namespace App\Http\Middleware;

use Illuminate\Cookie\Middleware\EncryptCookies;

class DoNotEncryptCookies extends EncryptCookies
{
    protected $except = ['laravel-session'];
}
