<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class UserhosyuController extends Controller
{
    // ユーザー保守　トップ画面
    public function index(Request $request)
    {
        if ($request->session()->has('an_user')) {

            $get_an_code = session()->get('an_code');
            $get_user = session()->get('an_name');
            $get_email = session()->get('an_mail');
            $get_id = session()->get('an_user');
            $get_gyou_num = session()->get('an_gyou_num');

            $arr_get_session = [
                'get_user' => $get_user,
                'get_email' => $get_email,
                'get_id' => $get_id,
                'get_gyou_num' => $get_gyou_num
            ];

            // === 業者名取得
            $bindParam = [
                'get_an_code'   => $get_an_code,
            ];

            $sql = <<< SQL
SELECT 業者.業者コード , 業者.業者名 ,業者.郵便番号, 業者.住所, 業者.代表者名 ,業者.ＴＥＬ,
業者.ＦＡＸ, 業者.メールアドレス, 担当者.担当者名 , 担当者.ログインＩＤ ,担当者.メールアドレス  
    FROM 業者
    left outer join 担当者
    on 業者.業者コード = 担当者.業者コード 
    where 
    担当者.業者コード = :get_an_code
SQL;

            $get_gyousya = DB::select($sql, $bindParam);

            $get_gyousa_name = $get_gyousya[0]->{"業者名"};
            $get_gyousa_yuubin = $get_gyousya[0]->{"郵便番号"};
            $get_gyousa_zyuusyo = $get_gyousya[0]->{"住所"};
            $get_gyousa_daihyou = $get_gyousya[0]->{"代表者名"};
            $get_gyousa_tel = $get_gyousya[0]->{"ＴＥＬ"};
            $get_gyousa_fax = $get_gyousya[0]->{"ＦＡＸ"};
            $get_gyousa_mail = $get_gyousya[0]->{"メールアドレス"};

            $arr_get_gyousya = [
                'get_gyousa_name' => $get_gyousa_name,
                'get_gyousa_yuubin' => $get_gyousa_yuubin,
                'get_gyousa_zyuusyo' => $get_gyousa_zyuusyo,
                'get_gyousa_daihyou' => $get_gyousa_daihyou,
                'get_gyousa_tel' => $get_gyousa_tel,
                'get_gyousa_fax' => $get_gyousa_fax,
                'get_gyousa_mail' => $get_gyousa_mail
            ];

            return view(
                'yoyaku.user_hosyu',
                $arr_get_gyousya,
                $arr_get_session,
                $get_gyousya
            );
        } else {

            return redirect()->route('yoyaku.index')->with('err_message', 'セッション情報エラーです。再度ログインしてください。');
        }
    }
}
