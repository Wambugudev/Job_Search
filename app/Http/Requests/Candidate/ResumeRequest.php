<?php

namespace App\Http\Requests\Candidate;

use Illuminate\Foundation\Http\FormRequest;

class ResumeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return True;
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
            'profession' => 'required',
            'about' => 'required|min:1',
            'image' =>'mimes:jpeg,jpg,png,gif',
            'email' => 'required|email',
            'phoneNo' => 'required',
            'birthday' => 'required|date',
            'county' => 'required',
            'facebook' => 'required',
            'twitter' => 'required',
            'insta' => 'required',
            'resumeContent' => 'required|min:1',
            'school' => 'required|max:50',
            'qualification' => 'required',
            'dateFromEd' => 'required|date',
            'dateToEd' => 'required|date',
            'employer' => 'required',
            'position' => 'required',
            'from' => 'required',
            'to' => 'required',
            'skill1' => 'required',
            'skill2' => 'required',
            'skill3' => 'required',
        ];
    }
}
