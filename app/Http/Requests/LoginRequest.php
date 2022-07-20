<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// ======= 予約フォーム用　バリデーション ======
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 変更
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
            // ************　ルールを追加 **************
            'an_user' => 'required',
            //  'an_user' => 'unique:users.mail_address' // DB内　ユニーク 
            'an_password' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'an_user.required' => 'ログインIDを入力してください。',
            'an_password.required' => 'パスワードを入力してください。',
        ];
    }
}
