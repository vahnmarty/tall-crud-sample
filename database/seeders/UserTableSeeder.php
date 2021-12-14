<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'Sample User',
            'email' => 'user@user.com',
            'password' => bcrypt('password'),
            'email_verified_at' => now()
        ]);

        User::factory(10)->create();
    }
}
