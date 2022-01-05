<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Service::create([
            'name' => 'سحب',
        ]);
        Service::create([
            'name' => 'ايداع',
        ]);
        Service::create([
            'name' => 'تحويل',
        ]);
    }
}
