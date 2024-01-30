<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name' => 'required|max:255|min:3|string',
            'description' => 'required|max:255|min:3',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sector' => 'required|max:255|min:3',
            'location' => 'required|max:255|min:3'
        ];
    }

    public function messages()
{
    return [
        'name.required' => 'The name field is required.',
        'name.string' => 'The name field must be a string.',
        'name.max' => 'The name field must not exceed 255 characters.',
        'name.min' => 'The name must be at least 3 characters long.',

        'description.required' =>'The description field is required.',
        'description.max' =>'The description field must not exceed 255 characters.',
        'description.min' =>'The description must be at least 3 characters long.',

        'logo.required' =>'The logo field is required.',
        'logo.max' =>'The logo field must not exceed 2048 bytes.',
        'logo.image' =>'The logo must be an Image.',
        'logo.mimes' =>'The logo must be one of these formates: jpeg,png,jpg,gif,svg.',

        'sector.required' =>'The sector field is required.',
        'sector.max' =>'The sector field must not exceed 255 characters.',
        'sector.min' =>'The sector must be at least 3 characters long.',

        'location.required' =>'The location field is required.',
        'location.max' =>'The location field must not exceed 255 characters.',
        'location.min' =>'The location must be at least 3 characters long.',


   ];
}


}
