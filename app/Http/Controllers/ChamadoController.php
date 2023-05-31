<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\Log;
use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $obj = new Chamado();
            $chamados = $obj->all();

            $log = new Log();
            $log->criarLog(auth()->user()->id, "OK", $request);

            return [
                "status" => true,
                'data' => $chamados
            ];

        } catch (Exception $e) {

            $log = new Log();
            $log->criarLog(auth()->user()->id, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChamadoRequest $request)
    {
        try {
            
            $obj = new Chamado();
            $chamado = $obj->create($request->all());

            $log = new Log();
            $log->criarLog(auth()->user()->id, "OK", $request);

            return [
                'status' => 1,
                'data' => $chamado
            ];

        } catch (Exception $e){

            $log = new Log();
            $log->criarLog(auth()->user()->id, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chamado $chamado, Request $request)
    {
        try {

            $log = new Log();
            $log->criarLog(auth()->user()->id, "OK", $request);

            return [
                "status" => true,
                "data" => $chamado
            ];

        } catch (Exception $e){

            $log = new Log();
            $log->criarLog(auth()->user()->id, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChamadoRequest $request, Chamado $chamado)
    {
        try {
            $chamado->update($request->all());

            $log = new Log();
            $log->criarLog(auth()->user()->id, "OK", $request);

            return [
                "status" => true,
                "data" => $chamado
            ];

        } catch (Exception $e){

            $log = new Log();
            $log->criarLog(auth()->user()->id, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chamado $chamado, Request $request)
    {
        try {

            $chamado->delete();

            $log = new Log();
            $log->criarLog(auth()->user()->id, "OK", $request);

            return [
                "status" => true,
                "data" => $chamado
            ];

        } catch (Exception $e){

            $log = new Log();
            $log->criarLog(auth()->user()->id, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];

        }
        
    }
}
