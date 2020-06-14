<?php

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $datas = [
          [
            'name' => 'Saldo Kuisioner.com',
              'account_number' => ""
          ],
            [
                'name' => 'Jenius',
                'account_number' => '887766544'
            ],

        ];

        PaymentMethod::insert($datas);
    }
}
