<?php

use App\Models\Balance;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = [
            ['title' => 'Revenue', 'type' => 'revenue'],
            ['title' => 'Expense', 'type' => 'expense']
        ];
        Category::insert($category);

        $revenueInput = [
            'category_id' => 1,
            'date' => now(),
            'amount' => 50000000,
            'notes' => 'donasi',
            'attachment' => null,
            'type' => 'revenue'
        ];

        Transaction::create($revenueInput);

        $paymentInput = [
            'category_id' => 2,
            'date' => now(),
            'amount' => 2000000,
            'notes' => 'bill',
            'attachment' => null,
            'type' => 'expense'
        ];

        $payment = Transaction::create($paymentInput);

        Balance::create([
            'balance' => 48000000,
            'payment' => 2000000,
            'revenue' => 50000000
        ]);

    }
}
