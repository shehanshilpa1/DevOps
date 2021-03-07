<?php
namespace App\Http\RequestHandlers;

use App\Http\RequestHandlers\CommonRequest;
use Request;

class UpdateUserProfileRequestHandler extends CommonRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'first_name'    => 'required',
            'last_name'     => 'required',
            'mobile_no'     => 'required',
        ];
    }

    public function messages()
    {
        $messages = [
            'mobile_no.required'    => 'Mobile number is required.'
        ];
        return $messages;
    }
}
