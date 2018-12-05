<?php

use Illuminate\Database\Seeder;

class SystemMessageTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('system_message')->delete();
        $data = array(
            [
                'name' => 'Cadastro criado com sucesso',
                'code' => 1,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Houve algum erro durante o cadastramento!',
                'code' => 2,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Cadastro editado com sucesso',
                'code' => 3,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Houve algum erro durante a edição do cadastro',
                'code' => 4,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Item deletado com sucesso',
                'code' => 5,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Não foi possível excluir o item',
                'code' => 6,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Cookie e Session criados com sucesso!',
                'code' => 7,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Cookie e Session apagados com sucesso!',
                'code' => 8,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Não há sessão',
                'code' => 9,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Credenciais inválidas.',
                'code' => 10,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Ocorreu algum erro',
                'code' => 11,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
            [
                'name' => 'Usuário criado com sucesso',
                'code' => 12,
                'created_at' =>  new DateTime(),
                'updated_at' => new DateTime() 
            ],
        );
        DB::table('system_message')->insert($data);
    }
}
