<?php

namespace App\Http\Controllers;


use App\Models\Administrador;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Middleware\Admin;
use App\Models\FuncionarioModel;
use App\Models\PontoModel;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware(Admin::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $usuarios = User::select('users.id as id', 'name', 'funcionario_models.id as fun_id', 'email', 'cpf', 'cargo', 'nascimento', 'cep')
                ->join('funcionario_models', 'users.id', '=', 'user_id')
                ->where('administrador', false)
                ->get();

            return view('usuarios.usuarios', compact('usuarios'));
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];
            return response()->json($json, 400);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            return view('usuarios.novo');
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];
            return response()->json($json, 400);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'cpf' => 'cpf',
                'cargo' => 'required',
                'nascimento' => 'required|date',
                'cep' => 'required',
                'rua' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'estado' => 'required',
            ],
            [
                'required' => 'O :attribute é obrigatorio!',
                'emai' => 'O :attribute não é valido!',
                'cpf' => 'O :attribute não é valido!',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $usuario = new User();
            $usuario->name = $request->name;
            $usuario->email = $request->email;
            $usuario->password = Hash::make('123456');
            $usuario->save();

            $funcionario = new FuncionarioModel();
            $funcionario->cpf = $request->cpf;
            $funcionario->cargo = $request->cargo;
            $funcionario->nascimento = $request->nascimento;
            $funcionario->cep = $request->cep;
            $funcionario->rua = $request->rua;
            $funcionario->bairro = $request->bairro;
            $funcionario->cidade = $request->cidade;
            $funcionario->estado = $request->estado;
            $funcionario->user_id = $usuario->id;
            $funcionario->admin_id = Auth::user()->id;
            $funcionario->save();

            return redirect()
                ->back()
                ->with('status', 'Cadastrado com sucesso!');
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'string' => $e->getTraceAsString(),
                ],
            ];

            return response()->json($json, 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $usuario = FuncionarioModel::select('user.id as id', 'user.name as name', 'admin.name as supe', 'user.email as email', 'cpf', 'cargo', 'nascimento', 'cep', 'rua', 'bairro', 'cidade', 'estado')
                ->leftJoin('users as user', 'user.id', '=', 'funcionario_models.user_id')
                ->leftJoin('users as admin', 'admin.id', '=', 'funcionario_models.admin_id')->find($id);

            $pontos = PontoModel::where('user_id', $usuario->id)->get();

            if (!$usuario) {
                return redirect()->back();
            }
            return view('usuarios.detalhes', compact('usuario', 'pontos'));
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];

            return response()->json($json, 400);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $usuario = User::select('users.id as id', 'funcionario_models.id as fun_id', 'name', 'email', 'cpf', 'cargo', 'nascimento', 'cep', 'rua', 'bairro', 'cidade', 'estado')
                ->join('funcionario_models', 'users.id', '=', 'user_id')
                ->where('administrador', false)->find($id);

            if (!$usuario) {
                return redirect()->back();
            }

            return view('usuarios.editar', compact('usuario'));
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];

            return response()->json($json, 400);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,name,' . $id . '',
                'cpf' => 'cpf',
                'cargo' => 'required',
                'nascimento' => 'required|date',
                'cep' => 'required',
                'rua' => 'required',
                'bairro' => 'required',
                'cidade' => 'required',
                'estado' => 'required',
            ],
            [
                'required' => 'O :attribute é obrigatorio!',
                'emai' => 'O :attribute não é valido!',
                'cpf' => 'O :attribute não é valido!',
            ],
        );

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $usuario = User::find($id);
            $usuario = $usuario->update($request->all());

            $funcionario_id = FuncionarioModel::select('id')->where('user_id', $id)->value('id');
            $funcionario = FuncionarioModel::findOrFail($funcionario_id);
            $funcionario = $funcionario->update($request->all());

            return redirect()
                ->back()
                ->with('status', 'Cadastrado com sucesso!');
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                    'line' => $e->getLine(),
                    'string' => $e->getTraceAsString(),
                ],
            ];

            return response()->json($json, 400);
        }
    }
    public function search(Request $request)
    {

        $query = "SELECT usuario.id as id, 
                        usuario.name as nome, 
                        funcionario.cargo as cargo,
                        admin.name as superior,
                        DATE_FORMAT(NOW(), '%Y-%m-%d') - DATE_FORMAT(nascimento, '%Y-%m-%d') AS idade,
                        ponto.data as data,
                        ponto.hora as hora
                    FROM ponto_models as ponto
                        inner join users as usuario on usuario.id = ponto.user_id
                        inner join funcionario_models as funcionario on funcionario.user_id = ponto.user_id
                        inner join users as admin on admin.id = funcionario.admin_id
                    WHERE admin.id = " . Auth::user()->id . " 
                        AND ponto.data 
                            BETWEEN DATE('" . $request->data_inicial . "') 
                            AND DATE('" . $request->data_final . "')";

        $data_inicial = $request->data_inicial;
        $data_final = $request->data_final;
        $usuarios = DB::SELECT($query);

        return view('usuarios.buscar', compact('usuarios','data_inicial', 'data_final'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();

            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $e->getCode(),
                    'message' => $e->getMessage(),
                ],
            ];

            return response()->json($json, 400);
        }
    }
}
