<?php

use Illuminate\Database\Seeder;

class PerfilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfis')->insert([
            'nome' => 'admin',
            'descricao' => ' Perfil Administrador',
        ]);

    }
}
