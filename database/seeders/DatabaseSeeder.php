<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();

        \App\Models\User::factory()->create([
            'name' => 'Ramy Farid',
            'email' => 'zmzmdecoration@gmail.com',
            'password' => 'ZmzmDecoration&01154450672',
            'email_verified_at' => now(),
        ]);
    }
}
