<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryExtracurricularRequest extends FormRequest
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
            'name'  =>  'required',
        ];

        // if ($this->_method != 'put') {
        //     $rules['image'] =   'required|image';
        // }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required'  => 'Nama Ekstrakulikuler Wajib Diisi',
            // 'image.required' => 'Gambar Extrakulikuler Wajib Diisi',
        ];
    }
}
