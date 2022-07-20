@extends('layouts.app')

@section('title', '予約フォーム')

@include('layouts.header_name')

@section('content')

<p>新規登録</p>

<form id="form1" method="post" action="{{ route('yoyaku.yoyaku_form_store') }}">
@csrf
<p class="a_left">■予約情報</p>

<!--
<input type="hidden" name="renban" value="">
-->

<!-- 受付番号 -->
<input type="hidden" name="uketuke_bangou" value="{{ $uketuke_bangou }}">

<table class="list">
    <colgroup><col width="25%"><col width="75%"></colgroup>
    <tbody>

    <tr><th class="alignL">火葬予約日時</th>
            <td class="alignL">
                <input type="hidden" name="yoyakubi_date" value="{{ $y }} {{ $m }}">{{ $yoyaku_date }} {{ $m }} 時
        </td>
    </tr>

    <tr><th class="alignL">待合室利用</th>
            <td class="alignL"><span class="attention"></span>
                <span style=""><label><input type="radio" name="room_type" value="0" checked="checked">利用する</label>
        <label><input type="radio" name="room_type" value="1">洋室</label>
        <label><input type="radio" name="room_type" value="2">和室</label>
        <label><input type="radio" name="room_type" value="3">利用しない</label></span>
        </td>
    </tr>

<tr><th class="alignL">霊柩車利用</th><td class="alignL"><span class="attention"></span><span style=""><label>
<input type="radio" name="car_type" value="0" checked="checked">利用しない</label>
<label><input type="radio" name="car_type" value="1">特別車</label>
<label><input type="radio" name="car_type" value="2">普通車</label></span>
<span style="margin-left:20px;"></span>出棺時刻：<select name="car_dtkb" id="car_dtkb" style="">
<option value="" selected="">未選択</option><option label="前日" value="-1">前日</option>
<option label="当日" value="0">当日</option>
</select>

<!-- 出棺時間 -->
<select name="car_time" id="car_time" style="">
    <option value="" selected="">未選択</option>

@for($i = 7; $i <= 20; $i++)
    @for($j = 0; $j <= 5; $j++)
    <option label="{{$i}}:{{$j}}0" value="{{$i}}:{{$j}}0">{{$i}}:{{$j}}0</option>
    @endfor
@endfor


</select><br>出棺場所：<input type="text" name="car_place" value="" maxlength="200" style=";" class="box300">
<span class="alignL attention">※住所、会館名等を入力します。</span></td>
</tr>

<tr><th class="alignL">通夜式利用</th><td class="alignL"><span class="attention"></span><span style=""><label>
    <input type="radio" name="tsuya_type" value="0" checked="checked">利用しない</label>
<label><input type="radio" name="tsuya_type" value="1">利用する</label></span>

<span style="margin-left:20px;"></span>開始時刻：<select name="tsuya_dtkb" id="tsuya_dtkb" style="">
<option label="前日" value="-1" selected="selected">前日</option>
<option label="当日" value="0">当日</option>
</select>


<select name="tsuya_time" id="tsuya_time" style="">
    <option value="" selected="">未選択</option>
@for($i = 7; $i <= 20; $i++)
    @for($j = 0; $j <= 5; $j++)
    <option label="{{$i}}:{{$j}}0" value="{{$i}}:{{$j}}0">{{$i}}:{{$j}}0</option>
    @endfor
@endfor

</select></td>
</tr>

<tr><th class="alignL">葬儀式場利用</th><td class="alignL"><span class="attention"></span>
    <span style=""><label><input type="radio" name="shiki_type" value="0">利用しない</label>
<label><input type="radio" name="shiki_type" value="1" checked="checked">利用する</label></span>
<span style="margin-left:20px;"></span>開始時刻：<select name="shiki_dtkb" id="shiki_dtkb" style="">
<option label="前日" value="-1">前日</option>
<option label="当日" value="0" selected="selected">当日</option>
</select>

<select name="shiki_time" id="shiki_time" style="">
    <option value="" selected="">未選択</option>
@for($i = 7; $i <= 20; $i++)
    @for($j = 0; $j <= 5; $j++)
    <option label="{{$i}}:{{$j}}0" value="{{$i}}:{{$j}}0">{{$i}}:{{$j}}0</option>
    @endfor
@endfor
</select></td>
</tr>

<tr><th class="alignL">火葬区分</th><td class="alignL"><span class="attention"></span>
    <span style=""><label><input type="radio" name="kasou_type" value="0" checked="checked">大人(12歳以上)</label>
<label><input type="radio" name="kasou_type" value="1">小人(12歳未満)</label></span></td>
</tr>

<tr><th class="alignL">死亡者の居住地</th><td class="alignL"><span class="attention"></span>
    <span style=""><label><input type="radio" name="region_type" value="0" checked="checked">市内</label>
<label><input type="radio" name="region_type" value="1">市外</label></span></td>
</tr>

<tr><th class="alignL">受付番号</th><td class="alignL">{{ $uketuke_bangou }}</td>
</tr></tbody>
</table>

<!-- =======申請者情報======== -->
<p class="a_left">■申請者情報</p>
<table class="list h-adr">
    <colgroup><col width="25%"><col width="75%"></colgroup>
    <tbody>
        <tr><th class="alignL"><font color="red">申請者氏名</font></th>
            <td class="alignL">
        @if($errors->first('applicant_name01'))
            <span class="form_err_message_01">{{ $errors->first('applicant_name01') }}</span>
        @endif
            <span class="attention"></span>姓：<input type="text" name="applicant_name01" value="" maxlength="50" style=";" class="box30">　
        
        @if($errors->first('applicant_name02'))
            <span class="form_err_message_01">{{ $errors->first('applicant_name02') }}</span>
        @endif
         名：<input type="text" name="applicant_name02" value="" maxlength="50" style=";" class="box30"></td>
        </tr>
        <tr><th class="alignL">申請者カナ</th><td class="alignL"><span class="attention"></span>姓：<input type="text" name="applicant_kana01" value="" maxlength="50" style=";" class="box30">　名：<input type="text" name="applicant_kana02" value="" maxlength="50" style=";" class="box30"><br><span class="alignL attention">※カナは、全角カタカナで入力します。</span></td></tr>
        <tr><th class="alignL">連絡先TEL</th><td class="alignL"><span class="attention"></span><input type="text" name="applicant_tel01" value="" maxlength="6" size="6" class="box6" style=";">- <input type="text" name="applicant_tel02" value="" maxlength="6" size="6" class="box6" style=";">- <input type="text" name="applicant_tel03" value="" maxlength="6" size="6" class="box6" style=";"></td></tr>
        <tr><th class="alignL">故人との続柄</th><td class="alignL"><span class="attention"></span><span style=""><label><input type="radio" name="applicant_rel" value="0" checked="checked">親族</label>
<label><input type="radio" name="applicant_rel" value="1">その他</label></span></td></tr>

<tr><th class="alignL">郵便番号</th><td class="alignL">
    <span class="attention"></span>〒 
    <input type="text" name="applicant_zip01" value="" maxlength="3" size="6" class="box6" style="ime-mode:disabled;">- 
    <input type="text" name="applicant_zip02" value="" maxlength="4" size="6" class="box6" style="ime-mode:disabled;">
    <button type="button" class="ajaxzip3">郵便→住所</button>
</td>
</tr>

<tr>
    <th class="alignL">住所</th><td class="alignL"><span class="attention"></span>町名まで：
    <input type="text" name="applicant_address1" value="" maxlength="200" style=";" class="box240"><span style="margin-left:20px;"></span>番地以降：
    <input type="text" id="addr1" name="applicant_address2" value="" maxlength="200" style=";" class="box240"></td>
</tr>

</tbody>
</table>
<!-- =======申請者情報　END======== -->

<!-- =======死亡者情報 ========== -->
<p class="a_left">■死亡者情報</p>
<table class="list"><colgroup><col width="25%"><col width="75%"></colgroup><tbody>
    <tr><th class="alignL">死亡者氏名</th><td class="alignL"><span class="attention"></span>姓：<input type="text" name="dead_name01" value="" maxlength="50" style=";" class="box30">　名：<input type="text" name="dead_name02" value="" maxlength="50" style=";" class="box30"></td></tr><tr><th class="alignL">死亡者カナ</th><td class="alignL"><span class="attention"></span>姓：<input type="text" name="dead_kana01" value="" maxlength="50" style=";" class="box30">　名：<input type="text" name="dead_kana02" value="" maxlength="50" style=";" class="box30"><br><span class="alignL attention">※カナは、全角カタカナで入力します。</span></td></tr>
    <tr><th class="alignL">性別</th><td class="alignL"><span class="attention"></span>
        <span style=""><label><input type="radio" name="dead_sex" value="0">男性</label>
<label><input type="radio" name="dead_sex" value="1">女性</label>
<label><input type="radio" name="dead_sex" value="2">不詳</label></span></td></tr><tr><th class="alignL">生年月日</th>
    <td class="alignL"><select name="dead_birth_koyomi_type" style="">
        <option value="" selected="">未選択</option>

<option label="西暦" value="-1">西暦</option>

<!-- 和暦テーブルから参照 -->
@foreach ($wareki_arr as $wa)
    <option label="{{ $wa->gengou }}" value="{{ $wa->id}}">{{$wa->gengou}}</option>
@endforeach
<!-- 和暦テーブルから参照  END -->

<!--
<option label="令和" value="4">令和</option>
<option label="平成" value="3">平成</option>
<option label="昭和" value="2">昭和</option>
<option label="大正" value="1">大正</option>
<option label="明治" value="0">明治</option>
-->
</select>

<input type="text" name="dead_birth_year" value="" maxlength="50" style=";" size="6" class="box6">年&nbsp;

<select name="dead_birth_month" style="">
     <option value="" selected="">未選択</option>
@for($i = 1; $i <= 12; $i++)
   <option label="{{ $i }}" value="{{ $i }}">{{ $i }}</option>
@endfor
</select>月&nbsp;

<select name="dead_birth_day" style=""><option value="" selected="">未選択</option>

@for($i = 1; $i <= 31; $i++)
    <option label="{{ $i }}" value="{{ $i }}">{{ $i }}</option>
@endfor

</select>日</td></tr>

<tr><th class="alignL">死亡年月日</th><td class="alignL"><select name="dead_koyomi_type" style="">
    <option value="" selected="">未選択</option>
    <option label="西暦" value="-1">西暦</option>

<!-- 和暦テーブルから参照 -->
@foreach ($wareki_arr as $wa)
    <option label="{{ $wa->gengou }}" value="{{ $wa->id}}">{{$wa->gengou}}</option>
@endforeach
<!-- 和暦テーブルから参照  END -->

<!--
<option label="令和" value="4">令和</option>
<option label="平成" value="3">平成</option>
<option label="昭和" value="2">昭和</option>
<option label="大正" value="1">大正</option>
<option label="明治" value="0">明治</option>
</select>
-->

<input type="text" name="dead_year" value="" maxlength="50" style=";" size="6" class="box6">年&nbsp;
<select name="dead_month" style="">
    <option value="" selected="">未選択</option>
@for($i = 1; $i <= 12; $i++)
   <option label="{{ $i }}" value="{{ $i }}">{{ $i }}</option>
@endfor

</select>月&nbsp;
<select name="dead_day" style="">
    <option value="" selected="">未選択</option>
@for($i = 1; $i <= 31; $i++)
    <option label="{{ $i }}" value="{{ $i }}">{{ $i }}</option>
@endfor
</select>日</td></tr>

<tr><th class="alignL">郵便番号</th><td class="alignL"><span class="attention"></span>〒 
    <input type="text" name="dead_zip01" value="" maxlength="3" size="6" class="box6" style="ime-mode:disabled;;">- 
    <input type="text" name="dead_zip02" value="" maxlength="4" size="6" class="box6" style="ime-mode:disabled;;">
    <button type="button" class="ajaxzip3_2">郵便→住所</button></td>
</tr>

    <tr><th class="alignL">住所</th><td class="alignL"><span class="attention"></span>町名まで：<input type="text" name="dead_address1" value="" maxlength="200" style=";" class="box240">
        <span style="margin-left:20px;"></span>
        番地以降：<input type="text" id="addr2" name="dead_address2" value="" maxlength="200" style=";" class="box240">
    </td></tr>
        
        <tr><th class="alignL">郵便番号（本籍）</th><td class="alignL"><span class="attention"></span>
            〒 <input type="text" name="dead_honseki_zip01" value="" maxlength="3" size="6" class="box6" style="ime-mode:disabled;;">- 
            <input type="text" name="dead_honseki_zip02" value="" maxlength="4" size="6" class="box6" style="ime-mode:disabled;;">
             <button type="button" class="ajaxzip3_3">郵便→住所</button></td>
            </tr>
            
            <tr><th class="alignL">本籍</th><td class="alignL"><span class="attention"></span>
        町名まで：<input type="text" name="dead_honseki_address1" value="" maxlength="200" style=";" class="box240"><span style="margin-left:20px;"></span>番地以降：
        <input type="text" id="addr3" name="dead_honseki_address2" value="" maxlength="200" style=";" class="box240"></td>
</tr>
</tbody>
</table>
<!-- =======死亡者情報 END ========== -->

<!-- =======業者情報 ========== -->
<p class="a_left">■業者情報</p>
<table class="list">
    <colgroup><col width="25%"><col width="75%"></colgroup>
    <tbody>
        <tr><th class="alignL">担当者</th><td class="alignL">{{ $an_name }}</td></tr>
        <tr><th class="alignL">メールアドレス</th><td class="alignL">{{ $an_mail }}</td></tr>

<!--
<tr><th class="alignL">FAX送付</th><td class="alignL"><span class="attention"></span>
            <span style=""><label><input type="radio" name="stuff_fax_flg" value="0" checked="checked">送信しない</label>
<label><input type="radio" name="stuff_fax_flg" value="1">送信する</label></span></td>
</tr>
-->

<!--
<tr><th class="alignL">FAX番号</th><td class="alignL"><span class="attention"></span>
    <input type="text" name="stuff_fax01" value="0256" maxlength="6" size="6" class="box6" style=";">- <input type="text" name="stuff_fax02" value="34" maxlength="6" size="6" class="box6" style=";">- <input type="text" name="stuff_fax03" value="2795" maxlength="6" size="6" class="box6" style=";">
</td>
</tr>
-->

<tr><th class="alignL">連絡事項</th><td class="alignL"><span class="attention"></span>
        <textarea name="stuff_info" cols="50" rows="5" style=";"></textarea></td>
</tr>
</tbody>

</table>

<button type="submit" class="btn btn-secondary">登録する</button>
<!-- =======業者情報 END ========== -->

</form>


<script>

//=============== 申請者 郵便番号 => 住所　自動取得処理 ===============
$(function(){ 
  $('.ajaxzip3').on('click', function(){
    AjaxZip3.zip2addr('applicant_zip01','applicant_zip02','applicant_address1','applicant_address1');

    //成功時に実行する処理
    AjaxZip3.onSuccess = function() {
        $('#addr1').focus();
    };
    
    //失敗時に実行する処理
    AjaxZip3.onFailure = function() {
        alert('郵便番号に該当する住所が見つかりません');
    };
     
});

});
//=============== 申請者 郵便番号 => 住所　自動取得処理  END ===============

//=============== 死亡者情報 郵便番号 => 住所　自動取得処理 ===============
$(function(){ 
  $('.ajaxzip3_2').on('click', function(){
    AjaxZip3.zip2addr('dead_zip01','dead_zip02','dead_address1','dead_address1');

    //成功時に実行する処理
    AjaxZip3.onSuccess = function() {
        $('#addr2').focus();
    };
    
    //失敗時に実行する処理
    AjaxZip3.onFailure = function() {
        alert('郵便番号に該当する住所が見つかりません');
    };
     
});

});
//=============== 死亡者情報 郵便番号 => 住所　自動取得処理  END ===============

//=============== 死亡者情報 郵便番号 => 住所　自動取得処理 ===============
$(function(){ 
  $('.ajaxzip3_3').on('click', function(){
    AjaxZip3.zip2addr('dead_honseki_zip01','dead_honseki_zip02','dead_honseki_address1','dead_honseki_address1');

    //成功時に実行する処理
    AjaxZip3.onSuccess = function() {
        $('#addr3').focus();
    };
    
    //失敗時に実行する処理
    AjaxZip3.onFailure = function() {
        alert('郵便番号に該当する住所が見つかりません');
    };
     
});

});
//=============== 死亡者情報 郵便番号 => 住所　自動取得処理  END ===============


</script>




@endsection

