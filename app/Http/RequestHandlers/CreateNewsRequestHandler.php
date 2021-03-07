<?php
namespace App\Http\RequestHandlers;

use App\Http\RequestHandlers\CommonRequest;
use Request;

class CreateNewsRequestHandler extends CommonRequest
{
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'title'         => 'required',
            'content'       => 'required',
            'description'   => 'required'
        ];
    }

    public function messages()
    {
        $messages = [
            'title.required'         => 'Please enter the title.',
        ];
        return $messages;
    }
}
