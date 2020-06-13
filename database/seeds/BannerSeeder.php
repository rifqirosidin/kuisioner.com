<?php

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
          'title' => 'Berkerja di Rumah Sebagai Online Tester',
           'description' => 'Dengan Kuisioner.com anda akan mudah mendapatkan uang hanya bermodalkan gadger atau laptop dari rumah'
        ];
        Banner::create($data);
    }
}
