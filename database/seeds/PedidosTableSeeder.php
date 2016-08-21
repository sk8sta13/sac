<?php

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $qtd = 28;
        for ($i = 0; $i < $qtd; $i++) {
            Pedido::create([
                'qtd_itens' => $faker->numberBetween(1,50),
                'preco_total' => $faker->randomFloat(2, 1, 9999),
                'observacao' => $faker->text(200)
            ]);
        }

        $this->command->info("$qtd registros criados em pedidos.");
    }
}
