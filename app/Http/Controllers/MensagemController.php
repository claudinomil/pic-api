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

            //Gravar Mensagem como lidas - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Gravar Mensagem como lidas - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            if ($request['opcao'] == 2) {
                //Dados
                $leitura = array();
                $leitura['data_leitura'] = date('Y-m-d');
                $leitura['hora_leitura'] = date('H:i:s');

                //Alterando registros
                Mensagem::where('data_leitura', null)->where('destinatario_user_id', $request['remetente_user_id'])->update($leitura);
            }
            //Gravar Mensagem como lidas - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Gravar Mensagem como lidas - Fim''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''

            //Gravar Mensagem como recebidas - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            //Gravar Mensagem como recebidas - Início'''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''''
            $recebimento = array();
            $recebimento['data_recebimento'] = date('Y-m-d');
            $recebimento['hora_recebimento'] = date('H:i:s');

            //Alterando registros
            Mensagem::where('data_recebimento', null)->where('destinatario_user_id', Auth::user()->id)->update($recebimento);
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
}
