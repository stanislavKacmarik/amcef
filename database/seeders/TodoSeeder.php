<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\TodoCategory;
use App\Models\User;
use App\TodoStatusEnum;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

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
                    fn(Sequence $sequence) => [
                        'author_id' => User::all()->random(),
                        'category_id' => TodoCategory::all()->random(),
                        'status' => Arr::random(TodoStatusEnum::cases())
                    ],
                )
            )
            ->count(30)
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
        $sharedWithFirstTest = Todo::factory()
            ->state(
                new Sequence(
                    fn(Sequence $sequence) => [
                        'author_id' => User::whereEmail('test2@test.com')->first(),
                        'category_id' => TodoCategory::all()->random(),
                        'status' => Arr::random(TodoStatusEnum::cases())
                    ],
                )
            )->count(10)
            ->create();
        $firstTestUser = User::whereEmail('test@test.com')->first();
        $firstTestUser->sharedTodos()->sync($sharedWithFirstTest);
    }

}
