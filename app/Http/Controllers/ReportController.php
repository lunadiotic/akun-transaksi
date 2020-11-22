<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index()
    {
        return view('pages.report.index');
    }

    public function store(Request $request)
    {
        $transaction = Transaction::where('type', $request->type)
            ->whereBetween('date', [$request->date_start, $request->date_end])
            ->get();

        $data = [
            'transaction' => $transaction,
            'receipt' => $request->attachment,
            'setting' => Setting::first(),
            'type' => $request->type,
            'date' => [$request->date_start, $request->date_end],
            'total' => $transaction->sum('amount')
        ];

        return view('pages.report.result', $data);
    }
}
