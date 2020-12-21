<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class mailRequest extends FormRequest
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
        return [
            'name' => ['required','string'],
            'email' => ['required','email'],
            'relations' => ['required', Rule::in( config('relations') )],
            'contents' => ['required', Rule::in( config('contents') )],
            //
        ];
    }
    public function attributes(){
        
        return [
             'name' => '宛先',
             'email' => 'アドレス',
             'relations' => '関係',
             'contents' => '挨拶の種類',
            ];
    }
}
