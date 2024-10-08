<?php

namespace Abaza\Nowpayments\Http\Middleware;

use Illuminate\Support\Facades\Gate;

/*
 * This file is part of the Laravel NOWPayments package.
 *
 * (c) Seif Abaza <seif.abaza@yandex.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class Authorize
{
    /**
     * Authorize the current user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return Gate::check('viewNowpaymentsDashboard', [$request->user()])
            ? $next($request)
            : abort(403);
    }
}