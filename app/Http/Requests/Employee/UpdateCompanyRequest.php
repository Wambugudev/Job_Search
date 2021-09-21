<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
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
            'name'=> 'required',
            'tagline'=>'required',
            'category' =>'required',
            'ceo'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif',
            'website'=>'required',
            'email'=>'email|required',
            'employees'=>'required',
            'facebook'=>'required',
            'twitter'=>'required',
            'instagram'=>'required',
            'about'=>'required',
            'description'=>'required',
        ];
    }
}
