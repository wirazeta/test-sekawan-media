<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsageHistory;

class UsageHistories extends Controller
{
    //
    public function index(){
        $data = UsageHistory::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }

    public function store(Request $request){
        $input = [
            'vehicle_id' => $request->vehicle_id,
            'order_id' => $request->order_id,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ];
        $data = UsageHistory::create($input);

        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }

    public function show($id) {
        $data = UsageHistory::find($id);

        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }

    public function update(Request $request, $id){
        $data = UsageHistory::find($id);
        $data->update($request->all());

        return response()->json([
            'success' => true,
            'data' => $data
        ],200);
    }
}
