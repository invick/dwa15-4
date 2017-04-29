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
            'name' => 'delayed',
        ]);
    }
}
