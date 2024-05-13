<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class storepost extends FormRequest
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
            'title' => 'required|string|min:3|max:100',
            'body' => 'required|string|min:3|max:10000',
            'category_id' => 'required|exists:categories,id'];

    
    }

    public function messages()
    {
      
        return [
            'title.required' => ' required.',
        'title.string' => 'The title must be a string.',
        'title.min' => 'The title must be at least :min characters.',
        'title.max' => 'The title may not be greater than :max characters.',
        'body.required' => 'The body field is required.',
        'body.string' => 'The body must be a string.',
        'body.min' => 'The body must be at least :min characters.',
        'body.max' => 'The body may not be greater than :max characters.',
        'category_id.required' => 'Please select a category.',
        'category_id.exists' => 'The selected category is invalid.',];

    
    }

   
}
