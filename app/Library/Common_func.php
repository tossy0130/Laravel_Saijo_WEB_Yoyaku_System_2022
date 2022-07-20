<?php

namespace App\Library;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Common_func
{

    //=============================== SQL 取得 関数 一覧 ==========================
    /**
     *  テーブルから全件取得　ファサード
     */
    public function AllSelect($table_mei)
    {
        return DB::table($table_mei)->get();
    }

    /**
     *   テーブルから order by 1 => asc 0 desc 
     */
    public function OrderBySelect($table_mei, $column, $by_num)
    {

        if ($by_num > 0) {
            return DB::table($table_mei)
                ->orderBy($column, 'asc')
                ->get();
        } else {
            return DB::table($table_mei)
                ->orderBy($column, 'desc')
                ->get();
        }
    }

    /*
    *  $column が $val のレコードのうち $target_column を取得
    */
    public function GetOneColum($table_name, $column, $val, $target_column)
    {
        $oneItem = DB::table($table_name)->where($column, $val)->get($target_column);
        return $oneItem;
    }


    /*
    * 業者名と、担当者名を返す
    */
    public function GetGyousyaname($gyousay_c, $login_id)
    {

        // === 業者名取得
        $bindParam = [
            'gyousay_c' => $gyousay_c,
            'login_id' => $login_id
        ];

        $sql = <<< SQL
SELECT 業者.業者名 , 担当者.担当者名
    FROM 業者
    left outer join 担当者
    on 業者.業者コード = 担当者.業者コード 
    where 
    担当者.業者コード = :gyousay_c and 担当者.ログインＩＤ = :login_id
SQL;

        $get_gyousya = DB::select($sql, $bindParam);
        $get_gyousa_name = $get_gyousya[0]->{"業者名"};
        $get_gyousa_tantou_name = $get_gyousya[0]->{"担当者名"};

        $get_arr = [
            'gyousay_code' => $get_gyousa_name,
            'tantou_name' => $get_gyousa_tantou_name
        ];

        return $get_arr;
    }

    /*
    *  予約状況　取得 SQL 
    */

    public function Get_menu_Yoyaku_Joukyou($gyousay_c)
    {

        $bindParam = [
            'gyousay_c' => $gyousay_c
        ];

        $sql = <<< SQL
SELECT distinct 火葬受付.受付番号,火葬受付.予約日, 火葬受付.待合利用区分,火葬受付.式場利用区分,火葬受付.通夜利用区分,火葬受付.霊安室利用区分, 
	火葬台帳.申請者姓, 火葬台帳.申請者名
	from 火葬受付
	left outer join 火葬台帳
	on 火葬受付.受付番号 = 火葬台帳.整理番号 
	WHERE 火葬受付.業者コード = :gyousay_c
	order by 火葬受付.受付番号 desc;
SQL;

        $get_data = DB::select($sql, $bindParam);

        $arr_data = [];
        $arr_data_02 = [];
        $arr_data_03 = [];
        $arr_data_04 = [];
        $arr_data_05 = [];
        $arr_data_06 = [];
        $arr_data_07 = [];
        for ($i = 0; $i < count($get_data); $i++) {
            $arr_data[$i] = $get_data[$i]->{"受付番号"};
            $arr_data_02[$i] = $get_data[$i]->{"予約日"};
            $arr_data_03[$i] = $get_data[$i]->{"待合利用区分"};
            $arr_data_04[$i] = $get_data[$i]->{"通夜利用区分"};
            $arr_data_05[$i] = $get_data[$i]->{"霊安室利用区分"};
            $arr_data_06[$i] = $get_data[$i]->{"申請者姓"};
            $arr_data_07[$i] = $get_data[$i]->{"申請者名"};
        }

        $get_arrs = [
            'arr_data' => $arr_data,
            'arr_data_02' => $arr_data_02,
            'arr_data_03' => $arr_data_03,
            'arr_data_04' => $arr_data_04,
            'arr_data_05' => $arr_data_05,
            'arr_data_06' => $arr_data_06,
            'arr_data_07' => $arr_data_07
        ];

        return $get_arrs;
    }




    //=============================== SQL 取得 関数 一覧 END ==========================




    //======================== Session 関係 ========================
    // セッションからデータを取得
    public function Get_session(Request $request, String $str)
    {
        return  $request->session()->get($str);
    }

    // セッションに値保存
    public function Put_session(Request $request, String $str)
    {
        return $request->session()->put($str);
    }

    /**
     *   compact　を　連続で入れる。 
     */
    public function Compact_All(array $arr)
    {
        $str = "";

        // 個数取得
        $arr_length = count($arr);

        $idx = 1;
        if ($arr_length > 1) {
            foreach ($arr as $key => $value) {

                if ($idx == $arr_length) {
                    $str .= $key;
                } else {
                    $str .= $key . ",";
                }

                $idx++;
            }
            return compact($str);
        } else {
            return compact($arr[0]);
        }
    } //=== END function


    /*
*  パスワード変更処理
*/
    public function pass_change_sql($pass, $login_id)
    {

        $bindParam = [
            'pass' => $pass,
            'login_id' => $login_id
        ];

        $sql = <<< SQL
UPDATE 担当者 set パスワード = :pass where ログインＩＤ = :login_id
SQL;

        $get_data = DB::select($sql, $bindParam);

        return $get_data;
    }
}
