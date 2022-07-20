@extends('layouts.app')

@section('title', 'ログイン中')

@include('layouts.header_name')

@section('content')

{{ $an_mail }}

{{ $an_gyou_num }}
{{ $an_tantou }}

<p>ログイン中</p>

@if ($select_kanrisya_frg == 1) 

    <p><a href="{{ route('kanri.index') }}">管理メニュー</a></p>

    <p><a href="{{ route('kanri_menu.index') }}">管理メニュー</a></p>
@else  

    <p><a href="#">ユーザー保守</a></p>
@endif

<p><a href="{{ route('pdf.pdf_output') }}">許可申請書 テスト</a></p>

<p>ユーザー名： {{ $username }} </p>
<p> {{ $password }} </p>
<p>管理者コード {{ $select_kanrisya_frg }}</p>


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
@foreach($arr_day_h as $a_day_h) 
<th scope="col">{{ $a_day_h }}</th>
@endforeach
</tr>
</thead>

 <tbody>

@foreach($arr_time as $a_time)
<tr>
    <th>{{ $a_time }}</th>

    @foreach($arr_day as $a_day) 
     
         <th scope="col"><a href="{{ route('yoyaku.yoyaku_form') }}?y={{ $a_day }}&m={{ $a_time }}">3</a></th>
    
     @endforeach
 </tr>
@endforeach

 </tbody>

</table>

</div> <!-- END table-responsive -->
@endsection