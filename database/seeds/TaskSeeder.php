<?php

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
           'title' => "pengumpulan data pengguna smartfone di indonesia",
           'user_id' => 1,
           'number_of_respondents' => 100,
           'gender' => 'laki - laki',
           'description' => 'data ini digunakan untuk penelitian',
           'respondent_fee' => 100,
           'total_cost' => 10500,
            'created_at' => Carbon::now()
        ]);
    }
}
