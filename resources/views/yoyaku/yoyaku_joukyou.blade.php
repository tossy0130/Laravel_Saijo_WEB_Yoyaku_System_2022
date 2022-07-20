@extends('layouts.app')

@section('title', '予約状況')

@include('layouts.header_name')

@section('content')

<div class="login_top_gyousayname_div">
<span class="alignL strong underline clearfix">
{{ $gyousya_name }} 様
</span>
</div>

<table class="list">
    <colgroup>
        <col width="5%">
        <col width="18%">
        <col width="15%">
        <col width="10%">
        <col width="12%">

        <!--
        <col width="8%">
        <col width="12%">
        <col width="8%">
        <col width="10%">
        <col width="2%">
        -->
    </colgroup>
    <tbody>
        <tr>
            <th class="alignC">受付番号</th>
            <th class="alignL">申請者</th>
            <th class="alignL">火葬予約日時</th>
            <th class="alignC">待合室</th>
            <th class="alignC">式場利用</th>
            <th class="alignC">通夜</th>

            <!--
            <th class="alignC">霊安室</th><th class="alignC">担当者</th>
            <th class="alignC">使用許可申請書</th>
            <th class="alignC">分骨<br>申請書</th>
            -->

        </tr>
        
            @for ($i = 0; $i < count($arr_data); $i++)
               <tr> 
                    <td class="alignL">{{ $arr_data[$i] }}</td>
                    <td class="alignL">{{ $arr_data_06[$i] }} {{ $arr_data_07[$i] }}</td>
                    <td class="alignL">{{ $arr_data_02[$i] }}</td>
                    <td class="alignL">
                        @if($arr_data_03[$i] == 0) 
                            利用する
                        @else 
                            利用しない
                       @endif
                    </td>
                    <td class="alignL">
                        @if($arr_data_04[$i] == 0) 
                        利用しない
                        @else
                        利用する
                        @endif
                    </td>
                    <td class="alignL">
                        @if($arr_data_04[$i] == 0) 
                        利用しない
                        @else
                        利用する
                        @endif
                    </td>
                 </tr>
            @endfor

            <!--
                <td class="alignL">09日 17:30</td>
                <td class="alignL">開始:05日 9:00<br>終了:09日 16:00</td>
                <td class="alignL">JIM</td>
                <td class="alignC"><a class="btn_default" href="">PDF</a></td>
                <td class="alignC"><a class="btn_default" href="">PDF</a></td>
            -->
        </tr></tbody></table>


@endsection