<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Log;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Throwable;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $log = new Log();
            $log->criarLog(null, "OK", $request);

            $obj = new User();
            $User = $obj->all();

            return [
                "status" => true,
                'data' => $User
            ];
        } catch (Exception $e) {

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        try {

            $obj = new User();

            $input = $request->all();
            $input['password'] = bcrypt($input['password']);

            $user = $obj->create($input);

            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['name'] =  $user->nome;
            
            $log = new Log();
            $log->criarLog(null, "OK", $request);

            return [
                "status" => true,
                'data' => $user
            ];

        } catch (Exception $e) {

            $log = new Log();
            $log->criarLog(null, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage(),
            ];
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuario, Request $request)
    {
        try {

            $log = new Log();
            $log->criarLog(null, "OK", $request);

            return [
                "status" => true,
                "data" => $usuario
            ];

        } catch (Exception  $e) {
            return [
                "status" => false,
                "error" => $e->getMessage()
            ];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $usuario)
    {
        
        try {

            $log = new Log();
            $log->criarLog(null, "OK", $request);

            $usuario->update($request->all());

            return [
                "status" => true,
                "data" => $usuario
            ];
        } catch (Exception $e) {

            $log = new Log();
            $log->criarLog(null, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $usuario, Request $request)
    {
        try {

            $log = new Log();
            $log->criarLog(null, "OK", $request);
            $usuario->delete();

            return [
                "status" => true,
                "data" => $usuario
            ];

        } catch (Exception $e) {

            $log = new Log();
            $log->criarLog(null, "Erro", $request);

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];
        } 
        
    }

    public function login(LoginRequest $request)
    {

        $input = $request->all();

        $credenciais = [
            "email" => $input["email"],
            "password" => $input["password"]
        ];

        try {

            if (auth()->attempt($credenciais)) {

                $usuario = auth()->user();
                $token = $usuario->createToken('HelpMeAPI')->accessToken;

                $input["situacao"] = $usuario->id;

                $log = new Log();
                $log->criarLog($usuario->id, "OK", $request);

                return [
                    "status" => true,
                    'usuario' => $usuario,
                    'token' => $token
                ];

            } else {

                $log = new Log();
                $log->criarLog(null, "Não autorizado", $request);

                return [
                    "status" => false,
                    'error' => 'Não autorizado'
                ];
            }

        } catch (Exception $e) {

            $log = new Log();
            $log->criarLog(null, "Erro", $request);

            return [
                "status" => false,
                'error' => $e->getMessage()
            ];
        }
    }

    public function logout(Request $request)
    {
        if (auth()->check()) {
            auth()->user()->token()->revoke();

            $log = new Log();
            $log->criarLog(null, "OK", $request);

            return response()->json(['success' => 'logout_success'], 200);
        } else {
            $log = new Log();
            $log->criarLog(null, "Erro", $request);
            return response()->json(['error' => 'api.something_went_wrong'], 500);
        }
    }
}
