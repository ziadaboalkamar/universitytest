<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'flag' =>'required|in:0,1',
            'discount_price' =>'required|numeric',
            'base_price' =>'required|numeric',
            'store_id' =>'required',
            'description' =>'required|string',
            'image' => 'nullable|mimes:png,jpg',
        ];
    }
}
