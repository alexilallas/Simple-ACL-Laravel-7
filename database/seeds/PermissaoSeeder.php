<?php

use Illuminate\Database\Seeder;

class PermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissoes')->insert([
            'nome' => 'visualizarDashboard',
            'descricao' => 'visualizar página inicial',
        ]);
    }
}
