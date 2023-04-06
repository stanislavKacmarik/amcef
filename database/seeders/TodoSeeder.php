<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\TodoCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Todo::factory()
            ->state(
                new Sequence(
                    fn(Sequence $sequence) => ['author_id' => User::all()->random()],
                )
            )
            ->state(
                new Sequence(
                    fn(Sequence $sequence) => ['category_id' => TodoCategory::all()->random()],
                )
            )
            ->count(10)
            ->create();

        Todo::factory()
            ->state(
                new Sequence(
                    fn(Sequence $sequence) => [
                        'author_id' => User::whereEmail('test@test.com')->first()
                    ],
                )
            )
            ->state(
                new Sequence(
                    fn(Sequence $sequence) => ['category_id' => TodoCategory::all()->random()],
                )
            )
            ->count(10)
            ->create();
    }

}
