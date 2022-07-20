<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Kasoudaityou extends Model
{
    use HasFactory;

    protected $table = "火葬台帳";

    protected $primarykey = "整理番号";

    public $timestamps = false; //  とりあえず　false にしておく

    // ホワイトリスト
    protected $fillable = [
        '整理番号',
        '火葬区分',
        '申請者姓',
        '申請者名',
    ];

    /*
    protected $fillable = [
        '整理番号',
        '火葬区分',
        '申請者姓',
        '申請者名',
        '申請者姓かな',
        '申請者名かな',
        '申請者電話番号',
        '申請者続柄',
        '申請者郵便',
        '申請者住所',
        '申請者住所２',
        '死亡者姓',
        '死亡者名',
        '死亡者姓かな',
        '死亡者名かな',
        '死亡者性別',
    ];
    */

    /**
     *  フォーム　インサート処理
     */

    public function InsertYoyaku($request)
    {

        // 申請者情報 連絡先TEL 
        $tel_01 = $request->applicant_tel01;
        $tel_02 = $request->applicant_tel02;
        $tel_03 = $request->applicant_tel03;
        $r_tel = $tel_01 . $tel_02 . $tel_03;

        // 申請者 郵便番号
        $apzip_01 = $request->applicant_zip01;
        $apzip_02 = $request->applicant_zip02;
        $ap_zip = $apzip_01 . $apzip_02;

        // 死亡者生年月日
        $d_y = $request->dead_birth_koyomi_type;

        //          '' => $request->shiki_type, // 式場利用

        /*
        return $this->create([
            '整理番号' => $request->uketuke_bangou,
            '火葬区分' => $request->kasou_type, // 火葬区分 0:大人（12歳以上）,1:小人（12歳未満）
            '地域区分' => $request->region_type, // 死亡者の居住地 0:市内,1:市外
            '申請者姓' => $request->applicant_name01, // 申請者氏名（氏）
            '申請者名' => $request->applicant_name02, // 申請者氏名（名）
            '申請者姓かな' => $request->applicant_kana01, // 申請者カナ（姓）
            '申請者名かな' => $request->applicant_kana02, // 申請者カナ(名) 
            '申請者電話番号' => $r_tel, // 連絡先TEL
            '申請者続柄' => $request->applicant_rel, // 故人との続柄 0:親族,1:その他
            '申請者郵便' => $ap_zip, // 申請者郵便
            '申請者住所' => $request->applicant_address1, // 申請者住所 01
            '申請者住所２' => $request->applicant_address2, // 申請者住所 01
            '死亡者姓' => $request->dead_name01, // 死亡者姓
            '死亡者名' => $request->dead_name02, //  死亡者名
            '死亡者姓かな' => $request->dead_kana01, // 死亡者姓かな
            '死亡者名かな' => $request->dead_kana01, //  死亡者名かな
            '死亡者性別' => $request->dead_sex, // 死亡者性別 0:男性,1:女性,2:不詳

        ]);
        */

        DB::beginTransaction();
        try {

            $this->create([
                '整理番号' => $request->uketuke_bangou,
                '火葬区分' => $request->kasou_type, // 火葬区分 0:大人（12歳以上）,1:小人（12歳未満）
                '地域区分' => $request->region_type, // 死亡者の居住地 0:市内,1:市外
                '申請者姓' => $request->applicant_name01, // 申請者氏名（氏）
                '申請者名' => $request->applicant_name02, // 申請者氏名（名）
                '申請者姓かな' => $request->applicant_kana01, // 申請者カナ（姓）
                '申請者名かな' => $request->applicant_kana02, // 申請者カナ(名) 
                '申請者電話番号' => $r_tel, // 連絡先TEL
                '申請者続柄' => $request->applicant_rel, // 故人との続柄 0:親族,1:その他
                '申請者郵便' => $ap_zip, // 申請者郵便
                '申請者住所' => $request->applicant_address1, // 申請者住所 01
                '申請者住所２' => $request->applicant_address2, // 申請者住所 01
                '死亡者姓' => $request->dead_name01, // 死亡者姓
                '死亡者名' => $request->dead_name02, //  死亡者名
                '死亡者姓かな' => $request->dead_kana01, // 死亡者姓かな
                '死亡者名かな' => $request->dead_kana01, //  死亡者名かな
                '死亡者性別' => $request->dead_sex, // 死亡者性別 0:男性,1:女性,2:不詳

            ]);

            DB::commit();
        } catch (\Exception $e) {
            \Log::error($e);
            DB::rollBack(); // ロールバック
        }
    }
}
