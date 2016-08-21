<?php

use Illuminate\Database\Seeder;
use App\Models\Chamado;

class ChamadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $qtd = 6;
        for ($i = 0; $i < $qtd; $i++) {
            Chamado::create([
                'titulo' => $faker->text(25),
                'observacao' => $faker->text(200),
                'cliente_id' => $faker->numberBetween(1,12),
                'pedido_id' => $faker->numberBetween(1,28),
            ]);
        }

        $this->command->info("$qtd registros criados em chamados.");
    }
}
