<?php

use Illuminate\Database\Seeder;

class PerfilPermissaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('perfil_permissao')->insert([
            'perfil_id' => 1,
            'permissao_id' => 1,
        ]);
    }
}
