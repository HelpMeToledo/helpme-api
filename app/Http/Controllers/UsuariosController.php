<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Http\Requests\StoreUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obj = new Usuarios();
            $usuarios = $obj->all();

            return [
                "status" => true,
                'data' => $usuarios
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
    public function store(StoreUsuariosRequest $request)
    {
        try {
            
            $obj = new Usuarios();
            $usuario = $obj->create($request->all());

            return [
                "status" => true,
                'data' => $usuario
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
    public function show(Usuarios $usuario)
    {
        try {

            return [
                "status" => true,
                "data" => $usuario
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
    public function edit(Usuarios $usuarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuariosRequest $request, Usuarios $usuario)
    {
        try {
            $usuario->update($request->all());

            return [
                "status" => true,
                "data" => $usuario
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
    public function destroy(Usuarios $usuario)
    {
        try {

            $usuario->delete();

            return [
                "status" => true,
                "data" => $usuario
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];

        }
    }
}
