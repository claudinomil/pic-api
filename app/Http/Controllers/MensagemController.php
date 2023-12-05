<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Models\Mensagem;
use App\Models\MensagemUltimaConversa;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function atualizar(Request $request)
    {
        try {
            //Gravar Mensagem e MensagemUltimaConversa - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Gravar Mensagem e MensagemUltimaConversa - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            if ($request['opcao'] == 1) {
                //Dados no Request
                $request['data_envio'] = date('Y-m-d');
                $request['hora_envio'] = date('H:i:s');

                //Incluindo registro
                $registro = Mensagem::create($request->all());

                //Incluir/Alterar na tabela mensagens_ultimas_conversas (para o Remetente)
                MensagemUltimaConversa::updateOrCreate(
                    [
                        'remetente_user_id' => $request['remetente_user_id'],
                        'destinatario_user_id' => $request['destinatario_user_id']
                    ],
                    [
                        'mensagem' => $request['mensagem'],
                        'data_envio' => $request['data_envio'],
                        'hora_envio' => $request['hora_envio']
                    ]
                );

                //Incluir/Alterar na tabela mensagens_ultimas_conversas (para o Destinatario)
                MensagemUltimaConversa::updateOrCreate(
                    [
                        'remetente_user_id' => $request['destinatario_user_id'],
                        'destinatario_user_id' => $request['remetente_user_id']
                    ],
                    [
                        'mensagem' => $request['mensagem'],
                        'data_envio' => $request['data_envio'],
                        'hora_envio' => $request['hora_envio']
                    ]
                );
            }
            //Gravar Mensagem e MensagemUltimaConversa - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Gravar Mensagem e MensagemUltimaConversa - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //Gravar Mensagem como recebidas - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Gravar Mensagem como recebidas - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            if ($request['opcao'] == 2) {
                //Dados
                $recebimento = array();
                $recebimento['data_recebimento'] = date('Y-m-d');
                $recebimento['hora_recebimento'] = date('H:i:s');

                //Alterando registros
                Mensagem::where('data_recebimento', null)->where('destinatario_user_id', $request['remetente_user_id'])->update($recebimento);
            }
            //Gravar Mensagem como recebidas - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Gravar Mensagem como recebidas - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //Retorno de dados - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Retorno de dados - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            $data = array();

            //Usuário Logado
            $data['usuario_logado'] = Auth::user();

            //Novas Conversas
            $data['novas_conversas'] = User::join('professores', 'professores.id', 'users.professor_id')->select('users.*')->get();

            //Últimas Conversas
            $registros = MensagemUltimaConversa
                ::join('users', 'users.id', 'mensagens_ultimas_conversas.destinatario_user_id')
                ->join('professores', 'professores.id', 'users.professor_id')
                ->select('users.*', 'mensagens_ultimas_conversas.remetente_user_id', 'mensagens_ultimas_conversas.destinatario_user_id', 'mensagens_ultimas_conversas.mensagem', 'mensagens_ultimas_conversas.data_envio', 'mensagens_ultimas_conversas.hora_envio')
                ->where('mensagens_ultimas_conversas.remetente_user_id', Auth::user()->id)
                ->orderby('mensagens_ultimas_conversas.data_envio', 'DESC')
                ->orderby('mensagens_ultimas_conversas.hora_envio', 'DESC')
                ->get();

            $ind = 0;
            foreach ($registros as $registro) {
                $qtd_msg_nao_lida = Mensagem
                    ::where('remetente_user_id', $registro['destinatario_user_id'])
                    ->where('destinatario_user_id', Auth::user()->id)
                    ->where('data_leitura', null)
                    ->count();

                $registros[$ind]['qtd_msg_nao_lida'] = $qtd_msg_nao_lida;

                $ind++;
            }

            $data['ultimas_conversas'] = $registros;

            //Conversas
            $registros = Mensagem
                ::select('mensagens.*')
                ->where(function ($query) use ($request) {
                    $query->where('mensagens.remetente_user_id', $request['remetente_user_id'])
                        ->where('mensagens.destinatario_user_id', $request['destinatario_user_id']);
                })
                ->orWhere(function ($query) use ($request) {
                    $query->where('mensagens.remetente_user_id', $request['destinatario_user_id'])
                        ->where('mensagens.destinatario_user_id', $request['remetente_user_id']);
                })->get();

            $data['conversas'] = $registros;
            //Retorno de dados - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Retorno de dados - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            return response()->json(ApiReturn::data('Registro criado com sucesso.', 2000, null, $data), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }












//    public function ultimas_conversas()
//    {
//        try {
//            $registros = MensagemUltimaConversa
//                ::join('users', 'users.id', 'mensagens_ultimas_conversas.destinatario_user_id')
//                ->join('professores', 'professores.id', 'users.professor_id')
//                ->select('users.*', 'mensagens_ultimas_conversas.remetente_user_id', 'mensagens_ultimas_conversas.destinatario_user_id', 'mensagens_ultimas_conversas.mensagem', 'mensagens_ultimas_conversas.data_envio', 'mensagens_ultimas_conversas.hora_envio')
//                ->where('mensagens_ultimas_conversas.remetente_user_id', Auth::user()->id)
//                ->orderby('mensagens_ultimas_conversas.data_envio', 'DESC')
//                ->orderby('mensagens_ultimas_conversas.hora_envio', 'DESC')
//                ->get();
//
//            $ind = 0;
//            foreach ($registros as $registro) {
//                $qtd_msg_nao_lida = Mensagem
//                    ::where('remetente_user_id', $registro['destinatario_user_id'])
//                    ->where('destinatario_user_id', Auth::user()->id)
//                    ->where('data_leitura', null)
//                    ->count();
//
//                $registros[$ind]['qtd_msg_nao_lida'] = $qtd_msg_nao_lida;
//
//                $ind++;
//            }
//
//            return response()->json(ApiReturn::data('Registros enviados com sucesso.', 2000, null, $registros), 200);
//        } catch (\Exception $e) {
//            if (config('app.debug')) {
//                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
//            }
//
//            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
//        }
//    }
//
//    public function enviar_mensagem(Request $request)
//    {
//        try {
//            //Dados no Request
//            $request['data_envio'] = date('Y-m-d');
//            $request['hora_envio'] = date('H:i:s');
//
//            //Incluindo registro
//            $registro = Mensagem::create($request->all());
//
//            //Incluir/Alterar na tabela mensagens_ultimas_conversas (para o Remetente)
//            MensagemUltimaConversa::updateOrCreate(
//                [
//                    'remetente_user_id' => $request['remetente_user_id'],
//                    'destinatario_user_id' => $request['destinatario_user_id']
//                ],
//                [
//                    'mensagem' => $request['mensagem'],
//                    'data_envio' => $request['data_envio'],
//                    'hora_envio' => $request['hora_envio']
//                ]
//            );
//
//            //Incluir/Alterar na tabela mensagens_ultimas_conversas (para o Destinatario)
//            MensagemUltimaConversa::updateOrCreate(
//                [
//                    'remetente_user_id' => $request['destinatario_user_id'],
//                    'destinatario_user_id' => $request['remetente_user_id']
//                ],
//                [
//                    'mensagem' => $request['mensagem'],
//                    'data_envio' => $request['data_envio'],
//                    'hora_envio' => $request['hora_envio']
//                ]
//            );
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

//    public function conversas($remetente_user_id, $destinatario_user_id)
//    {
//        try {
//            $registros = Mensagem
//                ::select('mensagens.*')
//                ->where(function ($query) use($remetente_user_id, $destinatario_user_id) {
//                    $query->where('mensagens.remetente_user_id', $remetente_user_id)
//                        ->where('mensagens.destinatario_user_id', $destinatario_user_id);
//                })
//                ->orWhere(function ($query) use($remetente_user_id, $destinatario_user_id) {
//                    $query->where('mensagens.remetente_user_id', $destinatario_user_id)
//                        ->where('mensagens.destinatario_user_id', $remetente_user_id);
//                })->get();
//
//            return response()->json(ApiReturn::data('Registros enviados com sucesso.', 2000, null, $registros), 200);
//        } catch (\Exception $e) {
//            if (config('app.debug')) {
//                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
//            }
//
//            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
//        }
//    }












}
