<?php

namespace App\Http\Requests;

use Dotenv\Validator;
use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Exceptions\HttpResponseException;

class WebYoyakuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return false;
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
            //
            'applicant_name01' => ['required'], // 申請者姓
            'applicant_name02' => ['required'] // 申請者名
        ];
    }

    // === エラーメッセージ
    public function messages()
    {
        return [
            'applicant_name01.required' => '※申請者姓を入力してください',
            'applicant_name02.required' => '※申請者名を入力してください'
        ];
    }
}
