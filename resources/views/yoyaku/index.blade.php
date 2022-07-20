@extends('layouts.app')

@section('title', 'ホーム')

@include('layouts.header_name')

@section('content')

<div class="content">
    <img src="{{ asset('images/SaijyoHome.jpg') }}">
</div>

@isset($session_err)
    <div class="err_message" style="color:red;">
        セッションタイムアウトです。もう一度ログインし直してください。
    </div>
@endif

@if(session('session_del'))
    <div class="session_del" style="color:red;">
        {{ session('session_del') }}
    </div>
@endif


<div class="row m-3">

    <div class="col-4 top_left_text">
        <h4>オンライン予約はこちらから</h4> 
    </div>

        <div class="col-3" id="aki_div">
            <a href="#" class="btn btn-secondary" id="yoyaku_btn_01">
                空き状況確認
            </a>
        </div>

        <div class="col-3">
            <a href="{{ route('yoyaku.login') }}" 
            class="btn btn-secondary" id="yoyaku_btn_02">
                ログイン
             </a>
        </div>

</div> <!-- row END -->

<div class="strong alignL" id="goriyou_div">ご利用の手引き：システムの詳細な操作方法は<a href="" target="_blank">
    <span>こちら</span></a>からダウンロードできます。
</div>

<div class="row top_toiawase m-2" id="toiawase_mado_div">
    お問い合わせ窓口：{{ $saijou_tel }}
</div> <!-- row END -->

@foreach($go_index_oshirase as $osirase)

<div class="osirase">
    <p style="text-align: left;"><strong>{{ $osirase->annai_title }}</strong></p>
    <p style="text-align: left;">{{ $osirase->start_date }}</p>
    <div style="text-align: left;">{{ $osirase->annai_test }}</div>
</div>


<HR>


@endforeach

@endsection