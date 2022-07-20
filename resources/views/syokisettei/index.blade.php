@extends('kanri.index')

@section('title', '初期設定')

@section('kanri_content')

<h1>基本情報設定</h1>

<table class="table table-bordered table-responsive">
     <thead>
<tr>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">斎場名</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">斎場管理団体</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">斎場責任者</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">斎場郵便</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">斎場住所</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">斎場ＴＥＬ</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">斎場ＦＡＸ</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">予約サイト名</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">予約ＵＲＬ</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">予約可能日数</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">予約切替日区分</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">予約切替時刻</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">通夜締切日区分</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">通夜締切時刻</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">メールアドレス</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">ＳＭＴＰサーバ</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">ＳＭＴＰポート</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">ＳＭＴＰ認証</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">ＳＭＴＰパスワード</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">待合室無料フラグ</th>
<th class="col-xs-3 col-ms-3 col-md-4 col-lg-4">式場料金フラグ</th>


</tr>
     </thead>

<tbody
@foreach($Syokisettei as $syokiset)
<tr>

<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->斎場名 }}</td>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->斎場管理団体 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->斎場責任者 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->斎場郵便 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->斎場住所 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->斎場ＴＥＬ }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->斎場ＦＡＸ }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->予約サイト名 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->予約ＵＲＬ }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->予約可能日数 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->予約切替日区分 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->予約切替時刻 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->通夜締切日区分 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->通夜締切時刻 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->ＳＭＴＰサーバ }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->ＳＭＴＰポート }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->ＳＭＴＰ認証 }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->ＳＭＴＰパスワード }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->待合室無料フラグ }}</>
<td class="col-xs-3 col-ms-3 col-md-4 col-lg-4">{{ $syokiset->式場料金フラグ }}</>

</tr>
@endforeach

</tbody>

</table>

@endsection