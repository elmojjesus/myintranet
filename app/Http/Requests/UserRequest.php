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
                //'birthDate' => 'required|date_format:d/m/Y',
                'sex' => 'required',
                'rg' => 'required',
                'cpf' => 'required|max:15'
            ];
        } else {
            return [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users',
                //'birthDate' => 'required|date_format:d/m/Y',
                'sex' => 'required',
                'rg' => 'required',
                'cpf' => 'required|max:15'
            ];
        }
        
    }
}
