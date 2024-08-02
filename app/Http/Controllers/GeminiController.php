<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GeminiController extends Controller
{
    public function callGemi(Request $request){
        try {
            $validate_text = Validator::make($request->all(),[
                'text'=>"required"
            ]);

            if($validate_text->fails()){
            return response()->json(['status'=>false, 'message'=>$validate_text->errors()->first('text')], 400);
            }
            // dd($request->post('text'));
            return response()->json([
                'text' => executeGemi($request->post('text'))
            ], 200);
        } catch (\Exception $th) {
            return response()->json(['status'=>false, 'error'=>$th->getMessage()], 500);
        }
    }
}