<?php

use App\Models\User;
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
        $user = User::first();

        $task1 = $user->tasks()->create([
            'title' => 'Do homework',
            'description' => 'Complete math exercises at page 44',
            'completed' => false
        ]);
        $task1->flags()->attach([2, 3]);

        $task2 = $user->tasks()->create([
            'title' => 'Buy new game',
            'description' => 'Bou new computer game using actual 30% discount at xyz.com',
            'completed' => true
        ]);
        $task2->flags()->attach([1]);
    }
}
