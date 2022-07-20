<?php

namespace App\Http\Controllers;

use App\Models\Inform;

use Illuminate\Http\Request;

class InformController extends Controller
{
    // コンストラクター
    public function __construct()
    {
        $this->info = new Inform();
    }

    // 一覧表示
    public function index()
    {
        $infos = $this->info->findAllInfo();

        $out_put = session()->get('an_name');

        return view('info.index', compact('infos', 'out_put'));
    }

    // 新規登録 画面表示
    public function create(Request $request)
    {

        return view('info.create');
    }

    // 新規登録　処理
    public function store(Request $request)
    {
        $registerInfo = $this->info->InsertInforms($request);
        // リダイレクト処理
        return redirect()->route('info.index');
    }

    // 詳細画面
    public function show($id)
    {
        // id で抽出
        $infos = Inform::find($id);
        return view('info.show', compact('infos'));
    }

    // 編集画面
    public function edit($id)
    {
        $infos = Inform::find($id);
        return view('info.edit', compact('infos'));
    }

    // 編集処理
    public function update(Request $request, $id)
    {
        $infos = Inform::find($id);

        $update_info = $this->info->UpdateInfo($request, $infos);
        return redirect()->route('info.index');
    }

    /**
     *  削除処理
     */
    public function destroy($id)
    {
        $info = Inform::find($id);
        $info->delete();

        // リダイレクト
        return redirect()->route('info.index');
    }
}
