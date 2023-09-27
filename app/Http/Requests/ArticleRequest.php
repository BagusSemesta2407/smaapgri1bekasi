<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'category_article_id'   =>  'required',
            'title'                 =>  'required',
            'deskripsi'                 =>  'required',
        ];
        return $rules;
    }

    public function messages()
    {
        return [
            'category_article_id.required' => 'Kategori Artikel Wajib Dipilih',
            'title.required' => 'Judul Artikel Wajib Diisi',
            'deskripsi.required' => 'Deskripsi Artikel Wajib Diisi',
        ];
    }
}
