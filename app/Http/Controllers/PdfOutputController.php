<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

// Carbon クラス読み込み
use Carbon\Carbon;
use Carbon\CarbonImmutable;

class PdfOutputController extends Controller
{
    // ========================　申請許可書 ========================
    public function output()
    {
        // カラム列を取得
        $saijo_name = DB::table('初期設定')->pluck('斎場名');

        // ============= 和暦　取得 ==============

        $now = CarbonImmutable::now(); // ex) 2022-03-01
        $fiscal_year = $now->subMonthNoOverflow(3)->format('Y'); // 2021

        $eras = [
            ['year' => 2019, 'name' => '令和', 'new_Japanese_calendar' => '平成31年度'],
        ];

        $wareki_name = "";
        $wareki_num = "";
        foreach ($eras as $era) {
            // 元年処理
            if ($fiscal_year == $era['year']) {
                $wareki_num = $era['year'];
            }

            // 元年以外
            if ($fiscal_year >= $era['year']) {
                $wareki_name = $era['name'];
                $wareki_num = $fiscal_year - $era['year'] + 1;
            }
        } // === END foreach

        $carbon_today = new Carbon('today');
        $format = 'MM月DD日';

        $get_month = $carbon_today->today()->isoFormat($format);

        $wareki_result = $wareki_name . $wareki_num . "年" . $get_month;

        // ============= 和暦　取得 END ==========


        $pdf = \PDF::loadView('pdf.pdf_output', ['saijo_name' => $saijo_name, 'wareki_result' => $wareki_result]);
        $pdf->setPaper('A4');
        // ブラウザのPDFプレビューモードで開く $pdf->stream();
        return $pdf->stream();
    }

    // ========================　分骨証明申請書 ========================
    public function bunkotu_pdf()
    {

        // カラム列を取得
        $saijo_name = DB::table('初期設定')->pluck('斎場名');

        $pdf = \PDF::loadView('pdf.pdf_bunkotu_output', ['saijo_name' => $saijo_name]);
        $pdf->setPaper('A4');
        // ブラウザのPDFプレビューモードで開く $pdf->stream();
        return $pdf->stream();
    }
}
