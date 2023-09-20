<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Produto;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Produto::query()->firstOrCreate([
            'nome' => 'Fone de ouvido',
            'descricao' => 'O fone de ouvido intra- auriculares é dinâmico e leve, que proporciona a resposta de graves e a lendária qualidade de som que você espera. Proporcionando um desempenho sonoro, é leve para usar o dia todo e incluem 3 tamanhos de ponteiras para melhor adaptar-se em seu ouvido. O microfone com controle remoto permite gerenciar suas chamadas em dispositivos Android iOS',
            'quantidade' => 10,
            'preco' => 39.99
        ]);
    }
}
