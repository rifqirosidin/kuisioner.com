<?php

use App\Models\Testimony;
use Illuminate\Database\Seeder;

class TestimonySeeder extends Seeder
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
                'name' => 'Anonymous 1',
                'content' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac condimentum mi, vitae iaculis ante. Suspendisse viverra urna quis diam sodales, convallis auctor nibh.'
            ],
            [
                'name' => 'Anonymous 2',
                'content' => ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus ac condimentum mi, vitae iaculis ante. Suspendisse viverra urna quis diam sodales, convallis auctor nibh.'
            ]
        ];
        Testimony::insert($datas);
    }
}
