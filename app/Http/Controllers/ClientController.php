<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
    public function index ()
    {
        $client = Client::all();
        $data = [
            'status' => 200,
            'client' => $client
        ];
        return response()->json($data, 200);
        
    }

    public function store (Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|String',
            'email' => 'required|email',
            'number' => 'required|digits:10',
        ]);
        if($validator->fails()){
            return response()->json(
                [
                    'status' => 422,
                    'eroors' => validator->messages()
                ],
            422);
        }
        else {
            $client = Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
            ]);

            if($students){
                return response()->json([
                    'status' => 200,
                    'message' => "Client Created successfully"
                ],200);
            } else{
                return response()->json([
                    'status' => 500,
                    'message' => "Problem while creating Client"
                ],500);
            }
        }
    }

    public function show($id)
    {
        $client = Client::find($id);
        if($client){
            return response()->json([
                'status' => 200,
                'client' => $client
            ],200);
        }else {
            return response()->json([
                'status' => 404,
                'message' => "Problem while creating Client"
            ],404);
        }
        

    }
}
