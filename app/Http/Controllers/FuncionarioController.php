<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\Admin;
use App\Models\FuncionarioModel;

class FuncionarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('conta.minhaconta');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('conta.minhaconta');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;

        $validator = Validator::make(
            $request->all(),
            [
                'name'      => 'required',
                'email'     => 'required|email|unique:users,name,' . Auth::user()->id . '',
                'cpf'       => 'cpf',
                'cargo'     => 'required',
                'nascimento' => 'required|date',
                'cep'       => 'required',
                'rua'       => 'required',
                'bairro'    => 'required',
                'cidade'    => 'required',
                'estado'    => 'required',
            ],
            [
                'required'  => 'O :attribute é obrigatorio!',
                'emai'      => 'O :attribute não é valido!',
                'cpf'       => 'O :attribute não é valido!',
            ],
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {

            $funcionario = new FuncionarioModel;
            $funcionario->cpf       = $request->cpf;
            $funcionario->cargo     = $request->cargo;
            $funcionario->nascimento = $request->nascimento;
            $funcionario->cep       = $request->cep;
            $funcionario->rua       = $request->rua;
            $funcionario->bairro    = $request->bairro;
            $funcionario->cidade    = $request->cidade;
            $funcionario->estado    = $request->estado;
            $funcionario->user_id   = Auth::user()->id;
            $funcionario->save();

            return redirect()->back()->with('status', 'Cadastrado com sucesso!');
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line'      => $e->getLine(),
                    'string'      => $e->getTraceAsString(),
                ],
            ];

            return response()->json($json, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $usuario = FuncionarioModel::select('name', 'email', 'cpf', 'cargo', 'nascimento', 'cep', 'rua', 'bairro', 'cidade', 'estado')
                ->join('users', 'users.id', '=', 'user_id')
                ->where('user_id', $id)
                ->first();
            if (!isset($usuario)) {
                $usuario = User::find($id);
            }
            return view('conta.minhaconta', compact('usuario'));

        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line'      => $e->getLine(),
                    'string'      => $e->getTraceAsString(),
                ],
            ];

            return response()->json($json, 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function senha(Request $request)
    {
        $senha          = $request->input('senha');
        $confirmasenha  = $request->input('confirmasenha');
        $id             = Auth::user()->id;

        if ($senha == $confirmasenha) {
            $usuario = user::find($id);
            if (isset($usuario)) {
                $usuario->password = Hash::make($senha);
                $usuario->save();

                $retorno = array(
                    'mensagem'          => "sucesso!",
                    'sucesso'           => 0
                );
                return response(json_encode($retorno, 200));
            }
        } else {
            $retorno = array(
                'mensagem'          => "ERRO SENHAS DIFERENTES!",
                'sucesso'           => 1
            );
            return response(json_encode($retorno, 200));
        }
    }
}
