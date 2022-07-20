@extends('kanri.app')

@section('title', 'お知らせ詳細')

@section('kanri_content')

<h1>詳細表示</h1>

<table class="table table-bordered">
     <thead>
<tr>
<th>ID</th>
<th>文章番号</th>
<th>案内種別</th>
<th>表題</th>
<th>開始日付</th>
<th>終了日付</th>
<th>開始時刻</th>
<th>終了時刻</th>
<th>案内文章</th>
<th>登録担当</th>
</tr>
     </thead>

<tbody>
<tr>
<td>{{$infos->id}}</td>
<td>{{$infos->sentence_number}}</td>
<td>{{$infos->annai_type}}</td>
<td>{{$infos->annai_title}}</td>
<td>{{$infos->start_date}}</td>
<td>{{$infos->end_date}}</td>
<td>{{$infos->start_time}}</td>
<td>{{$infos->end_time}}</td>
<td>{{$infos->annai_test}}</td>
<td>{{$infos->touroku_person}}</td>

</tbody>

</table>

<p><a href="{{ route('info.index') }}">お知らせ登録 一覧</a></p>


@endsection