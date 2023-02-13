<?php

namespace App\Http\Controllers\Admin;

use App\Invoice;
use App\Meter;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function showDashboardPage()
    {
        $userCount = User::whereIsAdmin(false)->count();
        $meterCount = Meter::count();
        $pendingInvoiceCount = Invoice::whereStatus('pending')->count();

        return view('admin.dashboard')->with(compact([
            'userCount', 'meterCount', 'pendingInvoiceCount',
        ]));
    }
}
