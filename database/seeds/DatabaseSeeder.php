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
        $this->call(PermissaoSeeder::class);
        $this->call(PerfilSeeder::class);
        $this->call(PerfilPermissaoSeeder::class);
        $this->call(UserSeeder::class);
    }
}
