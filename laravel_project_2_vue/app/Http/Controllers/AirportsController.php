<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airports;

class AirportsController extends Controller
{
    public function index(){
        $airports = Airports::all()->toArray();
        return array_reverse($airports);
    }

    public function store(Request $request){

        $airports = new Airports([
            'code' => $request->input('code'),
            'name' => $request->input('name'),
            'city' => $request->input('city'),
        ]);

        if($airports->save()){
            return response()->json('Airports created');
        }else{
            return response()->json('some error ocurred.');
        }
    }

    public function show($id)
    {
        if(!$airports = Airports::find($id)){
            return response()->json('some error ocurred.');
        }

        return response()->json($airports);
    }

    public function update($id, Request $request)
    {


        if(!$airports = Airports::find($id)){
            return response()->json('not airport found');
        }

        $airports->update($request->all());
        return response()->json('Airports updated!');
    }

    public function destroy($id)
    {
        $airports = Airports::find($id);
        $airports->delete();
        return response()->json('Airports deleted!');
    }
}
