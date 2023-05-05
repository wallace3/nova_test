<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index (){
        $categories = Categories::all()->toArray();
        return array_reverse($categories);
    }

    // FUNCTION TO SAVE CATEGORY TO DATABASE
    public function store(Request $request){
        // NEW CATEGORY
        $category = new Categories([
            'name' => $request->input('name'),
            'status' => $request->input('status'),
        ]);

        // SAVE CATEGORY AND MANAGE ERRORS AND MESSAGES
        if($category->save()){
            return response()->json('Category Created Succesfully');
        }else{
            return response()->json('some error ocurred.');
        }
    }

    // FUNCTION TO GET CATEGORY BY ID
    public function show($id)
    {
        if($category = Categories::find($id)){
            return response()->json($category);
        }else{
            return response()->json('No data to display');
        }
    }

     // UPDATE CATEGORY
    public function update($id, Request $request)
    {
        if(!$category = Categories::find($id)){
            return response()->json('category not found');
        }else{
            $category->update($request->all());
            return response()->json('Category updated!');
        }
    }

    // DELETE CATEGORY
    public function destroy($id)
    {
        $category = Categories::find($id);
        $category->delete();
        return response()->json('category Deleted!');
    }
}
