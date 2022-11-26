<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class CategoryRequest extends FormRequest
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

        $rules = [
            "name" => "required",
            "slug" => "required|unique:categories,slug",
            "parent_id" => "required",
            "attribute_ids" => "required",
            "attribute_is_filter_ids" => "required",
            "variation_id" => "required",
        ];
        if (str_contains(Route::currentRouteName(), 'update')) {
            $rules['slug'] .= ',' . $this->route('category.id');
        }
        return $rules;
    }
}
