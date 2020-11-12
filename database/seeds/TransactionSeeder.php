<?php

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
            ['title' => 'income', 'type' => 'income'],
            ['title' => 'outcome', 'type' => 'outcome']
        ];
        Category::insert($category);

        $revenueInput = [
            'category_id' => 1,
            'date' => now(),
            'amount' => 50000000,
            'description' => 'donasi',
            'attachment' => null
        ];

        $revenue = Transaction::create($revenueInput);
        $revenue->balance()->create([
            'time' => now(),
            'discharge' => $revenue->amount,
            'charge' => 0,
            'balance' => (0 + $revenue->amount)
        ]);

        $paymentInput = [
            'category_id' => 2,
            'date' => now(),
            'amount' => 2000000,
            'description' => 'bill',
            'attachment' => null
        ];

        $payment = Transaction::create($paymentInput);

        $payment->balance()->create([
            'time' => now(),
            'discharge' => 0,
            'charge' => $payment->amount,
            'balance' => (50000000 - $payment->amount)
        ]);

    }
}
