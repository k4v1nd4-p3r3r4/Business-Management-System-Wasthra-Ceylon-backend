<?php

namespace App\Http\Controllers;
use App\Models\RawMaterials;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RawmaterialsController extends Controller
{
    public function index(){

        $materials = RawMaterials::all();

        

            if($materials->count() > 0){
                return response() ->json([
                    'status' => '200',
                    'materials' => $materials
                ],200);
            }else{
                return response() ->json([
                    'status' => '404',
                    'message' => 'No records found'
                ],404);
            }
       
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[

            'category' =>'required|string|max:191',
            'date' =>'required|date',
            'qty' =>'required|string|max:5',
            'unit' =>'required|string|max:10',

        ]);

        if($validator->fails()){
            return response() ->json([
              'status' => '422',
              'errors' => $validator->messages()
            ],422);
        }
        else{
            $materials = RawMaterials::create([
                'category' => $request->category,
                'date' => $request->date,
                'qty' => $request->qty,
                'unit' => $request->unit,
            ]);
            if($materials){

                return response() ->json([
                  'status' => '200',
                  'message' => ' Added successfully',
                  
                ],200);
            }
            else{
                return response() ->json([
                 'status' => '500',
                  'message' => 'Somthing went wrong!'
                ],500);
            }
        }
    }

    public function show($id){

        $rawmaterials = RawMaterials::find($id);

        if($rawmaterials){
            return response() ->json([
                'status' => '200',
                'rawmaterials' =>  $rawmaterials,
                
              ],200);
        }
        else{
            return response() ->json([
                'status' => '404',
                  'message' => "No such data found!"
              ],404);
        }
    }

    public function edit( $id){
        $rawmaterials = RawMaterials::find($id);

        if($rawmaterials){
            return response() ->json([
               'status' => '200',
                'rawmaterials' =>  $rawmaterials,
                
              ],200);
        }
        else{
            return response() ->json([
               'status' => '404',
                 'message' => "No such data found!"
              ],404);
        }
    
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(),[

            'category' =>'required|string|max:191',
            'date' =>'required|date',
            'qty' =>'required|string|max:5',
            'unit' =>'required|string|max:10',

        ]);

        if($validator->fails()){
            return response() ->json([
              'status' => '422',
              'message' => $validator->messages()
            ],422);
        }
        else{
            $materials = RawMaterials::find($id);
          
            if($materials){

                $materials ->update([
                    'category' => $request->category,
                    'date' => $request->date,
                    'qty' => $request->qty,
                    'unit' => $request->unit,
                ]);
                return response() ->json([
                  'status' => '200',
                  'message' => ' Updated successfully',
                  
                ],200);
            }
            else{
                return response() ->json([
                 'status' => '404',
                  'message' => 'No such data found!'
                ],404);
            }
        }
    }

    public function destroy($id){

        $materials = RawMaterials::find($id);

        if($materials){
            $materials ->delete();
            return response() ->json([
             'status' => '200',
             'message' =>'Deleted successfully',
                
              ],200);
        }
        else{
            return response() ->json([
            'status' => '404',
              'message' => "No such data found!"
              ],404);
        }
    }

}
