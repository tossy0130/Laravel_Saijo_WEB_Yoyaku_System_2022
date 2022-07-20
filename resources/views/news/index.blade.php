@extends('kanri.index')

@section('title', 'お知らせ管理')

@section('kanri_content')

<h1>お知らせ登録</h1>

<p><a href="{{ route('news.create') }}">新規登録</a></p>

<table class="table table-bordered">
     <thead>
<tr>
<th>文章番号</th>
<th>案内種別</th>
<th>表題</th>
<th>開始日付</th>
<th>終了日付</th>
<th>開始時刻</th>
<th>終了時刻</th>
<th>案内文章</th>
<th>登録担当</th>

<th>詳細</th> 
</tr>
     </thead>
@foreach($information_tables as $inf_table)
 <tbody>
<tr>
<td>{{$inf_table->sentence_number}}</td>
<td>{{$inf_table->annai_type}}</td>
<td>{{$inf_table->annai_title}}</td>
<td>{{$inf_table->Start_date}}</td>
<td>{{$inf_table->End_date}}</td>
<td>{{$inf_table->Start_time}}</td>
<td>{{$inf_table->End_time}}</td>
<td>{{ Str::limit($inf_table->annai_test, 60, '(…)' )}}</td>
<td>{{$inf_table->touroku_person}}</td>

<td><a href="{{ route('news.show', ['id' => $inf_table->id]) }}">詳細</a></td>
</tr>
</tbody>
@endforeach
</table>

@endsection