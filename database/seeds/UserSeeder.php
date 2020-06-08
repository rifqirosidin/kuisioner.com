<?php


use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Rifqi',
                'email' => 'rifqi.godog@gmail.com',
                'role_id' => 1,
                'password' => Hash::make('12345678')
            ],
            [
                'name' => 'Rifqi',
                'email' => 'admin@gmail.com',
                'role_id' => 2,
                'password' => Hash::make('12345678')
            ],

        ];
        User::insert($users);
    }
}
