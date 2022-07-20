<?php

namespace App\Http\Controllers;

use App\Models\Wareki;

use Illuminate\Http\Request;

class WarekiController extends Controller
{

    public function __construct()
    {
        $this->wareki = new Wareki();
    }

    // 一覧画面
    public function index()
    {
        $warekis = $this->wareki->findAllWarekis();
        return view('wareki.index', ['warekis' => $warekis]);
    }

    // 登録画面表示
    public function create(Request $request)
    {
        return view('wareki.create');
    }

    // 登録処理
    public function store(Request $request)
    {
        $registerWareki = $this->wareki->InsertWareki($request);

        // リダイレクト処理
        return redirect()->route('wareki.index');
    }

    // 詳細画面
    public function show($id)
    {
        $wareki = Wareki::find($id);

        return view('wareki.show', compact('wareki'));
    }

    // 編集画面
    public function edit($id)
    {
        $wareki = Wareki::find($id);

        return view('wareki.edit', compact('wareki'));
    }

    // 更新処理
    public function update(Request $request, $id)
    {
        $wareki = Wareki::find($id);

        $update_wareki = $this->wareki->updateWareki($request, $wareki);

        return redirect()->route('wareki.index');
    }

    /**
     *  削除処理
     */
    public function destroy($id)
    {
        // テーブルから指定の ID のレコードを１件取得
        $wareki = Wareki::find($id);
        // レコード削除
        $wareki->delete();
        // リダイレクト
        return redirect()->route('wareki.index');
    }
}
