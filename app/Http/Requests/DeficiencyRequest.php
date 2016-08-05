<?php

namespace MyIntranet\Http\Requests;

use MyIntranet\Http\Requests\Request;
use Validator;

class DeficiencyRequest extends Request
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

    
    public function rules()
    {
        return  [
            'name' => 'required|min:3'
        ];
    }
}
