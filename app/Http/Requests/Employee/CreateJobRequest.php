<?php

namespace App\Http\Requests\Employee;

use Illuminate\Foundation\Http\FormRequest;

class CreateJobRequest extends FormRequest
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
            'title'=> 'required',
            'type'=>'required',
            'description' =>'required',
            'location'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif|required',
            'requirements'=>'required',
        ];
    }
}
