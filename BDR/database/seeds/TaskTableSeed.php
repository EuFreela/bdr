<?php

use Illuminate\Database\Seeder;

class TaskTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('priority')->delete();
        $data = array(
            [
                'name' => 'Proiridade 1',
                'code' => 1,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Prioridade 2',
                'code' => 2,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Prioridade 3',
                'code' => 3,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
        );
        DB::table('priority')->insert($data);
    }
}
