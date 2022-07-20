@extends('layouts.app')

@section('title', '予約フォーム完了画面')

@include('layouts.header_name')

@section('content')

<p>登録が完了しました。</p>

<div class="row m-3">

        <div class="col-3">
            <a href="{{ route('yoyaku.yoyaku_joukyou') }}" class="btn btn-secondary">
                予約状況確認
            </a>
        </div>

        <div class="col-3">
            <a href="{{ route('yoyaku.login_top') }}" class="btn btn-secondary">
                空き状況確認
            </a>
        </div>

        <div class="col-3">
            <a href="{{ route('yoyaku.login') }}" class="btn btn-secondary">
                ログアウト
             </a>
        </div>

</div> <!-- row END -->


@endsection