<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PiglyUser;
use App\Models\WeightLog;
use App\Models\WeightTarget;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PiglyUsersTableSeeder::class);
        $this->call(WeightLogsTableSeeder::class);
        $this->call(WeightTargetsTableSeeder::class);
    }
}
