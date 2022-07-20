@extends('layouts.app')

@section('title', 'ログイン')

@section('content')

<!-- 斎場名 -->
<div class="header">
    <div class="header_wrap">
        <div class="header_line">
            <a href="{{ route('yoyaku.index') }}">斎場予約システム</a>
        </div>
    </div>
</div>
<!-- 斎場名　END -->

<div>
    <span class="strong">{{ $get_wareki }} {{ $get_wa_nendo }}年 {{ $dt }}（{{ $youbi }}）{{$dt_time}} </span></div>

<!-- エラーメッセージ -->
@if (session('err_message'))
    <div class="err_message" style="color:red;">
        {{ session('err_message') }}
    </div>
@endif

<?php
if ($errors->any()) {
    foreach($errors->all() as $error) {
        echo '<p style="color:red;">' . e($error) . '</p>';
    }
}
?>

<!-- パスワード変更 OK 処理 -->
@if(session('ok_pass_change'))
    <p styel="color:blue; font-size:22px;">
        {{ session('ok_pass_change') }}
    </p>
@endif
<!-- パスワード変更 OK 処理  END　-->

<div class="login_form">
    <form action="{{ route('yoyaku.login_in')}}" method="post">
        {{ csrf_field() }}

        <p><span class="login_text">ユーザーID</span><input type="text" name="an_user"></p>
        <p><span class="login_text">パスワード</span><input type="text" name="an_password"></p>

<div class="saijo_btn_g">
       <button type="submit" class="btn btn-secondary">ログインする</button>
        <button type="button" class="btn btn-secondary">キャンセル</button>
        <button type="button" class="btn btn-secondary"><a href="{{ route('yoyaku.index') }}" style="color: #fff !important;" >戻る</a></button>
</div>

    </form>

    <span class="strong">注）IDを忘れた場合は、斎場へ問合せください。</span>
</div>



@endsection