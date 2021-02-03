<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class UpdateRegisterRequest extends FormRequest
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
    public function rules(Request $request)
    {


        return [

            'name' => 'required|min:3',
            'email' => 'email|required|min:6',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|digits:11',

        ];
    }

    public function attributes()
    {
        return [

    'name' => 'الاسم',
    'photo' => 'الصورة',
    'password' => 'كلمة المرور',
    'phone' => 'رقم التليفون',
    'email' => 'البريد الالكتروني',

        ];
    }


    public function messages()
    {
        return [

    'required' => ' <B> :attribute </B> حقل مطلوب',
    'unique' => '<B> :attribute </B> مسجل من قبل ',


        ];
    }


}
