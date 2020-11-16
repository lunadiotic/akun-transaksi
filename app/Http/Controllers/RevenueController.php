<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Transaction;
use App\Traits\UploadFile;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RevenueController extends Controller
{
    use UploadFile;

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
                        'show_url' => route('category.show', $data->id),
                        'edit_url' => route('category.edit', $data->id),
                        'delete_url' => route('category.destroy', $data->id)
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
        //
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
        $latestBalance = Balance::orderBy('id', 'desc')->first();
        $balance = $latestBalance ? $latestBalance->balance : 0;

        $transaction->balance()->create([
            'time' => now(),
            'discharge' => $transaction->amount,
            'charge' => 0,
            'balance' => ($balance + $transaction->amount)
        ]);
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
        //
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

        $revenue->update($request->except('file'));
        return 'true';
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

        if ($revenue->attachment) {
            $this->deleteFile($revenue->attachment, 'revenue');
        }

        $revenue->delete();

        return true;
    }
}
