<?php

namespace Database\Seeders;

use App\Models\CarrosModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 100; $i++) {
            CarrosModel::create([
               
                'modelo' => 'teste ' . $i,
                'ano' => '20'. $i,
                'marca' => 'marca ' . $i ,
                'cor' => 'cor '. $i,
                'peso' => 'uma tonelada' . $i,
                'potencia' => 'potencia ' . $i,
                'descricao' => 'descricao ' . $i,
                'preco' => '200000.00'. $i,

            ]);
        }
    }
}
