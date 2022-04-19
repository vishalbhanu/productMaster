<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class CreateAdminSeeder extends Seeder
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
                'name' => 'Admin1',
                'email' => 'admin1@test.com',
                'password' => bcrypt('admin123')
            ],
            [
                'name' => 'Admin2',
                'email' => 'admin2@test.com',
                'password' => bcrypt('123456')
            ],
        ];

        foreach ($user as $key => $value) {
            Admin::create($value);
        }
    }
}
