<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaRequest extends FormRequest
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
            'tanggal_awal'  =>  'required',
            'tanggal_akhir'  =>  'required',
            'uraian_kegiatan'   =>  'required',
            'keterangan'    =>  'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'tanggal_awal'  =>  'Tanggal Wajib Diisi',
            'tanggal_akhir'  =>  'Tanggal Wajib Diisi',
            'uraian_kegiatan'  =>  'Uraian Wajib Diisi',
            'keterangan'  =>  'Keterangan Wajib Diisi',
        ];
    }
}
