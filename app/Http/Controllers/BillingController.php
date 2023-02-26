<?php

namespace App\Http\Controllers;

use App\Models\Billing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BillingController extends Controller
{
    public function index()
    {
        $billing = Billing::orderBy('id','desc')->paginate(10);

        return view('billing.index', compact('billing'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'amount' => 'required|integer',
                'due_date' => 'date_format:Y-m-d',
                'client_id' => 'required|integer',
                'description' => 'required'
            ]
        );

        if ($validator->fails()) {

            return response()->json(['errors' => $validator->errors()]);
        }
        $billing = new Billing($request->all());
        $billing->save();

        return response()->json('billing created!');
    }
    public function show($id)
    {
        $billing = Billing::find($id);
        return response()->json($billing);
    }
    public function update($id, Request $request)
    {
        $billing = Billing::find($id);
        $billing->update($request->all());
        return response()->json('billing updated!');
    }
    public function destroy($id)
    {
        $billing = Billing::find($id);
        $billing->delete();
        return response()->json('billing deleted!');
    }
}
