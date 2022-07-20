<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    // === テーブル名 ::: テーブル用途::: お知らせ案内テーブル
    protected $table = "informs";

    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    // ここで初期値を定義する
    //protected $attributes = [];


    // $fillable => 所謂ホワイトリスト
    protected $fillable = [
        "id",
        "sentence_number",  // 文章番号
        "annai_type",   // 案内種別
        "annai_title",  // 表題
        "Start_date",   // 開始日付
        "End_date",     // 終了日付
        "Start_time",   // 開始時刻
        "End_time",     // 終了時刻
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
    public function findAllBooks()
    {
        return Information_table::all();
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
            'Start_date' => $request->Start_date,
            'End_date' => $request->End_date,
            'Start_time' => $request->Start_time,
            'End_time' => $request->End_time,
            'annai_test' => $request->annai_test,
            'touroku_person' => $request->touroku_person,
        ]);
    }
}
