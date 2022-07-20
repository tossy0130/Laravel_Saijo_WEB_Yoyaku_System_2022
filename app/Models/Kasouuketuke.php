<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Kasouuketuke extends Model
{
    use HasFactory;

    protected $table = "火葬受付";

    protected $primarykey = "受付年度"; // 受付番号 も

    public $timestamps = false; //  とりあえず　false にしておく

    protected $fillable = [
        '受付年度',
        '受付番号',
        '受付日時',
        '取消日時',
        'ログインid',
        '業者コード',
        '業者区分',
        '予約日',
        '受付区分',
        '整理番号',
        '火葬枠番号',
        '待合利用区分',
        '式場利用区分',
        '通夜利用区分',
        '霊柩車利用区分',
        '霊安室利用区分',
        '動物炉利用区分',
        '斎場確定フラグ',
        '予約書送付フラグ'
    ];

    /*
    protected $fillable = [
        '受付年度',
        '受付番号',
        '受付日時',
        '取消日時',
        'ログインid',
        '業者コード',
        '業者区分',
        '予約日',
        '受付区分',
        '整理番号',
        '火葬枠番号',
        '待合利用区分',
        '式場利用区分',
        '通夜利用区分',
        '霊柩車利用区分',
        '霊安室利用区分',
        '動物炉利用区分',
        '斎場確定フラグ',
        '予約書送付フラグ',
        '登録日時',
        '更新日時',
        '更新回数'
    ];
    */

    /**
     *  インサート処理
     */

    public function InsertYoyaku($request)
    {

        $s_y = $request->session()->get("y"); // 受付年度 2022-00-00
        $s_m = $request->session()->get("m"); // 受付日時 

        $uketuke_nendo = substr($s_y, 0, 4);  // 受付年度　取得
        $login_id = session()->get("an_login_id"); // ログインID
        $gyousya_c = session()->get("an_code"); // 業者コード



        // ====== 業者区分　取得
        $bindParam = [
            'gyousya_c'   => $gyousya_c,
        ];

        $sql = <<< SQL
SELECT 業者.業者区分
    FROM 業者
    left outer join 担当者
    on 業者.業者コード = 担当者.業者コード 
    where 
    担当者.業者コード = :gyousya_c
SQL;

        $get_gyousya = DB::select($sql, $bindParam);
        $get_gyousa_kubun = $get_gyousya[0]->{"業者区分"}; // 業者区分

        $yoyakubi = $s_y; // 予約日
        $kasouwaku = \Utils::Get_Kasou_Waku($s_m); // 予約日

        // ====== とりあえず採番処理
        /*
        $uketuke_bangou = DB::table('火葬受付')->max('受付番号');
        $uketuke_bangou += 1;
        */

        // ====== 業者区分　取得 END

        DB::beginTransaction();
        try {

            $this->create([
                '受付年度' => $uketuke_nendo,
                '受付番号' =>  $request->uketuke_bangou,
                '受付日時' => $s_m,
                '取消日時' => "",
                'ログインid' => $login_id,
                '業者コード' => $gyousya_c,
                '業者区分' => $get_gyousa_kubun,
                '予約日' => $yoyakubi,
                '受付区分' => "",
                '整理番号' => $request->uketuke_bangou,
                '火葬枠番号' => $kasouwaku,
                '待合利用区分' => $request->room_type,
                '式場利用区分' => $request->shiki_type,
                '通夜利用区分' => $request->tsuya_type,
                '霊柩車利用区分' => $request->car_type,
                '霊安室利用区分' => "",
                '動物炉利用区分' => "",
                '斎場確定フラグ' => "",
                '予約書送付フラグ' => ""
            ]);

            /*
        return $this->create([
            '受付年度' => $uketuke_nendo,
            '受付番号' =>  $request->uketuke_bangou,
            '受付日時' => $s_m,
            '取消日時' => "",
            'ログインid' => $login_id,
            '業者コード' => $gyousya_c,
            '業者区分' => $get_gyousa_kubun,
            '予約日' => $request->yoyakubi_date,
            '受付区分' => "",
            '整理番号' => $request->uketuke_bangou,
            '火葬枠番号' => "",
            '待合利用区分' => $request->room_type,
            '式場利用区分' => $request->shiki_type,
            '通夜利用区分' => $request->tsuya_type,
            '霊柩車利用区分' => $request->car_type,
            '霊安室利用区分' => "",
            '動物炉利用区分' => "",
            '斎場確定フラグ' => "",
            '予約書送付フラグ' => ""
        ]);
        */

            DB::commit();
        } catch (\Exception $e) {
            \Log::error($e);
            DB::rollback(); // ロールバック
        }
    }
}
