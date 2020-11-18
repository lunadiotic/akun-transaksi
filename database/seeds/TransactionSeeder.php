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
            ['code' => '1.0', 'title' => 'Revenue', 'type' => 'revenue'],
            ['code' => '2.0', 'title' => 'Expense', 'type' => 'expense']
        ];
        Category::insert($category);

        $revenueInput = [
            'category_id' => 1,
            'date' => now(),
            'amount' => 50000000,
            'description' => 'donasi',
            'attachment' => null,
            'type' => 'revenue'
        ];

        Transaction::create($revenueInput);

        $paymentInput = [
            'category_id' => 2,
            'date' => now(),
            'amount' => 2000000,
            'description' => 'bill',
            'attachment' => null,
            'type' => 'expense'
        ];

        $payment = Transaction::create($paymentInput);

        Balance::create([
            'amount' => 48000000
        ]);

    }
}
