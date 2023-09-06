<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $rules =[
            // 'alamat' => 'required',
            'yt' => 'url',
            'fb' => 'url',
            'ig' => 'url',
            // 'telepon' => 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        // 'alamat.required' => 'Alamat Wajib Diisi',
        return [
            'fb.url' => 'Wajib Menginputkan Dalam Bentuk LINK',
            'yt.url' => 'Wajib Menginputkan Dalam Bentuk LINK',
            'ig.url' => 'Wajib Menginputkan Dalam Bentuk LINK'
        ];
    }
}
