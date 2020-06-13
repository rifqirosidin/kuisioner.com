<?php

use App\Models\ElementType;
use Illuminate\Database\Seeder;

class ElementTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'text'],
            ['name' => 'textarea'],
            ['name' => 'radio'],
            ['name' => 'checkbox'],
            ['name' => 'select'],
            ['name' => 'file'],
            ['name' => 'date'],
        ];

        ElementType::insert($data);
    }
}
