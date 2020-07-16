<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProduct extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            "pictures" => "required|array",
            "pictures.*" => "required|image|mimes:jpeg,png|max:3000",
            "category_id" => "required|numeric|exists:categories,id",
            "name" => "required",
            "description" => "required",
            "price" => "required|numeric",
            "stock" => "required|numeric",
        ];
    }
}
