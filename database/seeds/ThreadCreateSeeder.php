<?php

use App\User;
use App\Thread;
use Illuminate\Database\Seeder;

class ThreadCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->pluck('id')->toArray();
        $faker = Faker\Factory::create();

        foreach (range(1,25) as $index) {
            Thread::create([
                'subject' => $faker->name,
                'creator' => $faker->randomElement($users),
                'time' => $faker->dateTime()
            ]);
        }
    }
}
