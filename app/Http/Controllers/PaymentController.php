<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PaymentController extends Controller
{
    use UploadFile;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Transaction::where('type', 'expense')->with('category');
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('layouts.partials._action', [
                        'model' => $data,
                        'show_url' => route('payment.show', $data->id),
                        'edit_url' => route('payment.edit', $data->id),
                        'delete_url' => route('payment.destroy', $data->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.payment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category' => Category::where('type', 'expense')->pluck('title', 'id')
        ];

        return view('pages.payment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();

        $this->validate($request, [
            'category_id' => 'required',
            'date' => 'required|date',
            'file' => 'sometimes|nullable'
        ]);

        if ($request->file('file')) {
            $request['attachment'] = $this->uploadFile(
                $request->file('file'),
                'expense',
                'expense'
            );
        }

        $request['type'] = 'expense';
        $request['amount'] = 0;
        $items = [];

        foreach ($request->item as $item) {
            $request['amount'] += ($item['qty'] * $item['price']);
        }

        $transaction = Transaction::create($request->except(['file', 'item']));

        foreach ($request->item as $item) {
            $items[] = [
                'transaction_id' => $transaction->id,
                'title' => $item['title'],
                'qty' => $item['qty'],
                'price' => $item['price'],
                'total' => ($item['qty'] * $item['price'])
            ];
        }

        TransactionDetail::insert($items);

        $balance = Balance::first();

        $balance->update([
            'balance' => $balance->balance - $transaction->amount,
            'payment' => $balance->payment + $transaction->amount,
         ]);

        return redirect()->route('payment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Transaction::findOrFail($id);
        $setting = Setting::first();
        return view('pages.payment.show', compact('payment', 'setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment = Transaction::findOrFail($id);

        $data = [
            'category' => Category::where('type', 'expense')->pluck('title', 'id'),
            'payment' => $payment
        ];

        return view('pages.payment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $payment = Transaction::findOrFail($id);

        $this->validate($request, [
            'category_id' => 'required',
            'date' => 'required|date',
            'amount' => 'sometimes|numeric',
            'description' => 'required',
            'file' => 'sometimes|nullable'
        ]);

        if ($request->file('file')) {
            $request['attachment'] = $this->uploadFile(
                $request->file('file'),
                'expense',
                'expense',
                true,
                $payment->attachment
            );
        }

        $balance = Balance::first();
        $balance->update([
            'balance' => ($balance->balance + $payment->amount) - $request->amount,
            'payment' => ($balance->payment - $payment->amount) + $request->amount
        ]);

        $payment->update($request->except('file'));

        return redirect()->route('payment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Transaction::findOrFail($id);

        $balance = Balance::first();
        $balance->update([
            'balance' => ($balance->balance + $payment->amount),
            'payment' => ($balance->payment - $payment->amount)
        ]);

        if ($payment->attachment) {
            $this->deleteFile($payment->attachment, 'payment');
        }

        $payment->delete();

        return redirect()->route('payment.index');
    }
}
