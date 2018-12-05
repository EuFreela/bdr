<?php

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
        //$this->call(TaskTableSeed::class);
        $this->call(SystemMessageTableSeed::class);
        //$this->call(UserTableSeed::class);
    }
}
