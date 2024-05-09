<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
use App\Models\Vehicle;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    //
    public function index(){
        $data = Order::all();

        return response()->json([
            'success' => true,
            'data' => $data,
        ],200);
    }

    public function indexView(Request $request){
        $user = $request->session()->get('user');
        $data = Order::where('user_id', $user->id)->get();

        return view('approve.approve')->with(['data'=>$data]);
    }

    public function store(Request $request){
        $input = [
            'vehicle_id' => $request->vehicle_id,
            'user_id' => $request->user_id,
            'driver' => $request->driver,
        ];
        $order = Order::create($input);

        return response()->json([
            'success' => true,
            'data' => $order,
        ],200);
    }

    public function show($id){
        $data = Order::find($id);

        return response()->json([
            'success' => true,
            'data' => $data,
        ],200);
    }

    public function update(Request $request, $id){
        $data = $request->all();
        $order = Order::find($id);
        $order->update($data);

        return response()->json([
            'success' => true,
            'data' => $order,
        ],200);
    }

    public function destroy($id){
        $order = Order::find($id);
        $order->delete();

        return response()->json([
            'success' => true,
            'data' => null,
        ],200);
    }

    public function orderInput(Request $request){
        $data = [
            'user_id' => $request->user_id,
            'vehicle_id' => $request->vehicle_id,
            'driver' => $request->driver
        ];
        Order::create($data);
        return redirect()->route('order.get');
    }

    public function orderView(){
        $approvers = User::where('role', 'approver')->get();
        $vehicles = Vehicle::all();
        return view('order.input')->with(['approvers'=>$approvers, 'vehicles'=>$vehicles]);
    }

    public function approved($id) {
        $order = Order::find($id);
        $order->approved = 1;
        $order->save();

        return redirect()->route('approve.index');
    }
}
