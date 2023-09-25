<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtracurricularRequest extends FormRequest
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
            'category_extracurricular_id'   =>  'required',
            'title'                         =>  'required',
            'deskripsi'                     =>  'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'category_extracurricular_id.required' => 'Kategori Extrakulikuler Wajib Dipilih',
            'title.required'                       => 'Judul Wajib Diisi',
            'deskripsi.required'                   => 'Deskripsi Wajib Diisi',
        ];
    }
}
