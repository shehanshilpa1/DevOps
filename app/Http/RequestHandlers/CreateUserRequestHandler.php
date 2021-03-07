<?php
namespace App\Http\RequestHandlers;

use App\Http\RequestHandlers\CommonRequest;
use Request;

class CreateUserRequestHandler extends CommonRequest
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
            'email'         => 'required|email|unique:users,email,'.(Request::has('id')?Request::get('id'):''),
            'password'      => (Request::has('id')?'':'required'),
            'role'          => 'required',
        ];
    }

    public function messages()
    {
        $messages = [
            'mobile_no.required'    => 'Mobile number is required.',
            'section.required'      => 'Please select a section.',
            'district.required'     => 'Please select a district.',
            'role.required'         => 'Please select a user role.',
        ];
        return $messages;
    }
}
