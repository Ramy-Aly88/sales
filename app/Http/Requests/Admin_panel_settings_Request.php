<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_panel_settings_Request extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    
    public function rules()
    {
        return [
            'system_name'=>'required',
            'address'=>'required',
            'phone'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'system_name.required'=>'اسم الشركة مطلوب',
            'address.required'=>'عنوان الشركة مطلوب',
            'phone.required'=>'هاتف الشركة مطلوب'
        ];
    }
}
