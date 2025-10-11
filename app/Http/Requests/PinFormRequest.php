<?php

namespace App\Http\Requests;

use App\Rules\ValidGoogleMapUrl;
use Illuminate\Foundation\Http\FormRequest;

class PinFormRequest extends FormRequest
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
            "images" => "required|array|min:1",
            "images.*" => "image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "title" => "required|string|max:255",
            "map_url" => ["required", "string", "max:255", new ValidGoogleMapUrl()],
            "detail" => "nullable|string|max:255",
        ];
    }
}
