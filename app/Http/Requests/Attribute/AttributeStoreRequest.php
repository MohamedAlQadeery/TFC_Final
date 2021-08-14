<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttributeStoreRequest extends FormRequest
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
            'price' => 'required|numeric|min:0.5',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'ar_name' => 'required|unique:attributes,ar_name',
                'en_name' => 'required|unique:attributes,en_name',
                'tr_name' => 'required|unique:attributes,tr_name',
            ];
        } else {
            $rules += [
                'ar_name' => [
                    'required',
                    Rule::unique('attributes')->ignore($this->segment(3)),
                ],
                'en_name' => [
                    'required',
                    Rule::unique('attributes')->ignore($this->segment(3)),
                ],
                'tr_name' => [
                    'required',
                    Rule::unique('attributes')->ignore($this->segment(3)),
                ],
            ];
        }

        return $rules;
    }
}
