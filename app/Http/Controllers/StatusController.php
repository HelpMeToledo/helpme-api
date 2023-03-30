<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Exception;


class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {

            $obj = new Status();
            $status = $obj->all();

            return [
                "status" => true,
                'data' => $status
            ];

        } catch (Exception $e) {

            return [
                "status" => 0,
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
    public function store(StoreStatusRequest $request)
    {
        try {
            
            $obj = new Status();
            $status = $obj->create($request->all());

            return [
                "status" => true,
                'data' => $status
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Status $status)
    {
        try {

            return [
                "status" => 1,
                "data" => $status
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage(),
            ];

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStatusRequest $request, Status $status)
    {
        try {
            $status->update($request->all());

            return [
                "status" => 1,
                "data" => $status
            ];

        } catch (Exception $e){

            return [
                "status" => 0,
                "error" => $e->getMessage()
            ];
            
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        try {

            $status->delete();

            return [
                "status" => 1,
                "data" => $status
            ];

        } catch (Exception $e){

            return [
                "status" => false,
                "error" => $e->getMessage()
            ];

        }
    }
}
