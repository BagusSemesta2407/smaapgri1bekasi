<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        $rules=[
            'name' => 'required',
            'username'=> 'required|unique:users,username',
            'email'=> 'required|email|unique:users,email',
            'nip'=> 'required|unique:users,nip',
            'password'=> 'required',
            'roles'=> 'required',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama Wajib Diisi',
            'username.required'  => 'Username Wajib Diisi',
            'username.unique'  => 'Username Sudah Terpakai',
            'email.required'  => 'Email Wajib Diisi',
            'email.email'  => 'Format Email Salah',
            'email.unique'  => 'Email Sudah Terpakai',
            'nip.required'  => 'NIP Wajib Diisi',
            'nip.unique'  => 'NIP Sudah Terpakai',
            'password.required'  => 'Password Wajib Diisi',
            'roles.required'  => 'Role Wajib Dipilih',
        ];
    }
}
