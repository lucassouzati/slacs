<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(ColaboradoresTableSeeder::class);
        $this->call(EntesTableSeeder::class);
        $this->call(ConfiguracaoTableSeeder::class);
    }
}
