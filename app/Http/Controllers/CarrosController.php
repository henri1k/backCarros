<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarrosRequest;
use App\Models\CarrosModel;
use Illuminate\Http\Request;

class CarrosController extends Controller
{

    public function store(CarrosRequest $carrosRequest){
  
        $carros = CarrosModel::create([
                    'modelo' => $carrosRequest->modelo,
                    'ano' => $carrosRequest->ano,
                    'preco' => $carrosRequest->preco,
                    'marca' => $carrosRequest->marca,
                    'cor' => $carrosRequest->cor,
                    'peso' => $carrosRequest->peso,
                    'potencia' => $carrosRequest->potencia,
                    'descricao' => $carrosRequest->descricao,
        ]);
            return response()->json([
                "sucess" => true,
                "message" => "Carro cadastrado com sucesso",
                "data" => $carros

            ], 200);
    }
            public function procurarPorModelo(Request $request)
            {
                if (isset($request->modelo)) {

                }
            }

                public function editarCadastro(Request $request)
                {
                    $carros = CarrosModel::find($request->id);

                        if (!isset($carros)) {
                            return response()->json([
                                'status' => false,
                                'message' => "servico nao encontrado"
                            ]);
                        }
                }


}
