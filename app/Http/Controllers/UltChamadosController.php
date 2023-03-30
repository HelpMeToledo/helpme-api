<?php

namespace App\Http\Controllers;

use App\Models\UltChamados;
use App\Http\Requests\StoreUltChamadosRequest;
use App\Http\Requests\UpdateUltChamadosRequest;
use Exception;


class UltChamadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obj = new UltChamados();
            $ultChamados = $obj->all();

            return [
                "status" => true,
                'data' => $ultChamados
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
    public function store(StoreUltChamadosRequest $request)
    {
        try {
            
            $obj = new UltChamados();
            $ultChamado = $obj->create($request->all());

            return [
                "status" => true,
                'data' => $ultChamado
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
    public function show(UltChamados $ultChamados)
    {
        try {

            return [
                "status" => true,
                "data" => $ultChamados
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
    public function edit(UltChamados $ultChamados)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUltChamadosRequest $request, UltChamados $ultChamado)
    {
        try {
            $ultChamado->update($request->all());

            return [
                "status" => true,
                "data" => $ultChamado
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
    public function destroy(UltChamados $ultChamado)
    {
        try {

            $ultChamado->delete();

            return [
                "status" => true,
                "data" => $ultChamado
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];

        }
    }
}
