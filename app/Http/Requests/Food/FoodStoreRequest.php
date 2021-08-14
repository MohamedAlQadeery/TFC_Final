<?php

namespace App\Http\Requests\Food;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FoodStoreRequest extends FormRequest
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
            'category_id' => 'required',
            'price' => 'numeric|required|min:1',
            'fats' => 'nullable |numeric|min:0',
            'carbs' => 'nullable |numeric|min:0',
            'protein' => 'nullable |numeric|min:0',
        ];

        if ($this->getMethod() == 'POST') {
            $rules += [
                'ar_name' => 'required|unique:food,ar_name',
                'en_name' => 'required|unique:food,en_name',
                'tr_name' => 'required|unique:food,tr_name',
                'files' => 'required',
            ];
        } else {
            $rules += [
                'ar_name' => [
                    'required',
                    Rule::unique('food')->ignore($this->segment(3)),
                ],
                'en_name' => [
                    'required',
                    Rule::unique('food')->ignore($this->segment(3)),
                ],
                'tr_name' => [
                    'required',
                    Rule::unique('food')->ignore($this->segment(3)),
                ],
            ];
        }

        return $rules;
    }
}
