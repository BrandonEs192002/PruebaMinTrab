<?php

namespace Database\Seeders;

use Database\Seeders\DepartamentoSeeder;
use Database\Seeders\MunicipioSeeder;
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
        // Llama al seeder de DepartamentosSeeder
        $this->call(DepartamentoSeeder::class);

        // Llama al seeder de MunicipiosSeeder
        $this->call(MunicipioSeeder::class);
    }
}
