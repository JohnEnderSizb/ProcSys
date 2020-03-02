<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        '/ajaxTest',
        '/specification/approve',
        '/specification/decline',
        '/assets/manage/show',
        '/assets/manage/approve',
        '/assets/manage/decline',
        '/assets/manage/notAvailable',
        '/app/assets/collect',
        '/app/login',
        '/assets/collect',
        '/app/collect/check',
        '/assets/manage/markForCollection',
    ];
}
