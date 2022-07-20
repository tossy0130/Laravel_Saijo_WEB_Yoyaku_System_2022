<?php

namespace App\Library;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Utils
{

    private $now_date;
    private $format;

    // ============== 日付関数 当日を返す ==================
    public function Get_Format_date($date, $format)
    {
        $carbon_day = new Carbon($date);
        $get_today = $carbon_day->isoFormat($format);
        return $get_today;
    }

    /*
    *  // 火葬枠番号　返す
    */
    public function Get_Kasou_Waku($waku): string
    {

        $arr = ["9:00", "10:00", "11:00", "12:00", "13:00", "14:00", "15:00"];
        $idx = 0;
        $resurl_waku = "";
        foreach ($arr as $a) {
            if (strcmp($a, $waku) == 0) {
                $resurl_waku = $idx;
            }
            $idx += 1;
        }
        return $resurl_waku;
    }

    /*
    *  火葬枠　テーブルから　取得
    */
    public function Get_Kasou_Waku_table()
    {
        $bindParam = [];

        $sql = <<< SQL
        SELECT  火葬枠番号 , 火葬枠名 , 予約枠数 , 予約時刻 
	        FROM 火葬枠
SQL;

        $get_wakusuu = DB::select($sql);

        $arr_kasouWaku_num = [];   // 火葬枠番号
        $arr_kasouWaku_name = [];  // 火葬枠名
        $arr_kasouWaku_suu = [];   // 予約枠数
        $arr_kasouWaku_time = [];  // 予約時刻

        for ($i = 0; $i < count($get_wakusuu); $i++) {
            $arr_kasouWaku_num[$i] = $get_wakusuu[$i]->{"火葬枠番号"};
            $arr_kasouWaku_name[$i] = $get_wakusuu[$i]->{"火葬枠名"};
            $arr_kasouWaku_suu[$i] = $get_wakusuu[$i]->{"予約枠数"};
            $arr_kasouWaku_time[$i] = $get_wakusuu[$i]->{"予約時刻"};
        }

        // === 900 => 9:00 , 1000 => 10:00
        for ($i = 0; $i < count($arr_kasouWaku_time); $i++) {
            if ($i == 0) {
                $arr_kasouWaku_time[$i] = substr_replace($arr_kasouWaku_time[$i], ':00', 1);
            } else {
                $arr_kasouWaku_time[$i] = substr_replace($arr_kasouWaku_time[$i], ':00', 2);
            }
        }

        $get_kasou_data = [
            'arr_kasouWaku_num' => $arr_kasouWaku_num,
            'arr_kasouWaku_name' => $arr_kasouWaku_name,
            'arr_kasouWaku_suu' => $arr_kasouWaku_suu,
            'arr_kasouWaku_time' => $arr_kasouWaku_time
        ];

        return $get_kasou_data;
    }
}
