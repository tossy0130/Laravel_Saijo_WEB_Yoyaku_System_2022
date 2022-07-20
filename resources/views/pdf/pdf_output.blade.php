<html lang="ja">
    <head>
        <title>pdf output test</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <style>
            @font-face{
                font-family: migmix;
                font-style: normal;
                font-weight: normal;
                src: url("{{ storage_path('fonts/migmix-2p-regular.ttf')}}") format('truetype');
            }
            @font-face{
                font-family: migmix;
                font-style: bold;
                font-weight: bold;
                src: url("{{ storage_path('fonts/migmix-2p-bold.ttf')}}") format('truetype');
            }
            body {
                font-family: migmix;
                line-height: 80%;
            }
            .main_image {width: 100%;text-align: center;margin: 10px 0;}
            .main_image img{width: 90%;}
            .sushiTable {border: 1px solid #000;border-collapse: collapse;width: 50%;}
            .sushiTable tr th{background: #87cefa;padding: 5px;border: 1px solid #000;}
            .sushiTable tr td{padding: 5px;border: 1px solid #000;}

            .a_left {text-align: left;}
            .a_center {text-align: center;}
            .a_right {text-align: right;}

            .sub_span {display: block;}

            .div_center {position: relative;left: 45%;}

            /* 許可申請書
            *
            */
.print_pages{
  /*A4縦*/
    width: 172mm;
    height: 251mm;
    page-break-after: always;
}

  /*最後のページは改ページを入れない*/
.print_pages:last-child{
    page-break-after: auto;
}


.kyoka_table,th,td{
  border:1px solid #666;
    }

.kyoka_table{
  margin-bottom:10px;
}
.kyoka_table th,td{
  padding:6px;
}

.kyoka_table.border,
.kyoka_table.noborder{
  border-collapse: collapse;
}
.kyoka_table.noborder,
.kyoka_table.noborder th,
.kyoka_table.noborder td{
  border:0;
}

.t_2 {
    width: 100%;
}


.kyokasyo_bottom {
    display: flex !important;
    width: 100%;
}

.clearfix::after {
  content: "";
  display: block;
  clear: both;
}
 
.kyoukasyo_b_left {
    width: 41%;
    border: 2px solid #666;
    margin: 0 15px 0px 0;
    height: 270px;
    float: left;
}


.kyoka_table_bottom_r {
    width: 54%;
    float: right;
}

        </style>
    </head>
    <body>

<section class="print_pages">

        <p class="a_left">第一号様式（第２条関係）</p>
        <p class="a_center">
@php
    print $saijo_name[0] . "斎場使用許可証申請書";
@endphp
</p>
    
        <p class="a_right">{{ $wareki_result }}</p>

<p class="a_right">
@php
    print "（あて先）" . $saijo_name[0] . "指定管理者";
@endphp
</p>   

<div class="div_center">
    <span class="sub_span">住　所</span>
    <span class="sub_span">申請者　氏　名</span>
    <div>法人その他の団体にあっては、主たる事<br />
        務室又は事業所の所在地、名称及び代表<br />
        者の氏名
    </div>
    <span class="sub_span">電　話</span>
</div>

<p class="a_left">
@php
    print "次のとおり、" . $saijo_name[0] . "を使用したいので申請します。";
@endphp
 </p>

    <table class="kyoka_table" cellspacing="0">
            <tr>
                <td rowspan="2">火葬炉</td>
                <td>人体</td>
                <td colspan="2">令和 ○○年 ○月○○日 ○○時○○分着</td> 
            </tr>

            <tr>
                <td>汚染物</td>
                <td colspan="2"><span>個</span></td>
            </tr>

            <tr>
                <td>霊安室</td>
                <td colspan="3"><span>年</span><span>月</span><span>日</span><span>時</span><span>分から</span>
                    <span>月</span><span>日</span><span>時</span><span>分まで</span>
                </td>
            </tr>

            <tr>
                <td>待合室</td>
                <td colspan="3"><span>令和04年</span><span>5月</span><span>12日</span><span>12時</span><span>30分から</span>
                    <span>5月</span><span>12日</span><span>14時</span><span>45分まで</span><span>1室</span>
                </td>
            </tr>

            <tr>
                <td>葬儀式場</td>
                <td colspan="3"><span>令和04年</span><span>5月</span><span>11日</span><span>16時</span><span>0分から</span>
                    <span>5月</span><span>12日</span><span>15時</span><span>0分まで</span><span>1室</span>
                </td>
            </tr>

            <tr>
                    <td rowspan="2">霊柩自動車</td>
                    <td rowspan="2">
                         □ 特別者<br />
                         □ 普通車
                    </td>
                    <td>時間</td>
                    <td>令和 ○○年 ○月○○日 ○○時 ○○分ごろ</td>
            </tr>

            <tr>
                    <td>場所</td>
                    <td><span>○市</span><span>から</span><br /> 
                    <span>○市</span><span>まで</span>
                    </td>
            </tr>
        </table>

        <table class="kyoka_table t_2" cellspacing="0">
            <tr>
                <td rowspan="3">死亡者</td>
                <td>氏名</td>
                <td>北条 二時</td>
            </tr>

            <tr>
                <td rowspan="2">区分</td>
                <td>■ 市内居住者 □ 市外居住者（死産児の場合は父又は母の住所）</td>
            </tr>

            <tr>
                <td>■ 大　人　□ 小　人   □ 死産児</td>
            </tr>
        </table>

<div class="kyokasyo_bottom clearfix" style="display:flex !important;">

            <div class="kyoukasyo_b_left">
                <span>備考</span>

                <span>出棺場所</span>
                <span>葬祭業者</span>
            </div>

        
        <div>
        <table class="kyoka_table kyoka_table_bottom_r" cellspacing="0">

            <tr>
                <td colspan="2">区分</td>
                <td>数量</td>
                <td>金額（円）</td>
            </tr>

            <tr>
                <td colspan="2">火葬炉</td>
                <td>1</td>
                <td>3,000</td>
            </tr>

            <tr>
                <td colspan="2">待合室</td>
                <td>1</td>
                <td>0</td>
            </tr>

            <tr>
                <td rowspan="2">霊柩車</td>
                <td>特別車</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td>普通車</td>
                <td></td>
                <td></td>
            </tr>
            
            <tr>
                <td colspan="2">葬儀式場</td>
                <td>1</td>
                <td>83,800</td>
            </tr>

            <tr>
                <td colspan="2">霊安室</td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td colspan="3">合計</td>
                <td>86,800</td>
            </tr>

        </table>
    </div>
    
</div>

</section>


    </body>
</html>