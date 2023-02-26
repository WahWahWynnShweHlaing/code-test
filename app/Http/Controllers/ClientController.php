<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    public function index()
    {
        return Client::paginate(10);
    }

    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'phone' => 'required',
                'email' => 'email|required',
                'address' => 'required'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }

        $user = new Client($request->all());

        $user->save();
        return response()->json('Client created!');
    }
    public function show($id)
    {
        $user = Client::find($id);
        return response()->json($user);
    }
    public function update($id, Request $request)
    {
        $user = Client::find($id);
        $user->update($request->all());
        return response()->json('Client updated!');
    }
    public function destroy($id)
    {
        $user = Client::find($id);
        $user->delete();
        return response()->json('Client deleted!');
    }
}
