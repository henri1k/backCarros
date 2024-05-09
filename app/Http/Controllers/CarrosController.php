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
                    return response()->json([
                        'status' => false,
                        'message' => "modelo nao encontrado"
                    ]);
                }
            }


            public function retornarTodos(Request $request)
            {
                $carros = CarrosModel::where('modelo', 'like', '%' . $request->modelo . '%')->get();

                    return response()->json([
                        'status' => true,
                        'data' => $carros
                    ]);
                
            }

                public function update(Request $request)
                {
                    $carros = CarrosModel::find($request->id);

                        if (!isset($carros)) {
                            return response()->json([
                                'status' => false,
                                'message' => "falha ao editar"
                            ]);
                        }


                        if (isset($request->modelo)) {
                            $carros->modelo = $request->modelo;
                        }
                        if (isset($request->ano)) {
                            $carros->ano = $request->ano;
                        }
                
                        if (isset($request->preco)) {
                            $carros->preco = $request->preco;
                        }
                
                        if (isset($request->marca)) {
                            $carros->marca = $request->marca;
                        }
                
                        if (isset($request->cor)) {
                            $carros->cor = $request->cor;
                        }
                        if (isset($request->peso)) {
                            $carros->peso = $request->peso;
                        }
                
                        if (isset($request->potencia)) {
                            $carros->potencia = $request->potencia;
                        }
                
                        if (isset($request->descricao)) {
                            $carros->descricao = $request->descricao;
                        }
                
                
                        $carros->update();


                        return response()->json([
                            'status' => true,
                            'message' => "Carro atualizado"
                        ]);
                    }

                        public function excluir($id)
                        {
                            $carros = CarrosModel::find($id);
                    
                            if (!isset($carros)) {
                                return response()->json([
                                    'status' => false,
                                    'message' => "Cadastro não encotrado"
                                ]);
                            }
                    
                            $carros->delete();
                    
                            return response()->json([
                                'status' => true,
                                'message' => "Cadastro excluido com sucesso"
                            ]);

                        
                }


}
