<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()
            ->count(2)
            ->sequence(
                ['email' => 'test@test.com'],
                ['email' => 'test2@test.com'],
            )
            ->create();

        User::factory()
            ->count(10)
            ->create();
    }
}
