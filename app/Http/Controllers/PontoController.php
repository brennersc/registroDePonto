<?php

namespace App\Http\Controllers;

use App\Models\PontoModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Symfony\Component\HttpKernel\Exception\HttpException;

class PontoController extends Controller
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
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d/m/Y');
        $date = date('Y-m-d');
        $hora = date('H:i');

        try {

            $ponto = new PontoModel;
            $ponto->data     = $date;
            $ponto->hora     = $hora;
            $ponto->user_id  = Auth::user()->id;
            $ponto->save();

            $retorno = array(
                'mensagem'  => "sucesso!",
                'data'      => $data,
                'hora'      => $hora,
                'sucesso'   => 0
            );  
    
            return $retorno;

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
        //
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
}
