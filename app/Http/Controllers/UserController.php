<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Exception;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
            $success['name'] =  $user->name;


            return [
                "status" => true,
                'data' => $success
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
    public function show(User $usuario)
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
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $usuario)
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
    public function destroy(User $usuario)
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

    public function login(LoginRequest $request){

        $input= $request->all();
        
        
        $credenciais = [
            "email" => $input["email"],
            "password" => $input["password"]
        ];

        try {

            if (auth()->attempt($credenciais)) {
                $token = auth()->user()->createToken('HelpMeAPI')->accessToken;
                return response()->json(['token' => $token], 200);
            } else {
                return response()->json(['dados'=> $request, 'error' => 'Unauthorised'], 401);
            }

        } catch (Exception $e){

            return response()->json(['dados'=> $request, 'error' => $e->getMessage()], 404);
        }
        
    }

    public function logout(Request $request){
        
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

    }

