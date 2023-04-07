<?php

namespace Database\Seeders;

use App\Models\TodoCategory;
use Illuminate\Database\Seeder;

class TodoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TodoCategory::factory()
            ->sequence(
                ['title' => 'default'],
                ['title' => 'urgent'],
                ['title' => 'low priority'],
            )
            ->count(3)
            ->create();
    }
}
