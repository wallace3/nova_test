<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;

class ProductsController extends Controller
{

    // FUNCTION TO GET ALL PRODUCTS FROM DATABASE
    public function index(){
        $products = Products::all()->toArray();
        return array_reverse($products);
    }

    // FUNCTION TO SAVE PRODUCT TO DATABASE
    public function store(Request $request){
        // NEW PRODUCT
        $product = new Products([
            'barcode' => $request->input('barcode'),
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'price' => $request->input('price'),
            'status' => $request->input('status')
        ]);

        // SAVE PRODUCT AND MANAGE ERRORS AND MESSAGES
        if($product->save()){
            return response()->json('Product Created Succesfully');
        }else{
            return response()->json('some error ocurred.');
        }
    }

    // FUNCTION TO GET PRODUC BY ID
    public function show($id)
    {
        if($product = Products::find($id)){
            return response()->json($product);
        }else{
            return response()->json('No data to display');
        }
    }

    // UPDATE PRODUCT
    public function update($id, Request $request)
    {
        if(!$product = Products::find($id)){
            return response()->json('product not found');
        }else{
            $product->update($request->all());
            return response()->json('Product updated!');
        }
    }

    // DELETE PRODUCT
    public function destroy($id)
    {
        $product = Products::find($id);
        $product->delete();
        return response()->json('Product Deleted!');
    }

}
