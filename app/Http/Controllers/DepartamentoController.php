<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use Exception;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obj = new Departamento();
            $departamentos = $obj->all();

            return [
                "status" => true,
                'data' => $departamentos
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
    public function store(StoreDepartamentoRequest $request)
    {
        try {
            
            $obj = new Departamento();
            $departamento = $obj->create($request->all());

            return [
                "status" => true,
                'data' => $departamento
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
    public function show(Departamento $departamento)
    {
        try {

            return [
                "status" => true,
                "data" => $departamento
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
    public function edit(Departamento $departamento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDepartamentoRequest $request, Departamento $departamento)
    {
        try {
            $departamento->update($request->all());

            return [
                "status" => true,
                "data" => $departamento
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
    public function destroy(Departamento $departamento)
    {
        try {

            $departamento->delete();

            return [
                "status" => true,
                "data" => $departamento
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];

        }
    }
}
