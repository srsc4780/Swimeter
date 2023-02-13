<?php

namespace App\Http\Controllers\Admin;

use App\Http\Concerns\WorksWithModels;
use App\Invoice;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoiceController extends Controller
{
    use WorksWithModels;

    public function index()
    {
        $invoices = Invoice::latest()->paginate();

        return view('admin.invoice.list')->with(compact([
            'invoices',
        ]));
    }

    public function changeStatus(Invoice $invoice, Request $request)
    {
        $input = $this->getInputForSave($request);

        $invoice->status = $input['status'];

        if ($input['status'] == 'approved') {
            $invoice->amount = mt_rand(100, 1000);

            $invoice->user->status->balance += $invoice->amount;
            $invoice->user->status->save();
        }

        $invoice->save();

        return $this->updated($invoice);
    }

    protected function getInputForSave(Request $request)
    {
        return $this->validate($request, [
            'status' => 'required|string',
        ]);
    }
}
