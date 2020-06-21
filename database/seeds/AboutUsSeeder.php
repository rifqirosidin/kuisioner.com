<?php

use App\Models\AboutUs;
use Illuminate\Database\Seeder;

class AboutUsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AboutUs::create([
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci architecto autem beatae dignissimos, dolorum eaque error excepturi facere illo ipsum laborum libero obcaecati officia optio porro sequi voluptate? Corporis, quo.'
        ]);
    }
}
