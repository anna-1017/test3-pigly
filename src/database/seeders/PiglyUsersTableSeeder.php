<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PiglyUser;

class PiglyUsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PiglyUser::factory()->count(1)->create();
    }
}
