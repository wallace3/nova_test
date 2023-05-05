<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Airlines;

class AirlinesController extends Controller
{
    public function index(){
        $airlines = Airlines::all()->toArray();
        return array_reverse($airlines);
    }

    public function store(Request $request){
        $airlines = new Airlines([
            'code' => $request->input('code'),
            'name' => $request->input('name')
        ]);

        if($airlines->save()){
            return response()->json('Airlines created');
        }else{
            return response()->json('some error ocurred.');
        }
    }

    public function show($id)
    {
        if($airlines = Airlines::find($id)){
            return response()->json($airlines);
        }else{
            return response()->json('No data to display');
        }
    }

    public function update($id, Request $request)
    {
        if(!$airlines = Airlines::find($id)){
            return response()->json('airline not found');
        }else{
            $airlines->update($request->all());
            return response()->json('Airlines updated!');
        }
    }

    public function destroy($id)
    {
        $airlines = Airlines::find($id);
        $airlines->delete();
        return response()->json('Airlines deleted!');
    }
}
