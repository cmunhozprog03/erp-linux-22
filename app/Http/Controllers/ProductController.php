<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function save(Request $request)
    {
        
        // $validator = Validator::make($request->all(), [
        //     'product_name' => 'required|string|unique:peoducts',
        //     'peoduct_image' => 'required|image'
        // ]);

        $validator = $request->all([
            'product_name' => 'required|string|unique:peoducts',
            'peoduct_image' => 'required|image'
        ]);
        
        if($validator->passes()){
            return response()->json(['code' => 0, 'error' => $validator->errors()->toArray()]);
        } else {

        }

        
    }
}
