<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wareki extends Model
{
    use HasFactory;

    // モデルに関連付けるテーブル
    protected $table = 'warekis';

    // テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    // 登録・更新可能なカラムの指定
    protected $fillable = [
        'id',
        'gengou',
        'ryakusyou',
        'start_date',
    ];

    /**
     * 一覧画面表示用にbooksテーブルから全てのデータを取得
     */
    public function findAllWarekis()
    {
        // 全件抽出
        //   return Wareki::all();

        // 開始日付　が　古い準
        return Wareki::orderBy('start_date', 'asc')->get();
    }

    /**
     *  インサート処理
     */
    public function InsertWareki($request)
    {
        // 
        return $this->create([
            'gengou' => $request->gengou,
            'ryakusyou' => $request->ryakusyou,
            'start_date' => $request->start_date,
        ]);
    }

    /**
     *  アップデート処理
     */
    public function updateWareki($request, $wareki)
    {
        $result = Wareki::fill([
            'gengou' => $request->gengou,
            'ryakusyou' => $request->ryakusyou,
            'start_date' => $request->start_date,
        ])->save();

        return $result;
    }

    /**
     *  form 出力用
     */
    public function FindFrom_View()
    {
        // 開始時間が新しい順
        return Wareki::orderBy('start_date', 'desc')->get();
    }
}
