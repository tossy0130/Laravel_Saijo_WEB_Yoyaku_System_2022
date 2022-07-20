@extends('kanri.app')

@section('title', '和暦詳細')

@section('kanri_content')

<h1>詳細表示</h1>

<table class="table table-bordered">
     <thead>
<tr>
<th>ID</th>
<th>元号</th>
<th>略称</th>
<th>開始日付</th>
</tr>
     </thead>

<tbody>
<tr>
<td>{{$wareki->id}}</td>
<td>{{$wareki->gengou}}</td>
<td>{{$wareki->ryakusyou}}</td>
<td>{{$wareki->start_date}}</td>

</tbody>

</table>

<p><a href="{{ route('wareki.index') }}">和暦 一覧</a></p>

@endsection