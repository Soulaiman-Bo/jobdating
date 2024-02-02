<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnnouncementRequest extends FormRequest
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
            'title' => 'required|max:500|min:15|string',
            'description' => 'required|min:30',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'company_id' => 'required|integer|max:255',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'The title field is required.',
            'title.string' => 'The title field must be a string.',
            'title.max' => 'The title field must not exceed 255 characters.',
            'title.min' => 'The title must be at least 3 characters long.',

            'description.required' => 'The description field is required.',
            'description.min' => 'The description must be at least 3 characters long.',

            // 'image.required' => 'The image field is required.',
            'image.max' => 'The image field must not exceed 2048 bytes.',
            'image.image' => 'The image must be an Image.',
            'image.mimes' => 'The image must be one of these formates: jpeg,png,jpg,gif,svg.',

            'company_id.required' => 'The company field is required.',
            'company_id.max' => 'The company field must not exceed 255 characters.',
            'company_id.number' => 'The company must be Integer.',
        ];
    }
}
