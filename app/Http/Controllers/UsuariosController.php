<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Http\Requests\StoreUsuariosRequest;
use App\Http\Requests\UpdateUsuariosRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

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
        } catch (Exception $e) {

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
        } catch (Exception $e) {

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
        } catch (Exception $e) {

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
        } catch (Exception $e) {

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];
        }
    }

    public function login(Request $request)
    {

        $input = $request->only('email', 'senha');

        $validator = Validator::make($input, [
            'email' => 'required',
            'senha' => 'required',
        ]);

        try {
            // this authenticates the user details with the database and generates a token
            if (!$token = JWTAuth::attempt($input)) {
                return $this->sendError([], "invalid login credentials", 400);
            }
        } catch (JWTException $e) {
            return $this->sendError([], $e->getMessage(), 500);
        }

        return [
            'status' => true,
            'token' => $token
        ];
    }
}
