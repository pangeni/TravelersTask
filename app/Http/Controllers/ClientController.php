<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Http\Controllers\Validator;

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
        // $validator = Validator::make($request->all() ,
        // [
        //     'name' => 'required|String',
        //     'email' => 'required|email',
        //     'number' => 'required|digits',
        // ]);
        // if($validator->fails()){
        //     return response()->json(
        //         [
        //             'status' => 422,
        //             'eroors' => validator->messages()
        //         ],
        //     422);
        // }
        // else {
            $client = Client::create([
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
            ]);

            if($client){
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
        // }
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
                'message' => "Problem while Showing Client Info"
            ],404);
        }

    }

    public function edit($id)
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
                'message' => "Problem while Editing client"
            ],404);
        }
    }

    public function update (Request $request, int $id)
    {
        // $validator = Validator::make($request->all(), [
        //     'name' => 'required|String',
        //     'email' => 'required|email',
        //     'number' => 'required|digits:10',
        // ]);
        // if($validator->fails()){
        //     return response()->json(
        //         [
        //             'status' => 422,
        //             'eroors' => validator->messages()
        //         ],
        //     422);
        // }
        // else {
            $client = Client::find($id);

            if($client){
                $client->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'number' => $request->number,
                ]);

                return response()->json([
                    'status' => 200,
                    'message' => "Client Updated successfully"
                ],200);
            } else{
                return response()->json([
                    'status' => 404,
                    'message' => "Problem while Updating Client"
                ],404);
            }
        // }
    }

    public function destroy ($id) {
        $client = Client::find($id);

        if($client) {
            $client->delete();
            return response()->json([
                'status' => 200,
                'message' => "Sucessfully deleted"
            ],404);

        } else{
            return response()->json([
                'status' => 404,
                'message' => "Problem while Deleting Client"
            ],404);
        }
    }


}
