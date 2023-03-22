<?php

namespace App\Http\Controllers;

use App\Models\FecharChamado;
use App\Http\Requests\StoreFecharChamadoRequest;
use App\Http\Requests\UpdateFecharChamadoRequest;

class FecharChamadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obj = new FecharChamado();
            $fecharChamados = $obj->all();

            return [
                "status" => true,
                'data' => $fecharChamados
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
    public function store(StoreFecharChamadoRequest $request)
    {
        try {
            
            $obj = new FecharChamado();
            $fecharChamado = $obj->create($request->all());

            return [
                "status" => true,
                'data' => $fecharChamado
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
    public function show(FecharChamado $fecharChamado)
    {
        try {

            return [
                "status" => true,
                "data" => $fecharChamado
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
    public function edit(FecharChamado $fecharChamado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFecharChamadoRequest $request, FecharChamado $fecharChamado)
    {
        try {
            $fecharChamado->update($request->all());

            return [
                "status" => true,
                "data" => $fecharChamado
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
    public function destroy(FecharChamado $fecharChamado)
    {
        try {

            $fecharChamado->delete();

            return [
                "status" => true,
                "data" => $fecharChamado
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];

        }
    }
}
