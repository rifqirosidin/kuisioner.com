<?php

use App\Models\PriceBalance;
use Illuminate\Database\Seeder;

class PriceBalanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          'price' => 10000,
          'amount_balance' => 10000
        ];

        PriceBalance::insert($data);
    }
}
