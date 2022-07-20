@extends('layouts.app')

@section('title', 'ログイン中')

@include('layouts.header_name')

@section('content')

<div class="login_top_gyousayname_div">
<span class="alignL strong underline clearfix">

@if(isset($top_gyousya['gyousay_code'] ))
   {{ $top_gyousya['gyousay_code'] }} 様<br />
   担当者名： {{ $top_gyousya['tantou_name'] }}
@endif

</span>
</div>


<p><a href="{{ route('pdf.pdf_output') }}">許可申請書 テスト</a></p>

<div class="btn_div_01">
    <button type="button" class="btn btn-secondary"><a href="{{ route('yoyaku.yoyaku_joukyou') }}">予約状況</a></button>
    <button type="button" class="btn btn-secondary">
        <a href="{{ route('yoyaku.user_hosyu') }}">ユーザー情報</a></button>

@if(isset($select_kanrisya_frg))
    @if ($select_kanrisya_frg == 1) 
    <button type="button" class="btn btn-secondary">
        <a href="{{ route('kanri_menu.index') }}">管理メニュー</a>
    </button>
    @endif
@endif
</div>

<!-- ================ 空き状況　カレンダー部分 ============== -->

<div class="table-responsive">
<!--
<table class="table table-bordered table-hover">
-->
<table class="table table-hover">
<thead>
<td colspan="8">凡例）　数字：空き枠数 ○ ： 空きあり ×：空き無し △：時間帯により予約可能</td>

<tr>
    <th scope="col">大式場</ht>
    <th scope="col">×</ht>
    <th scope="col">×</ht>
    <th scope="col">○</ht>
    <th scope="col">○</ht>
    <th scope="col">○</ht>
    <th scope="col">○</ht>
    <th scope="col">○</ht>
</tr>

<tr>
    <th scope="col">小式場</ht>
    <th scope="col">×</ht>
    <th scope="col">○</ht>
    <th scope="col">×</ht>
    <th scope="col">○</ht>
    <th scope="col">○</ht>
    <th scope="col">○</ht>
    <th scope="col">○</ht>
</tr>

<tr>

@if (isset($arr_day_h))
    @foreach($arr_day_h as $a_day_h) 
    <th scope="col">{{ $a_day_h }}</th>
    @endforeach
@endif
</tr>
</thead>

 <tbody>

<!-- 火葬時刻取得 -->
  @if(isset( $arr_kasouWaku_time))
        @for($i = 0; $i < 7; $i++)
    <tr>
        <th>{{ $arr_kasouWaku_time[$i] }}</th>

            @for($j = 0; $j < 7; $j++)
            <th scope="col"><a href="{{ route('yoyaku.yoyaku_form') }}?y={{ $arr_day[$j] }}&m={{ $arr_kasouWaku_time[$i] }}">{{ $arr_kasouWaku_suu[$i] }}</a></th>
            @endfor
        @endfor

    </tr>
 @endif

 </tbody>

</table>

</div> <!-- END table-responsive -->

@endsection