@extends('kanri.app')

@section('title', 'お知らせ修正')

@section('kanri_content')


<h1>詳細表示</h1>

<div>
文章番号
{{$show_table->sentence_number}}
</div>

<div>
案内種別
{{$show_table->annai_type}}
</div>

<div>
表題
{{$show_table->annai_title}}
</div>

@endsection