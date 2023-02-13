<?php

namespace App\Http\Controllers;

use App\Http\Concerns\WorksWithModels;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    use WorksWithModels;

    private $dummyTxnIds = [
        '5id981nf2p' => 5500,
        '5ii0969t92' => 4200,
        '5kb1muhv8f' => 2000,
        '5l98v65s9i' => 3000,
        '5kgh7ydy25' => 1200,
    ];

    public function index()
    {
        $invoices = $this->visitor->invoices()->latest()->paginate();

        return view('public.billing.list')->with(compact([
            'invoices',
        ]));
    }

    public function addTransaction(Request $request)
    {
        $invoice = $this->visitor->invoices()->create(
            $this->getInputForSave($request)
        );

        $txnId = $invoice->txn_id;

        if (isset($this->dummyTxnIds[$txnId])) {
            $invoice->amount = $this->dummyTxnIds[$txnId];
            $invoice->save();

            $invoice->user->status->balance += $invoice->amount;
            $invoice->user->status->save();
        }

        return $this->created($invoice);
    }

    protected function getInputForSave(Request $request)
    {
        return $this->validate($request, [
            'txn_id' => 'required|string|unique:invoices,txn_id',
        ]);
    }
}
