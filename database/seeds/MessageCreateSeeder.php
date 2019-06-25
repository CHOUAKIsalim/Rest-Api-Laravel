<?php

use App\Message;
use App\Thread;
use App\User;
use Illuminate\Database\Seeder;

class MessageCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all()->pluck('id')->toArray();
        $threads = Thread::all()->pluck('id')->toArray();
        $faker = Faker\Factory::create();

        foreach (range(1,60) as $index) {
            Message::create([
                'body' => $faker->name,
                'creator' => $faker->randomElement($users),
                'time' => $faker->dateTime(),
                'thread' => $faker->randomElement($threads)
            ]);
        }
    }
}
