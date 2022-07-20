@extends('kanri.app')

@section('title', '施設一覧')

@section('kanri_content')

<table class="table table-bordered">
     <thead>
<tr>
<th>施設番号</th>
<th>施設区分</th>
<th>施設名</th>
<th>施設名略称</th>
<th>適用開始日</th>
<th>適用終了日</th>
<th>収容人数</th>
<th>施設分類区分</th>
<th>備考</th>
</tr>
     </thead>

 <tbody>

@foreach($sisetu as $si)
<tr>
<td>{{ $si->施設番号 }}</td>
<td>{{ $si->施設区分 }}</td>
<td>{{ $si->施設名 }}</td>
<td>{{ $si->施設名略称 }}</td>
<td>{{ $si->適用開始日 }}</td>
<td>{{ $si->適用終了日 }}</td>
<td>{{ $si->収容人数 }}</td>
<td>{{ $si->施設分類区分 }}</td>
<td>{{ $si->備考 }}</td>
</tr>
@endforeach

 </tbody>
</table>

@endsection