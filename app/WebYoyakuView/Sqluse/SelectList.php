<?php

namespace App\WebYoyakuView\SqlUse;

use Illuminate\Support\Facades\DB;

use App\Models\Kasoudaityou;
use App\Models\Wareki;

final class SelectList
{

    // WEB トップページ用
    public function yoyaku_index_handle(): array
    {

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

        return [
            "go_index_oshirase" => $go_index_oshirase,
            "saijou_tel" => $saijou_tel
        ];
    } // ========= yoyaku_index_handle END =========


}
