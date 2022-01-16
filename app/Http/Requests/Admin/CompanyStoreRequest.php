<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CompanyStoreRequest extends FormRequest
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
        
                'first_name'    =>  'required|min:2|max:30|alpha',
                'last_name'     =>  'required|min:2|max:30|alpha',
                'name'              =>  'required|min:4|max:30',
                'email'             =>  'required|email|unique:users'. (($this->has('user_id'))?',email,'.$this->user_id:''),
                'official_email'     =>  'required|email',
                'website'            =>  'nullable|url',
                'logo'               =>  'nullable|mimes:png,jpg,jpeg|max:10240',   
                'password'  =>  (($this->has('user_id'))? 
                    'nullable|':  'required|').
                    'min:6|max:12|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9]).*$/|confirmed'
            ];
    
    }
}
