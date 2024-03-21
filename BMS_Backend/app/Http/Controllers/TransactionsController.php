<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Http\Requests\TransactionStoreRequest;

class TransactionsController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        
        return response()->json([
            'results'=>$transactions
        ],200);
    }

    public function store(TransactionStoreRequest $request)
    {
        try{
            Transaction::create([
                'Date' => $request->date,
                'Product' => $request->product,
                'Transactor' => $request->transactor,
                'Qty' => $request->qty,
                'Price' => $request->price,
                'Type' => $request->type,
            ]);

            return response()->json([
                'message'=>"Transaction Added"
            ],200);
        }catch(\Exception $e){
            return response()->json([
                'message' => 'Error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function show($id)
    {
        $transactions = Transaction::find($id);
       if(!$transactions){
         return response()->json([
            'message'=>'Transaction Not Found.'
         ],404);   
       }
       return response()->json([
        'transactions' => $transactions
        ],200);
    }

    public function update(TransactionStoreRequest $request, $id)
    {
        try {
            $transactions = Transaction::find($id);
            if(!$transactions){
              return transactions()->json([
                'message'=>'Transaction Not Found.'
              ],404);
            }
       
            $transactions->date = $request->date;
            $transactions->product = $request->product;
            $transactions->transactor = $request->transactor;
            $transactions->qty = $request->qty;
            $transactions->price = $request->price;
            $transactions->type = $request->type;
       
            // Update User
            $transactions->save();
       
            // Return Json Response
            return response()->json([
                'message' => "Transaction successfully updated."
            ],200);
        } catch (\Exception $e) {
            // Return Json Response
            return response()->json([
                'message' => 'Error occurred: ' . $e->getMessage()
            ], 500);
        }
    }

    public function destroy($id)
    {
        $transactions = Transaction::find($id);
        if(!$transactions){
          return response()->json([
             'message'=>'Transaction Not Found.'
          ],404);
        }
         
        // Delete User
        $transactions->delete();
       
        // Return Json Response
        return response()->json([
            'message' => "Transaction successfully deleted."
        ],200);
    }
}
