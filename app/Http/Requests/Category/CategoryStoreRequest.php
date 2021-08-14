<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryStoreRequest extends FormRequest
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
        $rules = [
            'status' => 'required',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'ar_name' => 'required|unique:categories,ar_name',
                'en_name' => 'required|unique:categories,en_name',
                'tr_name' => 'required|unique:categories,tr_name',
                'files' => 'required',
            ];
        } else {
            $rules += [
                'ar_name' => [
                    'required',
                    Rule::unique('categories')->ignore($this->segment(3)),
                ],
                'en_name' => [
                    'required',
                    Rule::unique('categories')->ignore($this->segment(3)),
                ],
                'tr_name' => [
                    'required',
                    Rule::unique('categories')->ignore($this->segment(3)),
                ],
            ];
        }

        return $rules;
    }
}
