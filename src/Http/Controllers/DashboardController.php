<?php

namespace Abaza\Nowpayments\Http\Controllers;

use Illuminate\Http\Request;
use Abaza\Nowpayments\Facades\Nowpayments;
use Abaza\Nowpayments\Models\Logger;

/*
 * This file is part of the Laravel NOWPayments package.
 *
 * (c) Seif Abaza <seif.abaza@yandex.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

class DashboardController
{
    public function __invoke(Request $request)
    {
        $payments = Nowpayments::getListOfPayments("limit=200")['data'];
        $logs = Logger::get();
        $version = Nowpayments::VERSION;
        return view('nowpayments::dashboard', compact('payments', 'logs', 'version'));
    }
}
