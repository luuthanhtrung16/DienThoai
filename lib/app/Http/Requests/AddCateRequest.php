<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//sửa thành true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //kiểm tra như validate
            'name'=>'unique:vp_categories,cate_name'
        ];
    }
    public function messages(){
        return [
            'name.unique'=>'Tên danh mục đã bị trùng'
        ];
    }
}
