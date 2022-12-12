<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Route;

class BannerRequest extends FormRequest
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
            "image" => "required|mimes:jpg,jpeg,png,svg",
            "priority" => "required|integer",
            "type" => "required",
            "title" => "nullable",
            "text" => "nullable",
            "is_active" => "required",
            "button_text" => "nullable",
            "button_link" => "nullable",
            "button_icon" => "nullable",
        ];
        if (str_contains(Route::currentRouteName(), 'update')) {
            $rules['image'] = "nullable|mimes:jpg,jpeg,png,svg";
        }
        return $rules;
    }
}
