@extends('layouts.app')

@section('title', 'ユーザー保守トップ')

@include('layouts.header_name')

@section('content')

<p>ユーザー保守</p>

<span class="alignL strong underline clearfix">
    {{ $get_gyousa_name }} 様
</span>

<h4 class="alignL" style="margin:30px 0 0 0;">葬祭業者情報</h4>
<!-- ログインユーザー　業者情報 -->
<table class="list"><colgroup>
    <col width="18%">
    <col width="11%">
    <col width="8%">
    <col width="10%">
    <col width="12%">
    <col width="15%">
   
 
</colgroup>
<tbody>
    <tr><th class="alignC">業者名</th>
        <th class="alignL">代表者名</th>
        <th class="alignL">郵便番号</th>
        <th class="alignC">住所</th>
        <th class="alignC">電話番号</th>
        <th class="alignC">メールアドレス</th>
   
    </tr>
    <tr><td class="alignL"> {{ $get_gyousa_name }}</td>
        <td class="alignL">{{ $get_gyousa_daihyou }}</td>
        <td class="alignL">{{ $get_gyousa_yuubin }}</td>
        <td class="alignL">{{ $get_gyousa_zyuusyo }}</td>
        <td class="alignL">{{ $get_gyousa_tel }}</td>
        <td class="alignL">{{ $get_gyousa_mail }}</td>
    </tr>
</tbody>
</table>

<!-- ログイン　ユーザー情報 -->

<h4 class="alignL" style="margin:30px 0 0 0;">ログインユーザー情報</h4>
<HR>
<div class="login_user alignL">
    <p>ユーザー名：{{$get_user}}</p>
    <p>ユーザーID：{{$get_id}}</p> 
    <p>メールアドレス：{{$get_email}}</p>
    <p>
        ユーザー権限：
        @if($get_gyou_num != 1)
            通常ユーザー
        @else
            管理者ユーザー
        @endif
    </p>
</div>


<div class="alignL" style="margin:30px 0 30px 0;">
<h4>パスワード変更</h4>

<HR>
<p style="margin:15px 0; color:rgb(221, 26, 140);">※新しいパスワードを入力してください。</p>
<!-- パスワード　変更処理 -->

@if(session('err_message'))
    <p style="color:red">{{ session('err_message') }}</p>
@endif

<div id="password-form" class="alignL">
    <form name="form1" id="form1" method="post" action="{{ route('yoyaku.pass') }}">
        @csrf
        <div class="inline"><span class="attention"></span>
            <label for="password_1">パスワード</label>
            <input type="password" name="ch_pass_01" size="10" class="box25"
            style="width: 25%;position: relative;left: 6.7%;">
        </div>

        <div class="inline"><span class="attention"></span>
            <label for="password_1">パスワード（確認）</label>
            <input type="password" name="ch_pass_02" size="10" class="box25" 
            style="width: 25%;">
        </div>

        
        <div class="inline clearfix"><span class="attention"></span>
            <button type="submit" class="btn btn-secondary">パスワードを変更する</button>
        </div>
    
        </form>
    </div>
</div>
<HR>

<div class="row m-3">

    <div class="col-3">
          <a href="{{ route('yoyaku.login_top') }}" class="btn btn-secondary">
                戻る
          </a>
    </div>

        <div class="col-3">
            <a href="#" class="btn btn-secondary">
                空き状況確認
            </a>
        </div>

        <div class="col-3">
            <a href="{{ route('yoyaku.index') }}" class="btn btn-secondary">
                ログアウト
             </a>
        </div>

</div> <!-- row END -->


@endsection