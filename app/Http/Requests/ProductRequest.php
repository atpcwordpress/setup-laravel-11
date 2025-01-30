<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'product_name' =>'required|string|max:255',
            'title' =>'required|string',
            'product_description' =>'required',
            'product_price' =>'required|float',
            'product_sale_price' =>'required|float',
            'product_active' =>'required|integer',
            'product_stock' =>'required|integer',
            'product_color' =>'required|string'
            // 'product_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ];
    }
}
