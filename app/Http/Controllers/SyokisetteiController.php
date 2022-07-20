<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SyokisetteiController extends Controller
{
    // 初期設定　一覧表示
    public function index()
    {

        // AllSelect
        $Syokisettei = \Common_func::AllSelect('初期設定');
        //        $Syokisettei = \Common_func::OrderBySelect('初期設定');
        return view('syokisettei.index', [
            'Syokisettei' => $Syokisettei
        ]);
    }
}
