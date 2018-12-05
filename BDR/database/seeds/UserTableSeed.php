<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UserTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        foreach(range(1,20) as $l):

            User::create([                
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('1234'),                
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime()
            ]);

        endforeach;
    }
}
