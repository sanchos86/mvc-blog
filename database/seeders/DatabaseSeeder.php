<?php

namespace Database\Seeders;

use App\Models\{User, UserRole};
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
        User::factory()->create(['role' => UserRole::ADMIN]);
        $this->call([
            CategorySeeder::class,
            TagSeeder::class,
            PostSeeder::class,
            PostTagSeeder::class
        ]);
    }
}
