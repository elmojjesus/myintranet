<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        $request = $this->all();
        if (isset($request['edit'])) {
            return [
                'name' => 'required|min:3',
                'email' => 'required|email',
                'password' => 'min:4|max:12',
                'birthDate' => 'required|date_format:d/m/Y',
                'sex' => 'required',
                'rg' => 'required|max:15',
                'cpf' => 'required|max:9'
            ];
        } else {
            return [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:4|max:12',
                'password_confirm' => 'required|same:password',
                'birthDate' => 'required|date_format:d/m/Y',
                'sex' => 'required',
                'rg' => 'required|max:15',
                'cpf' => 'required|max:9'
            ];
        }
        
    }
}
