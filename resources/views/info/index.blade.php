@extends('kanri.index')

@section('title', 'お知らせ管理')

@section('kanri_content')

<h1>お知らせ登録</h1>

 <button
      type="button"
      class="btn btn-primary"
      data-toggle="modal"
      data-target="#testModal"
    >
     新規登録
    </button>
    <!--default modal-->
    <div
      class="modal fade"
      id="testModal"
      tabindex="-1"
      role="dialog"
      aria-hidden="true"
    >
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">お知らせ 新規登録</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>

<!-- ==================== 登録フォーム  モーダルボディ ================ -->
<div class="modal-body">

<h1>お知らせ登録</h1>

<p><a href="{{ route('info.index')}}">キャンセル</a></p>

<form method="POST" action="{{ route('info.store') }}">
  @csrf

  <div>
    <label for="form-name">文章番号</label>
    <input type="number" name="sentence_number" id="form-name" required>
  </div>

  <div>
    <label for="form-tel">案内種別</label>
    <input type="number" name="annai_type" id="form-tel">
  </div>

  <div>
    <label for="form-email">表題</label>
    <input type="text" name="annai_title" id="form-email">
  </div>

  <div>
    <label for="form-email">開始日付</label>
    <input type="date" name="start_date" id="form-email">
  </div>

  <div>
    <label for="form-email">終了日付</label>
    <input type="date" name="end_date" id="form-email">
  </div>

  <div>
    <label for="form-email">開始時刻</label>
    <input type="time" name="start_time" id="form-email">
  </div>

  <div>
    <label for="form-email">終了時刻</label>
    <input type="time" name="end_time" id="form-email">
  </div>

  <div>
    <label for="form-email">お知らせ文章</label>
   <textarea name="annai_test" rows="6" cols="60" placeholder="お知らせ文章をご入力ください。"></textarea>
  </div>

{{ $out_put }}
<input type="hidden" name="touroku_person" value="{{ $out_put }}">

 
  <!-- 
  <button type="submit">登録</button>
  -->

         <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-dismiss="modal"
            >
              登録キャンセル
            </button>
            <button type="submit" class="btn btn-primary">登録</button>
          </div>
</form>

</div>
<!-- ==================== 登録フォーム  モーダルボディ END ================ -->
   
        </div>
      </div>
    </div>


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
@foreach($infos as $inf_table)

<tr>
<td>{{$inf_table->id}}</td>
<td>{{$inf_table->sentence_number}}</td>
<td>{{$inf_table->annai_type}}</td>
<td>{{$inf_table->annai_title}}</td>
<td>{{$inf_table->start_date}}</td>
<td>{{$inf_table->end_date}}</td>
<td>{{$inf_table->start_time}}</td>
<td>{{$inf_table->end_time}}</td>
<td>{{ Str::limit($inf_table->annai_test, 60, '(…)' )}}</td>
<td>{{$inf_table->touroku_person}}</td>

<!-- 詳細・修正 -->
<td><a href="{{ route('info.show',['id' => $inf_table->id]) }}">詳細</a></td>
<td><a href="{{ route('info.edit',['id' => $inf_table->id]) }}">編集</a></td>

<td>
     <form action="{{ route('info.destroy',['id' => $inf_table->id]) }}" method="post">
         @csrf
         
         <button type="submit" class="btn btn-danger">
              削除
         </button>
     </form>
</td>


</tr>

@endforeach
</tbody>
</table>

@endsection