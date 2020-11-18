<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Category;
use App\Models\Transaction;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RevenueController extends Controller
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
            $data = Transaction::where('type', 'revenue')->with('category');
            return DataTables::of($data)
                ->addColumn('action', function ($data) {
                    return view('layouts.partials._action', [
                        'model' => $data,
                        'show_url' => route('revenue.show', $data->id),
                        'edit_url' => route('revenue.edit', $data->id),
                        'delete_url' => route('revenue.destroy', $data->id)
                    ]);
                })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('pages.revenue.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category' => Category::where('type', 'revenue')->pluck('title', 'id')
        ];

        return view('pages.revenue.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required',
            'file' => 'sometimes|mimes:jpeg,png|nullable'
        ]);

        if ($request->file('file')) {
            $request['attachment'] = $this->uploadFile(
                $request->file('file'),
                'revenue',
                'revenue'
            );
        }

        $request['type'] = 'revenue';

        $transaction = Transaction::create($request->except('file'));
        $balance = Balance::first();
        $balance->update([
            'balance' => $balance->balance + $transaction->amount,
            'revenue' => $balance->revenue + $transaction->amount,
        ]);

        return redirect()->route('revenue.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $revenue = Transaction::findOrFail($id);

        $data = [
            'category' => Category::where('type', 'revenue')->pluck('title', 'id'),
            'revenue' => $revenue
        ];

        return view('pages.revenue.edit', $data);
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
        $revenue = Transaction::findOrFail($id);

        $this->validate($request, [
            'category_id' => 'required',
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'description' => 'required',
            'file' => 'sometimes|mimes:jpeg,png|nullable'
        ]);

        if ($request->file('file')) {
            $request['attachment'] = $this->uploadFile(
                $request->file('file'),
                'revenue',
                'revenue',
                true,
                $revenue->attachment
            );
        }

        $balance = Balance::first();
        $balance->update([
            'balance' => ($balance->balance - $revenue->amount) + $request->amount,
            'revenue' => ($balance->payment - $revenue->amount) + $request->amount
        ]);

        $revenue->update($request->except('file'));

        return redirect()->route('revenue.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $revenue = Transaction::findOrFail($id);

        $balance = Balance::first();
        $balance->update([
            'balance' => ($balance->balance - $revenue->amount),
            'revenue' => ($balance->payment - $revenue->amount)
        ]);

        if ($revenue->attachment) {
            $this->deleteFile($revenue->attachment, 'revenue');
        }

        $revenue->delete();

        return redirect()->route('revenue.index');
    }
}
