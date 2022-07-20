<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShisetuController extends Controller
{
    /**
     *一覧表示
     * */
    public function index()
    {
        $sisetu = \Common_func::OrderBySelect('施設', '施設番号', 1);
        return view('sisetu.index', ['sisetu' => $sisetu]);
    }
}
