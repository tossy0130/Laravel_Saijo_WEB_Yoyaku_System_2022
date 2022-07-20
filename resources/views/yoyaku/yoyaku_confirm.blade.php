@extends('layouts.app')

@section('title', '予約フォーム確認画面')

@include('layouts.header_name')

@section('content')

<form name="form1" id="form1" method="post" action="{{ route('yoyaku.yoyaku_confirm_send') }}">

    @csrf

    <input type="hidden" name="transactionid" value="a8515540b96018ac44f1a7277b063f5b96191a95">
    <input type="hidden" name="mode" value="entry_confirm">
    <input type="hidden" name="yoyaku_time" value="">
    <input type="hidden" name="renban" value="20220625-001">

    <input type="hidden" name="uketuke_bangou" value="{{ $arr_input['uketuke_bangou'] }}">

    <!-- ======================= フォーム 値 ■予約情報 部分  =======================  -->

    <input type="hidden" name="room_type" value="{{ $arr_input['room_type'] }}">

    <input type="hidden" name="car_type" value="{{ $arr_input['car_type'] }}">
    <input type="hidden" name="car_dtkb" value="{{ $arr_input['car_dtkb'] }}">
    <input type="hidden" name="car_time" value="{{ $arr_input['car_time'] }}">
    <input type="hidden" name="car_place" value="{{ $arr_input['car_place'] }}">

    <input type="hidden" name="tsuya_type" value="{{ $arr_input['tsuya_type'] }}">
    <input type="hidden" name="tsuya_dtkb" value="{{ $arr_input['tsuya_dtkb'] }}">
    <input type="hidden" name="tsuya_time" value="{{ $arr_input['tsuya_time'] }}">

    <input type="hidden" name="shiki_type" value="{{ $arr_input['shiki_type'] }}">
    <input type="hidden" name="shiki_dtkb" value="{{ $arr_input['shiki_dtkb'] }}">
    <input type="hidden" name="shiki_time" value="{{ $arr_input['shiki_time'] }}">

    <input type="hidden" name="kasou_type" value="{{ $arr_input['kasou_type'] }}">
    <input type="hidden" name="region_type" value="{{ $arr_input['region_type'] }}">

    <input type="hidden" name="applicant_name01" value="{{ $arr_input['applicant_name01'] }}">
    <input type="hidden" name="applicant_name02" value="{{ $arr_input['applicant_name02'] }}">

    <input type="hidden" name="applicant_kana01" value="{{ $arr_input['applicant_kana01'] }}">
    <input type="hidden" name="applicant_kana02" value="{{ $arr_input['applicant_kana02'] }}">

    <input type="hidden" name="applicant_tel01" value="{{ $arr_input['applicant_tel01'] }}">
    <input type="hidden" name="applicant_tel02" value="{{ $arr_input['applicant_tel02'] }}">
    <input type="hidden" name="applicant_tel03" value="{{ $arr_input['applicant_tel03'] }}">

    <input type="hidden" name="applicant_rel" value="{{ $arr_input['applicant_rel'] }}">

    <input type="hidden" name="applicant_kana01" value="{{ $arr_input['applicant_kana01'] }}">
    <input type="hidden" name="applicant_kana02" value="{{ $arr_input['applicant_kana02'] }}">
  

<div id="confirm_message"><span class="strong">新規登録確認</span>
    <br><span class="strong">{{ $yoyaku_date }}受付番号:{{ $yoyaku_date_f }}-001の登録をします。よろしいですか？</span><br>
    <span class="small">(※この段階では入力はまだ確定しておりません。下部OKボタンを押して下さい。)
    </span><br>
</div>


<p class="a_left">■予約情報</p>
<table class="list">
    <colgroup><col width="25%"><col width="75%"></colgroup>
    <tbody>
    <tr><th class="alignL">火葬予約日時</th>
            <td class="alignL">
                {{ $yoyaku_date }} {{ $s_m }}時
            </td>
    </tr>

    <tr><th class="alignL">待合室利用</th>
            <td class="alignL"><span class="attention"></span>
                <span style="">
            
            @if($arr_input['room_type'] == 0) 
                    利用する
            @elseif($arr_input['room_type'] == 1) 
                    洋室
            @elseif($arr_input['room_type'] == 2)
                    和室
            @else
                    利用しない
            @endif
        </td>
    </tr>


<tr><th class="alignL">霊柩車利用</th><td class="alignL"><span class="attention"></span>

@if($arr_input["car_type"] == 0)
    利用しない 
@elseif($arr_input["car_type"] == 1)
    特別車 
@else
    普通車 
@endif

<!-- 霊柩車　時間 -->
@isset($arr_input["car_time"])
    {{ $arr_input["car_time"] }}
@endisset

    <span style="">
    <label>

    </label>
</td>
</tr>

<tr><th class="alignL">通夜式利用</th><td class="alignL"><span class="attention"></span>

@if($arr_input["tsuya_type"] == 0)
    利用しない 
@else
    利用する 
@endif

<!-- 通夜式時間 -->
@isset($arr_input['tsuya_dtkb'])
    @if($arr_input["tsuya_dtkb"] == 0)
        当日
    @else
        前日
    @endif
@endisset
  
</td>
</tr>

<!-- 葬儀式場利用 -->
<tr><th class="alignL">葬儀式場利用</th><td class="alignL"><span class="attention"></span>

@if($arr_input["shiki_type"] == 0)
    利用しない 
@else
    利用する 
@endif

@isset($arr_input['shiki_dtkb'])
    @if($arr_input["shiki_dtkb"] == 0)
        当日
    @else
        前日
    @endif
@endisset

</td>
</tr>

<!-- 火葬区分 -->
<tr><th class="alignL">火葬区分</th><td class="alignL"><span class="attention"></span>

@if($arr_input["kasou_type"] == 0)
    大人(12歳以上) 
@else
    小人(12歳未満) 
@endif

</td>
</tr>

<!-- 死亡者の居住地 -->
<tr><th class="alignL">死亡者の居住地</th><td class="alignL"><span class="attention"></span>
@if($arr_input["region_type"] == 0)
    市内  
@else
    市外 
@endif

</td>
</tr>

<!-- 受付番号	 -->
<tr><th class="alignL">受付番号	</th><td class="alignL"><span class="attention"></span>

</td>
</tr>
    </tbody>
</table>


<p class="a_left">■申請者情報</p>
<table class="list">
    <colgroup><col width="25%"><col width="75%"></colgroup>
    <tbody>

<!-- 申請者氏名	 -->
<tr><th class="alignL">申請者氏名</th><td class="alignL"><span class="attention"></span>

    @isset($arr_input["applicant_name01"])
        姓：{{ $arr_input["applicant_name01"] }}
    @endisset

    @isset($arr_input["applicant_name02"])
        名：{{ $arr_input["applicant_name02"] }}
    @endisset

</td>
</tr>

<!-- 申請者カナ	 -->
<tr><th class="alignL">申請者カナ</th><td class="alignL"><span class="attention"></span>

    @isset($arr_input["applicant_kana01"])
        姓：{{ $arr_input["applicant_kana01"] }}
    @endisset

    @isset($arr_input["applicant_kana02"])
        名：{{ $arr_input["applicant_kana02"] }}
    @endisset

</td>
</tr>

<!-- 連絡先TEL	 -->
<tr><th class="alignL">連絡先TEL</th><td class="alignL"><span class="attention"></span>

@isset($arr_input["applicant_tel01"])
        姓：{{ $arr_input["applicant_tel01"] }}
@endisset

@isset($arr_input["applicant_tel02"])
        姓：{{ $arr_input["applicant_tel02"] }}
@endisset

@isset($arr_input["applicant_tel03"])
        姓：{{ $arr_input["applicant_tel03"] }}
@endisset

</td>
</tr>

<!-- 故人との続柄	 -->
<tr><th class="alignL">故人との続柄</th><td class="alignL"><span class="attention"></span>

@if($arr_input["applicant_rel"] == 0)
    親族
@else
    その他
@endif

</td>
</tr>

<!-- 郵便番号	 -->
<tr><th class="alignL">郵便番号</th><td class="alignL"><span class="attention"></span>

    @isset($arr_input['applicant_zip01'])
        {{ $arr_input['applicant_zip01'] }}
    @endisset
    
    @isset($arr_input['applicant_zip02'])
        {{ $arr_input['applicant_zip02'] }}
    @endisset

</td>
</tr>

<!-- 住所	 -->
<tr><th class="alignL">住所</th><td class="alignL"><span class="attention"></span>

    @isset($arr_input['applicant_address1'])
        {{ $arr_input['applicant_address1'] }}
    @endisset
    
    @isset($arr_input['applicant_address2'])
        {{ $arr_input['applicant_address2'] }}
    @endisset

</td>
</tr>
    </tbody>
</table>


<p class="a_left">■死亡者情報</p>
<table class="list">
    <colgroup><col width="25%"><col width="75%"></colgroup>
    <tbody>

<!-- 死亡者氏名	 -->
<tr><th class="alignL">死亡者氏名</th><td class="alignL"><span class="attention"></span>

    @isset($arr_input['dead_name01'])
        {{ $arr_input['dead_name01'] }}
    @endisset
    
    @isset($arr_input['dead_name02'])
        {{ $arr_input['dead_name02'] }}
    @endisset

</td>
</tr>

<!-- 死亡者カナ	 -->
<tr><th class="alignL">死亡者カナ</th><td class="alignL"><span class="attention"></span>

    @isset($arr_input['dead_kana01'])
        {{ $arr_input['dead_kana01'] }}
    @endisset
    
    @isset($arr_input['dead_kana02'])
        {{ $arr_input['dead_kana02'] }}
    @endisset

</td>
</tr>

<!-- 性別 -->
<tr><th class="alignL">性別</th><td class="alignL"><span class="attention"></span>

@isset($arr_input['dead_sex'])

    @if($arr_input["dead_sex"] == 0)
        男性
    @elseif($arr_input["dead_sex"] == 1)
        女性
    @else
        不詳
    @endif

@else
    未選択

@endisset

</td>
</tr>

<!-- 生年月日 -->
<tr><th class="alignL">生年月日</th><td class="alignL"><span class="attention"></span>

<!-- 西暦　和暦 -->
@isset($arr_input['dead_birth_koyomi_type'])
    {{ $arr_input['dead_birth_koyomi_type'] }}
@else
    未選択
@endisset

<!-- 年 -->
@isset($arr_input['dead_birth_year'])
    {{ $arr_input['dead_birth_year'] }}
@else
    未選択
@endisset

<!-- 月 -->
@isset($arr_input['dead_birth_month'])
    {{ $arr_input['dead_birth_month'] }}
@else
    未選択
@endisset

<!-- 日 -->
@isset($arr_input['dead_birth_day'])
    {{ $arr_input['dead_birth_day'] }}
@else
    未選択
@endisset

</td>
</tr>

<!-- 死亡年月日	 -->
<tr><th class="alignL">死亡年月日</th><td class="alignL"><span class="attention"></span>

<!-- 西暦　和暦 -->
@isset($arr_input['dead_koyomi_type'])
    {{ $arr_input['dead_koyomi_type'] }}
@else
    未選択
@endisset

<!-- 年 -->
@isset($arr_input['dead_year'])
    {{ $arr_input['dead_year'] }}
@else
    未選択
@endisset

<!-- 月 -->
@isset($arr_input['dead_month'])
    {{ $arr_input['dead_month'] }}
@else
    未選択
@endisset

<!-- 日 -->
@isset($arr_input['dead_day'])
    {{ $arr_input['dead_day'] }}
@else
    未選択
@endisset


</td>
</tr>

<!-- 郵便番号 -->
<tr><th class="alignL">郵便番号</th><td class="alignL"><span class="attention"></span>

<!-- 郵便番号 1 -->
@isset($arr_input['dead_zip01'])
    {{ $arr_input['dead_zip01'] }}
@else
    未選択
@endisset

<!-- 郵便番号 2 -->
@isset($arr_input['dead_zip02'])
    {{ $arr_input['dead_zip02'] }}
@else
    未選択
@endisset

</td>
</tr>

<!-- 住所 -->
<tr><th class="alignL">住所</th><td class="alignL"><span class="attention"></span>

<!-- 住所 1 -->
@isset($arr_input['dead_address1'])
    {{ $arr_input['dead_address1'] }}
@else
    未選択
@endisset

<!-- 住所 2 -->
@isset($arr_input['dead_address2'])
    {{ $arr_input['dead_address2'] }}
@else
    未選択
@endisset

</td>
</tr>

<!-- 郵便番号（本籍） -->
<tr><th class="alignL">郵便番号（本籍）</th><td class="alignL"><span class="attention"></span>

<!-- 郵便番号 1 -->
@isset($arr_input['dead_honseki_zip01'])
    {{ $arr_input['dead_honseki_zip01'] }}
@else
    未選択
@endisset

<!-- 郵便番号 2 -->
@isset($arr_input['dead_honseki_zip02'])
    {{ $arr_input['dead_honseki_zip02'] }}
@else
    未選択
@endisset


</td>
</tr>

<!-- 本籍 -->
<tr><th class="alignL">本籍</th><td class="alignL"><span class="attention"></span>

<!-- 住所 1 -->
@isset($arr_input['dead_honseki_address1'])
    {{ $arr_input['dead_honseki_address1'] }}
@else
    未選択
@endisset

<!-- 住所 2 -->
@isset($arr_input['dead_honseki_address2'])
    {{ $arr_input['dead_honseki_address2'] }}
@else
    未選択
@endisset


</td>
</tr>


    </tbody>
</table>


<button type="submit" class="btn btn-secondary">登録する</button>

</form>
@endsection

