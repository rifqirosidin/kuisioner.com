<?php

use App\Models\Testimony;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(RoleSeeder::class);
         $this->call(UserSeeder::class);
         $this->call(ElementTypeSeeder::class);
         $this->call(BannerSeeder::class);
         $this->call(PaymentMethodSeeder::class);
         $this->call(TaskSeeder::class);
         $this->call(TestimonySeeder::class);
         $this->call(AboutUsSeeder::class);
    }
}
