<?php

namespace App\Http\Controllers;

use App\API\ApiReturn;
use App\Models\Chat;
use App\Models\ChatUltimaConversa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    private $chat;

    public function __construct(Chat $chat)
    {
        $this->chat = $chat;
    }

    public function usuario_logado()
    {
        try {
            $registro = Auth::user();

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
            } else {
                return response()->json(ApiReturn::data('Registro enviado com sucesso.', 2000, null, $registro), 200);
            }
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function novas_conversas()
    {
        try {
            $registros = User
                ::join('professores', 'professores.id', 'users.professor_id')
                ->select('users.*')
                ->get();

            return response()->json(ApiReturn::data('Registros enviados com sucesso.', 2000, null, $registros), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function ultimas_conversas()
    {
        try {
            $registros = ChatUltimaConversa
                ::join('users', 'users.id', 'chats_ultimas_conversas.destinatario_user_id')
                ->join('professores', 'professores.id', 'users.professor_id')
                ->select('users.*', 'chats_ultimas_conversas.remetente_user_id', 'chats_ultimas_conversas.destinatario_user_id', 'chats_ultimas_conversas.mensagem', 'chats_ultimas_conversas.data_envio', 'chats_ultimas_conversas.hora_envio')
                ->where('chats_ultimas_conversas.remetente_user_id', Auth::user()->id)
                ->orderby('chats_ultimas_conversas.data_envio', 'DESC')
                ->orderby('chats_ultimas_conversas.hora_envio', 'DESC')
                ->get();

            $ind = 0;
            foreach ($registros as $registro) {
                $qtd_msg_nao_lida = Chat
                    ::where('remetente_user_id', $registro['destinatario_user_id'])
                    ->where('destinatario_user_id', Auth::user()->id)
                    ->where('data_leitura', null)
                    ->count();

                $registros[$ind]['qtd_msg_nao_lida'] = $qtd_msg_nao_lida;

                $ind++;
            }

            return response()->json(ApiReturn::data('Registros enviados com sucesso.', 2000, null, $registros), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function conversas($remetente_user_id, $destinatario_user_id)
    {
        try {
            $registros = Chat
                ::select('chats.*')
                ->where(function ($query) use($remetente_user_id, $destinatario_user_id) {
                    $query->where('chats.remetente_user_id', $remetente_user_id)
                        ->where('chats.destinatario_user_id', $destinatario_user_id);
                })
                ->orWhere(function ($query) use($remetente_user_id, $destinatario_user_id) {
                    $query->where('chats.remetente_user_id', $destinatario_user_id)
                        ->where('chats.destinatario_user_id', $remetente_user_id);
                })->get();

            return response()->json(ApiReturn::data('Registros enviados com sucesso.', 2000, null, $registros), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function enviar_mensagem(Request $request)
    {
        try {
            //Dados no Request
            $request['data_envio'] = date('Y-m-d');
            $request['hora_envio'] = date('H:i:s');

            //Incluindo registro
            $registro = $this->chat->create($request->all());

            //Incluir/Alterar na tabela chats_ultimas_conversas (para o Remetente)
            ChatUltimaConversa::updateOrCreate(
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

            //Incluir/Alterar na tabela chats_ultimas_conversas (para o Destinatario)
            ChatUltimaConversa::updateOrCreate(
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

            return response()->json(ApiReturn::data('Registro criado com sucesso.', 2010, null, null), 201);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function gravar_como_lida(Request $request, $id)
    {
        try {
            $registro = $this->chat->find($id);

            if (!$registro) {
                return response()->json(ApiReturn::data('Registro não encontrado.', 4040, null, null), 404);
            } else {
                //Acertar Request
                $request['data_leitura'] = date('Y-m-d');
                $request['hora_leitura'] = date('H:i:s');

                //Alterando registro
                $registro->update($request->all());

                return response()->json(ApiReturn::data('Registro atualizado com sucesso.', 2000, null, $registro), 200);
            }
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }

    public function gravar_como_recebidas(Request $request)
    {
        try {
            //Acertar Request
            $request['data_recebimento'] = date('Y-m-d');
            $request['hora_recebimento'] = date('H:i:s');

            //Alterando registros
            Chat::where('destinatario_user_id', Auth::user()->id)->update($request->all());

            return response()->json(ApiReturn::data('Registros atualizados com sucesso.', 2000, null, []), 200);
        } catch (\Exception $e) {
            if (config('app.debug')) {
                return response()->json(ApiReturn::data($e->getMessage(), 5000, null, null), 500);
            }

            return response()->json(ApiReturn::data('Houve um erro ao realizar a operação.', 5000, null, null), 500);
        }
    }
}
