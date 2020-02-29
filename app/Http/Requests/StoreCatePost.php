<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class StoreCatePost extends FormRequest
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
            'c_name'=>[
                'regex:/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]{2,12}$/u',
                Rule::unique('cate')->ignore(request()->c_id,'c_id')
            ],
        ];
    }
    public function messages()
    {
        return [
            'c_name.regex'=>'分类名称不能为空且分类名称只能是中文、字母、数字、下划线组成',
            'c_name.unique'=>'分类名称已存在',
        ];
    }
}
