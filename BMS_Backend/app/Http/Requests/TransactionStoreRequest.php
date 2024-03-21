<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class TransactionStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        if (request()->isMethod('post')) {
            return [
                'Date' => 'required|date',
                'Product' => 'required|string',
                'Transactor' => 'required|string',
                'Qty' => 'required|numeric',
                'Price' => 'required|numeric',
                'Type' => 'required|string',
            ];
        } else {
            return [
                'Date' => 'required|date',
                'Product' => 'required|string',
                'Transactor' => 'required|string',
                'Qty' => 'required|numeric',
                'Price' => 'required|numeric',
                'Type' => 'required|string',
            ];
        }
    }
    
    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        if(request()->isMethod('post')){
            return [
                'Date.required' => 'Date is required!',
                'Product.required' => 'Product is required!',
                'Transactor.required' => 'Transactor is required!',
                'Qty.required' => 'Quantity is required!',
                'Price.required' => 'Price is required!',
                'Type.required' => 'Type is required!',
            ];
        }else{
            return [
                'Date.required' => 'Date is required!',
                'Product.required' => 'Product is required!',
                'Transactor.required' => 'Transactor is required!',
                'Qty.required' => 'Quantity is required!',
                'Price.required' => 'Price is required!',
                'Type.required' => 'Type is required!',
            ];
        }
    }
}