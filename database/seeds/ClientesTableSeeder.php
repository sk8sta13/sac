<?php

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClientesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $qtd = 12;
        for ($i = 0; $i < $qtd; $i++) {
            Cliente::create([
                'nome' => $faker->name,
                'email' => $faker->unique()->email,
                'telefone' => $faker->phoneNumber
            ]);
        }

        $this->command->info("$qtd registros criados em clientes.");
    }
}
