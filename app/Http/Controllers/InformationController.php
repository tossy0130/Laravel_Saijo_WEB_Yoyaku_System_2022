<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

// model 使う ※ Models\Models になってしまっている

// use App\Information_table;
use APP\Models\Information;

use APP\TestInfo;

class InformationController extends Controller
{



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // お知らせ一覧　取得
        $information_tables = DB::table("information_tables")
            ->select(
                'id',
                'sentence_number',
                'annai_type',
                'annai_title',
                'Start_date',
                'End_date',
                'Start_time',
                'End_time',
                'annai_test',
                'touroku_person'
            )
            ->get();

        // お知らせトップ画面
        return view('news.index', compact('information_tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    // === 新規登録 フォーム登録処理
    public function store(Request $request)
    {

        /*
        $information_tables = new Information_tables;

        // === フォーム情報　取得
        $information_tables->sentence_number = $request->input('sentence_number'); // 文章番号
        $information_tables->annai_type = $request->input('annai_type'); // 案内種別
        $information_tables->annai_title = $request->input('annai_title'); // 表題
        $information_tables->Start_date = $request->input('Start_date'); // 開始日付
        $information_tables->End_date = $request->input('End_date'); // 終了日付
        $information_tables->Start_time = $request->input('Start_time'); // 開始時刻
        $information_tables->End_time = $request->input('End_time'); // 終了時刻
        $information_tables->annai_test = $request->input('annai_test'); // 案内文章
        $information_tables->touroku_person = $request->input('touroku_person'); // 登録担当

        $information_tables->save();

        */

        // === フォームインサート処理 ===

        DB::table('information_tables')->insert([
            'sentence_number' => $request->input('sentence_number'), // 文章番号
            'annai_type' => $request->input('annai_type'),  // 案内種別
            'annai_title' => $request->input('annai_title'), // 表題
            'Start_date' => $request->input('Start_date'), // 開始日付
            'End_date' => $request->input('End_date'), // 終了日付
            'Start_time' => $request->input('Start_time'),  // 開始時刻
            'End_time' => $request->input('End_time'), // 終了時刻
            'annai_test' => $request->input('annai_test'), // 案内文章
            'touroku_person' => $request->input('touroku_person'), // 登録担当
        ]);



        // 一覧画面　へ　リダイレクト
        return redirect('news/');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //====== 詳細
    public function show($id)
    {
        //
        //    $show_table = Information_table::find($id);
        // $show_table = Information_table::findOrFail($id);
        $show_table = new Information();
        $show_table = $show_table::find($id);

        return view('news.show', compact('show_table'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
