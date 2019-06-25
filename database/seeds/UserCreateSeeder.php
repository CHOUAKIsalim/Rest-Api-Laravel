<?php

use App\User;
use Illuminate\Database\Seeder;

class UserCreateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        foreach (range(1,10) as $index) {
            User::create([
                'name' => $faker->name,
                'password' => bcrypt('password'),
                'email' => $faker->email
            ]);
        }
        User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
