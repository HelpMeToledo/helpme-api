<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Http\Requests\StoreChamadoRequest;
use App\Http\Requests\UpdateChamadoRequest;
use Exception;

class ChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obj = new Chamado();
            $chamados = $obj->all();

            return [
                "status" => true,
                'data' => $chamados
            ];

        } catch (Exception $e) {

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreChamadoRequest $request)
    {
        try {
            
            $obj = new Chamado();
            $chamado = $obj->create($request->all());

            return [
                'status' => 1,
                'data' => $chamado
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Chamado $chamado)
    {
        try {

            return [
                "status" => true,
                "data" => $chamado
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chamado $chamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateChamadoRequest $request, Chamado $chamado)
    {
        try {
            $chamado->update($request->all());

            return [
                "status" => true,
                "data" => $chamado
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chamado $chamado)
    {
        try {

            $chamado->delete();

            return [
                "status" => true,
                "data" => $chamado
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];

        }
    }
}
