<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Joe Doe',
            'email' => 'joe.doe@example.com',
            'password' => bcrypt('secret')
        ]);
    }
}
