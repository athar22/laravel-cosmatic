<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;

class RealestatesRequest extends FormRequest
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

            'title' => 'required|min:3',
            'realestate_type' => 'required|min:3',
            'payment_type' => 'required|min:3',
            'price' => 'required',
            'is_negotiable' => 'required',
            'area' => 'required',
            'payment' => 'required',
            'email' => 'email|required|min:6',
            'photos.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|digits:11',

        ];
    }




}
