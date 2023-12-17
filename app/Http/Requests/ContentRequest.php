<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContentRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            // 'thumb' => 'required|image|max:1048|mimes:png,jpg,webp',
            // 'image' => 'required|image|max:1048|mimes:png,jpg,webp',
            // 'isPopular' => 'required',
            // 'isHighlight' => 'required',
            // 'status' => 'required',
            // 'tags' => 'required',
            // 'tagtitle' => 'required',
            // 'tagtype' => 'required',
            // 'tagimage' => 'required',
            // 'tagdescription' => 'required',
            // 'tagurl' => 'required',
            // 'tagsitename' => 'required',
        ];
    }
}
