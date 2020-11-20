<?php

namespace App\Http\Controllers;

use App\Models\Balance;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [
            'balances' => Balance::first(),
            'payment' => Transaction::where('type', 'expense')->orderBy('date', 'DESC')->limit(5)->get(),
            'revenue' => Transaction::where('type', 'revenue')->orderBy('date', 'DESC')->limit(5)->get()
        ];

        return view('home', $data);
    }
}
