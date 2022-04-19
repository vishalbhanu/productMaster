<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'firstName' => 'Jack',
                'lastName' => 'Liss',
                'email' => 'jack@test.com',
                'password' => bcrypt('jack'),
                'contactNumber'=> '12345785'

            ],
            [
                'firstName' => 'Sam',
                'lastName' => 'Nos',
                'email' => 'sam@nos.com',
                'password' => bcrypt('sam'),
                'contactNumber'=> '12345785'
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
