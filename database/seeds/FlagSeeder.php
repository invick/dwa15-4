<?php

use App\Models\Flag;
use Illuminate\Database\Seeder;

class FlagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Flag::create([
            'name' => 'urgent',
        ]);

        Flag::create([
            'name' => 'low priority',
        ]);

        Flag::create([
            'name' => 'today',
        ]);

        Flag::create([
            'name' => 'this week',
        ]);

        Flag::create([
            'name' => 'next week',
        ]);

        Flag::create([
            'name' => 'this month',
        ]);

        Flag::create([
            'name' => 'next month',
        ]);

        Flag::create([
            'name' => 'work',
        ]);

        Flag::create([
            'name' => 'home',
        ]);

        Flag::create([
            'name' => 'school',
        ]);
    }
}
