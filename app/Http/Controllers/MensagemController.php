<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MensagemController extends Controller
{
    public function index()
    {
        try {
            $data = array();

            $data['usuario_logado'] = Auth::user();

            $data['novas_conversas'] = User::join('professores', 'professores.id', 'users.professor_id')->select('users.*')->get();

            return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $data), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }





//    public function show($id)
//    {
//        try {
//            $registro = $this->mensagem->find($id);
//
//            if (!$registro) {
//                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, []), 404);
//            } else {
//                return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $registro), 200);
//            }
//        } catch (\Exception $e) {
//            if (config('app.debug')) {
//                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
//            }
//
//            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
//        }
//    }
//
//    public function store(MensagemStoreRequest $request)
//    {
//        try {
//            //Incluindo registro
//            $this->mensagem->create($request->all());
//
//            return response()->json(ApiReturn::data('Registro criado com sucesso.', 2010, null, null), 201);
//        } catch (\Exception $e) {
//            if (config('app.debug')) {
//                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
//            }
//
//            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
//        }
//    }
//
//    public function update(MensagemUpdateRequest $request, $id)
//    {
//        try {
//            $registro = $this->mensagem->find($id);
//
//            if (!$registro) {
//                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
//            } else {
//                //Alterando registro
//                $registro->update($request->all());
//
//                return response()->json(ApiReturn::data('Registro atualizado com sucesso.', 2000, null, $registro), 200);
//            }
//        } catch (\Exception $e) {
//            if (config('app.debug')) {
//                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
//            }
//
//            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
//        }
//    }
//
//    public function destroy($id)
//    {
//        try {
//            $registro = $this->mensagem->find($id);
//
//            if (!$registro) {
//                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, $registro), 404);
//            } else {
//                //Verificar Relacionamentos'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
//                //Tabela Alunos
//                $qtd = DB::table('alunos')->where('mensagem_id', $id)->count();
//
//                if ($qtd > 0) {
//                    return response()->json(ApiReturn::data('Náo é possível excluir. Registro relacionado com Alunos.', 2040, null, null), 200);
//                }
//
//                //Tabela Funcionários
//                $qtd = DB::table('funcionarios')->where('mensagem_id', $id)->count();
//
//                if ($qtd > 0) {
//                    return response()->json(ApiReturn::data('Náo é possível excluir. Registro relacionado com Funcionários.', 2040, null, null), 200);
//                }
//
//                //Tabela Professores
//                $qtd = DB::table('professores')->where('mensagem_id', $id)->count();
//
//                if ($qtd > 0) {
//                    return response()->json(ApiReturn::data('Náo é possível excluir. Registro relacionado com Professores.', 2040, null, null), 200);
//                }
//                //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
//
//                //Deletar'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
//                $registro->delete();
//
//                return response()->json(ApiReturn::data('Registro excluído com sucesso.', 2000, null, null), 200);
//                //''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
//            }
//        } catch (\Exception $e) {
//            if (config('app.debug')) {
//                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
//            }
//
//            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
//        }
//    }
//
//    public function search($field, $value)
//    {
//        $registros = $this->mensagem->where($field, 'like', '%'.$value.'%')->get();
//
//        return response()->json(ApiReturn::data('Lista de dados enviada com sucesso.', 2000, '', $registros), 200);
//    }
//
//    public function research($fieldSearch, $fieldValue, $fieldReturn)
//    {
//        $registros = $this->mensagem->where($fieldSearch, 'like', '%' . $fieldValue . '%')->get($fieldReturn);
//
//        return response()->json(ApiReturn::data('', 2000, '', $registros), 200);
//    }





}
