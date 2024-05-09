<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    //
    public function index(){
        $data = Vehicle::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }

    public function store (Request $request){
        $input = [
            'name' => $request->name,
            'bbm_consumption' => $request->bbm_consumption,
            'service_time' => $request->service_time
        ];
        $data = Vehicle::create($input);

        return response()->json([
            'success' => true,
            'data' => $data
        ],201);
    }

    public function show($id){
        $data = Vehicle::find($id);

        if(is_null($data)){
            return response()->json([
                'success' => false,
                'message' => 'Data not found',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ], 200);
    }
}
