<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// DB ファサード用
use Illuminate\Support\Facades\DB;

class Inform extends Model
{
    use HasFactory;

    protected $table = 'informs';

    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    // $fillable => 所謂ホワイトリスト
    protected $fillable = [
        "id",
        "sentence_number",  // 文章番号
        "annai_type",   // 案内種別
        "annai_title",  // 表題
        "start_date",   // 開始日付
        "end_date",     // 終了日付
        "start_time",   // 開始時刻
        "end_time",     // 終了時刻
        "annai_test",   // 案内文章
        "touroku_person", // 登録担当
        "touroku_Terminal", // 登録端末
        "kousin_person",    // 更新担当
        "kousin_Terminal",  // 更新端末
        "kousin_num",       // 更新回数
        "created_at",       // 作成日
        "updated_at",       // 更新日
    ];


    /**
     * 一覧画面表示用にbooksテーブルから全てのデータを取得
     */
    public function findAllInfo()
    {
        return Inform::all()->sortByDesc("sentence_number");
    }

    /**
     *  新規登録処理 
     */
    public function InsertInforms($request)
    {

        return $this->create([
            'sentence_number' => $request->sentence_number,
            'annai_type' => $request->annai_type,
            'annai_title' => $request->annai_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'annai_test' => $request->annai_test,
            'touroku_person' => $request->touroku_person,
        ]);
    }

    /**
     *  アップデート処理
     */
    public function UpdateInfo($request, $infos)
    {
        $result = Inform::fill([
            'sentence_number' => $request->sentence_number,
            'annai_type' => $request->annai_type,
            'annai_title' => $request->annai_title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'annai_test' => $request->annai_test,
            'touroku_person' => $request->touroku_person,
        ])->save();

        return $result;
    }
}
