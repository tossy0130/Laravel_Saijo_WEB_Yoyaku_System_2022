<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Carbon クラス読み込み
use Carbon\Carbon;
use Carbon\CarbonImmutable;

use Illuminate\Support\Facades\DB;

// === FormRequest
use App\Http\Requests\LoginRequest;
use App\Http\Requests\WebYoyakuRequest;

// === modele
use App\Models\Inform;
use App\Models\Kasoudaityou;
use App\Models\Kasouuketuke;
use App\Models\Wareki;
use App\Models\anshou_b_table;
use App\Models\User;


use App\WebYoyakuView\SqlUse\SelectList;

class WebYoyakuController extends Controller
{

    public function __construct()
    {
        // コンストラクタ
        $this->wareki = new Wareki(); // 和暦
        $this->kasoudaityou = new Kasoudaityou(); // 火葬台帳
        $this->kasouuketuke = new Kasouuketuke(); // 火葬受付
    }


    // =============== フォームアイテム =============
    private $formItems = [
        "uketuke_bangou",
        "yoyakubi_date", // 火葬予約日時
        "room_type", // 火葬予約日時	
        "car_type", "car_dtkb", "car_time", "car_place", // 霊柩車利用		
        "tsuya_type", "tsuya_dtkb", "tsuya_time", // 通夜式利用		
        "shiki_type", "shiki_dtkb", "shiki_time", // 葬儀式場利用		
        "kasou_type",  // 火葬区分	
        "region_type", // 死亡者の居住地	
        "applicant_name01", "applicant_name02", // 申請者氏名	
        "applicant_kana01", "applicant_kana02", // 申請者カナ	
        "applicant_tel01", "applicant_tel02", "applicant_tel03", // 連絡先TEL
        "applicant_rel",  // 故人との続柄	
        "applicant_zip01", "applicant_zip02", // 郵便番号	
        "applicant_address1", "applicant_address2", // 住所	
        "dead_name01", "dead_name02", // 死亡者氏名	
        "dead_kana01", "dead_kana02", // 死亡者カナ	
        "dead_sex", // 性別
        "dead_birth_koyomi_type", "dead_birth_year", "dead_birth_month", "dead_birth_day", // 生年月日	
        "dead_koyomi_type", "dead_year", "dead_month", "dead_day", // 死亡年月日	
        "dead_zip01", "dead_zip02", // 郵便番号	
        "dead_address1", "dead_address2", // 住所	
        "dead_honseki_zip01", "dead_honseki_zip02", // 郵便番号（本籍）
        "dead_honseki_address1", "dead_honseki_address2" // 本籍
    ];


    //  WEB トップページ 
    //＊＊＊ public function index(SelectList $Sqluse)
    public function index(Request $request)
    {

        // セッション削除
        $request->session()->flush();

        // =============== お知らせ案内 取得 ============
        $sql = <<< SQL
SELECT 
    annai_title, 
    start_date,
    annai_test 
FROM  
    informs 
WHERE start_date <= CURDATE() 
AND end_date >= CURDATE() 
order by sentence_number desc
SQL;

        $go_index_oshirase = DB::select($sql);

        // === 斎場 TEL 取得
        $get_saijou_tel = \Common_func::GetOneColum(
            "初期設定",
            "斎場名",
            "メモリアルトネ",
            "斎場ＴＥＬ"
        );
        $saijou_tel = $get_saijou_tel[0]->{"斎場ＴＥＬ"};

        //=== セッションタイムアウト　エラー処理
        $session_err = $request->input('session_err');


        return view(
            'yoyaku.index',
            [
                'go_index_oshirase' => $go_index_oshirase,
                'saijou_tel' => $saijou_tel,
                'session_err' => $session_err
            ]
        );

        /*　＊＊＊
        return view(
            'yoyaku.index',
            [] + $Sqluse->yoyaku_index_handle()
        );
        */
    }



    /**
     *  管理画面　へ飛ばす
     */
    public function go_kanri_top()
    {
        return view('kanri_menu.index');
    }


    /**
     *  ログイン画面 => トップ画面へ戻る
     *  */
    public function go_index()
    {

        //  return redirect('yoyaku.index');
        return view('yoyaku.index');
    }

    // ログイン 画面遷移 
    public function go_login()
    {

        //======================= 時刻　曜日　取得 ================

        // 和暦換算
        $now = CarbonImmutable::now(); // ex) 2022-03-01
        $fiscal_year = $now->subMonthNoOverflow(3)->format('Y'); // 2021

        $eras = [
            ['year' => 2019, 'name' => '令和', 'new_Japanese_calendar' => '平成31年度'],
        ];

        $get_wareki = "";
        $get_wa_nendo = 0;
        foreach ($eras as $era) {
            // === 元年処理
            if ($fiscal_year == $era['year']) {
                $get_wareki = $era['new_Japanese_calendar'];
            }

            // === 元年以外　
            if ($fiscal_year >= $era['year']) {
                $get_wareki = $era['name'];
                $get_wa_nendo = $fiscal_year - $era['year'] + 1;
            }
        }

        // 現在時刻取得
        $dt = new Carbon();
        $dt = Carbon::setLocale('ja');
        $dt = Carbon::now()->format('n月j日');

        $dt_time = new Carbon();
        $dt_time = Carbon::setLocale('ja');
        $dt_time = Carbon::now()->format('H:i');

        // 曜日取得
        $weekday = ['日', '月', '火', '水', '木', '金', '土'];
        $youbi = $weekday[Carbon::now()->dayOfWeek];

        $Arr_day_time = [
            'dt' => $dt,
            'dt_time' => $dt_time,
            'youbi' => $youbi
        ];

        //======================= 時刻　曜日　取得 END ================
        $err_login = "";

        return view(
            'yoyaku.login',
            [
                'fiscal_year' => $fiscal_year, 'get_wareki' => $get_wareki,
                'get_wa_nendo' => $get_wa_nendo, 'err_login' => $err_login,
            ],
            $Arr_day_time

        );
    }

    /**
     *  管理画面　TOP へ　遷移
     */
    public function go_kanri()
    {

        // === 日付処理
        // 現在時刻取得
        $dt = new Carbon();
        $dt = Carbon::setLocale('ja');
        $dt = Carbon::now()->format('n月j日');

        $dt_time = new Carbon();
        $dt_time = Carbon::setLocale('ja');
        $dt_time = Carbon::now()->format('H:i');

        // 曜日取得
        $weekday = ['日', '月', '火', '水', '木', '金', '土'];
        $youbi = $weekday[Carbon::now()->dayOfWeek];

        $Arr_day_time = [
            'dt' => $dt,
            'dt_time' => $dt_time,
            'youbi' => $youbi
        ];

        return view('kanri.index', $Arr_day_time);
    }

    // ===> ログイン画面　
    public function in_to_login(LoginRequest $request)
    {

        // === フォームのデータを取得
        $username = $request->input('an_user');
        $password = $request->input('an_password');

        $param = [
            'username' => $username
        ];


        $get_user_data = DB::select('SELECT 業者コード,行番号,担当者名, ログインＩＤ, メールアドレス,パスワード FROM 担当者 where ログインＩＤ = :username', $param);

        // 値取得
        if (isset($get_user_data[0])) {

            $select_an_gyousya_c = $get_user_data[0]->{"業者コード"}; // 業者コード
            $select_kanrisya_frg = $get_user_data[0]->{"行番号"}; // 行番号
            $select_tantou_sikibetu_mei = $get_user_data[0]->{"担当者名"}; // 担当者名 値取得
            $select_an_login_id = $get_user_data[0]->{"ログインＩＤ"}; // ログインid 値取得
            $select_an_maile = $get_user_data[0]->{"メールアドレス"}; // メールアドレス 値取得
            $select_an_password = $get_user_data[0]->{"パスワード"}; // パスワード 値取得

            // セッション ID 取得
            $session_id = $request->session()->getId();
            session()->put(['session_id' => $session_id]);

            // ====== セッション ユーザー名 登録 ======
            session()->put(['an_code' => $select_an_gyousya_c]); // 業者コード  
            session()->put(["an_name" => $select_tantou_sikibetu_mei]); // 担当者名
            $request->session()->put(['an_user' => $username]); // ログインID
            $request->session()->put(['an_gyou_num' => $select_kanrisya_frg]); // 行ナンバー
            session()->put(['an_login_id' => $select_an_login_id]); // ログイン id
            session()->put(['an_pass' => $select_an_password]); // パスワード
            session()->put(['an_mail' => $select_an_maile]); // メールアドレス

            // === 業者名取得
            $top_gyousya = \Common_func::GetGyousyaname($select_an_gyousya_c, $username);

            // 業者名　session 格納
            $get_gyousay_name = $top_gyousya["gyousay_code"];
            session()->put(['gyousya_name' => $get_gyousay_name]);

            //================================= カレンダー処理 ===============================
            $arr_time = ["9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00"];

            // ============== 現在から1週間取得 ===============
            // 今日を取得
            $carbon_today = new Carbon('today');
            $format = 'YYYY-MM-DD';

            $carbon_today_h = new Carbon('today');
            $format_02 = 'MM/DD (ddd)';

            // $format = 'MM/DD (ddd)';
            // $format_02 = 'YYYY-MM-DD';

            $arr_day[0] = $carbon_today->today()->isoFormat($format);
            $arr_day_h[0] = $carbon_today_h->today()->isoFormat($format_02);

            for ($i = 0; $i < 7; $i++) {
                $arr_day[$i] = $carbon_today->copy()->addDay($i)->isoFormat($format);
                $arr_day_h[$i] = $carbon_today_h->copy()->addDay($i)->isoFormat($format_02);
            }

            array_unshift($arr_day_h, "火葬時刻"); // 先頭に空白

            // 火葬枠テーブルからデータを取得
            $get_kasou_waku_data = \Utils::Get_Kasou_Waku_table();

            // ============== 現在から1週間取得 END ===============
            //================================= カレンダー処理 END ===============================


            //================================= ログイン判定 ===============================
            // === OK 処理 === 
            if (
                strcmp($username, $select_an_login_id) == 0 &&
                strcmp($password, $select_an_password) == 0
            ) {


                return view(
                    'yoyaku.login_top',
                    $get_kasou_waku_data,
                    [
                        'username' => $username, 'password' => $password, 'select_kanrisya_frg' => $select_kanrisya_frg,
                        'arr_day' => $arr_day, 'arr_time' => $arr_time,
                        'arr_day_h' => $arr_day_h, 'select_an_maile' => $select_an_maile,
                        'top_gyousya' => $top_gyousya
                    ]
                );

                // === リダイレクト ログインID => OK , パスワード => NG 
            } else if (
                strcmp($username, $select_an_login_id) == 0 &&
                strcmp($password, $select_an_password) != 0
            ) {

                print("else if 01");

                return redirect()->route('yoyaku.login')->with('err_message', 'パスワード エラー');

                // === リダイレクト ログインID => NG , パスワード => OK 
            } else if (
                strcmp($username, $select_an_login_id) != 0 &&
                strcmp($password, $select_an_password) == 0
            ) {

                print("else if 02");

                return redirect()->route('yoyaku.login')->with('err_message', 'ログインID エラー');

                // === リダイレクト処理　=== 
            } else {

                print("else 01");
                return redirect()->route('yoyaku.login')->with('err_message', 'ログイン情報をご確認ください。');
            }

            //================================= ログイン判定 END ===============================

        } else {
            print("else");
            // return redirect()->route('yoyaku.login')->with('err_message', 'ログイン情報が間違っています。');
        }

        // セッションの値を全て取得
        // $session_data = $request->session()->all();
    }

    /*
    *  ログイン後  画面トップ
    */
    public function login_top(Request $request)
    {

        //================================= カレンダー処理 ===============================
        $arr_time = ["9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00"];

        // ============== 現在から1週間取得 ===============
        // 今日を取得
        $carbon_today = new Carbon('today');
        $format = 'YYYY-MM-DD';

        $carbon_today_h = new Carbon('today');
        $format_02 = 'MM/DD (ddd)';

        // $format = 'MM/DD (ddd)';
        // $format_02 = 'YYYY-MM-DD';

        $arr_day[0] = $carbon_today->today()->isoFormat($format);
        $arr_day_h[0] = $carbon_today_h->today()->isoFormat($format_02);

        for ($i = 0; $i < 7; $i++) {
            $arr_day[$i] = $carbon_today->copy()->addDay($i)->isoFormat($format);
            $arr_day_h[$i] = $carbon_today_h->copy()->addDay($i)->isoFormat($format_02);
        }

        array_unshift($arr_day_h, "火葬時刻"); // 先頭に空白

        // 火葬枠テーブルからデータを取得
        $get_kasou_waku_data = \Utils::Get_Kasou_Waku_table();

        return view('yoyaku.login_top', [
            'arr_day' => $arr_day, 'arr_time' => $arr_time,
            'arr_day_h' => $arr_day_h,
        ]);
    }


    /**
     * 　カレンダー画面 -> 予約フォーム
     */
    public function yoyaku_form(Request $request)
    {

        // === ログイン業者 session 情報　取得
        $user_id = $request->session()->get('an_user');
        $an_name = $request->session()->get('an_name');
        $an_mail = $request->session()->get('an_mail');
        $arr_get_session = [
            'user_id' => $user_id,
            'an_name' => $an_name,
            'an_mail' => $an_mail
        ];

        //　予約日 GET 取得
        $y = $request->input('y');
        $m = $request->input('m');
        //  予約日をsession へ入れる
        $request->session()->put("y", $y);
        $request->session()->put("m", $m);

        // === 受付番号　暫定処理で　採番
        $uketuke_bangou = DB::table('火葬受付')->max('受付番号');
        $uketuke_bangou += 1;

        //=========== ＊＊＊ 和暦テーブルから　元号取得　＊＊＊ ============
        $wareki_arr = $this->wareki->FindFrom_View();

        //============================= POST 処理 ===========================

        // 
        $yoyaku_date = \Utils::Get_Format_date($y, "YYYY年MM日DD日");

        return view(
            'yoyaku.yoyaku_form',
            [
                'y' => $y, 'm' => $m, 'wa', 'wareki_arr' => $wareki_arr,
                'yoyaku_date' => $yoyaku_date, 'uketuke_bangou' => $uketuke_bangou
            ],
            $arr_get_session
        );
    }

    /**
     * 　カレンダー画面 -> 予約フォーム インサート処理
     */
    public function yoyaku_form_store(WebYoyakuRequest $request)
    {

        // ====== POST 受信 ======
        $arr_input = $request->only($this->formItems);

        // ====== ファームバリデーション処理　＊＊＊ 未実装 ＊＊＊ 

        //セッションに書き込む
        $request->session()->put("form_input", $arr_input);


        return redirect()->action("WebYoyakuController@yoyaku_confirm");
        //   return view('yoyaku.yoyaku_confirm', ['arr_input' => $arr_input]);
    }

    /**
     *  予約登録　確認画面 
     */
    public function yoyaku_confirm(Request $request)
    {
        $arr_input = $request->session()->get("form_input");

        // 予約日を session から取り出す
        $s_y = $request->session()->get("y");
        $s_m = $request->session()->get("m");

        // 日時 フォーマット
        $yoyaku_date = \Utils::Get_Format_date($s_y, "YYYY年MM日DD日");
        $yoyaku_date_f = \Utils::Get_Format_date($s_y, "YYYYMMDD");


        //セッションに値が無い時はフォームに戻る
        if (!$arr_input) {
            return redirect()->action("WebYoyakuController@yoyaku_form");
        }

        return view(
            'yoyaku.yoyaku_confirm',
            [
                'arr_input' => $arr_input, 'yoyaku_date' => $yoyaku_date,
                'yoyaku_date_f' => $yoyaku_date_f
            ],
            compact('s_y', 's_m')
        );
    }


    public function yoyaku_confirm_send(Request $request)
    {

        // セッションを取り出す
        $arr_input = $request->session()->get("form_input");

        // 予約日を session から取り出す
        $s_y = $request->session()->get("y");
        $s_m = $request->session()->get("m");


        // 戻るボタンが押された時
        if ($request->has("back")) {
            return redirect()->action("WebYoyakuController@yoyaku_form");
        }

        // セッションがなかった場合は、フォームに戻す
        if (!$arr_input) {
            return redirect()->action("WebYoyakuController@yoyaku_form");
        }

        // ====== トランザクション　start インサート処理
        $this->kasouuketuke->InsertYoyaku($request);

        $this->kasoudaityou->InsertYoyaku($request);

        return redirect()->route('yoyaku.yoyaku_complete');
    }

    /**
     *  予約完了画面
     */
    public function yoyaku_complete()
    {
        return view('yoyaku.yoyaku_complete');
    }

    /**
     * 予約状況　確認画面
     */
    public function yoyaku_joukyou()
    {

        $gyousya_c = session()->get('an_code');
        $gyousya_name = session()->get('gyousya_name');

        $get_yoyaku_joukyou = \Common_func::Get_menu_Yoyaku_Joukyou($gyousya_c);

        return view('yoyaku.yoyaku_joukyou', $get_yoyaku_joukyou, ['gyousya_name' => $gyousya_name]);
    }


    // パスワード変更処理
    public function pass_change(Request $request)
    {
        // ログインID
        $login_id = session()->get('an_user');

        $pass_01 = $request->input('ch_pass_01');
        $pass_02 = $request->input('ch_pass_02');

        if ($pass_01 !== $pass_02) {
            return redirect()->route('yoyaku.user_hosyu')->with('err_message', 'パスワードが一致しません。');
        } else {
            \Common_func::pass_change_sql($pass_02, $login_id);
            return redirect()->route('yoyaku.login')->with('ok_pass_change', 'パスワードを変更しました。');
        }
    }
}
