<?php

namespace App\Http\Requests\Slider;

use Illuminate\Foundation\Http\FormRequest;

class SliderStoreRequest extends FormRequest
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
            'ar_name' => 'required',
            'en_name' => 'required',
            'tr_name' => 'required',
        ];

        if ($this->getMethod() == 'post') {
            $rules += [
                'files' => 'required',
            ];
        }

        return $rules;
    }
}
