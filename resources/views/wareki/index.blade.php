@extends('kanri.index')

@section('title', "和暦一覧")

@section('kanri_content')

<!--
<p><a href="">新規登録</a></p>
-->

<!-- ============　新規登録用 モーダルフォーム　============ -->
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
            <h5 class="modal-title">和暦登録</h5>
            <button
              type="button"
              class="close"
              data-dismiss="modal"
              aria-label="Close"
            >
              <span aria-hidden="true">×</span>
            </button>
          </div>
<div class="modal-body">

<form action="{{ route('wareki.store') }}" method="post">
    @csrf
  <div>
    <label for="form-name">元号</label>
    <input type="text" name="gengou" id="form-name" required>
  </div>

  <div>
    <label for="form-tel">略称</label>
    <input type="text" name="ryakusyou" id="form-tel">
  </div>

  <div>
    <label for="form-email">開始日付</label>
    <input type="date" name="start_date" id="form-email">
  </div>

<!--
   <button type="submit">登録</button>
  -->

<div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">
              キャンセル
            </button>
            <button type="submit" class="btn btn-primary">
              保存
          </button>
</div>

</form>
         
</div>
       

        </div>
      </div>
    </div>



<!-- ============　新規登録用 モーダルフォーム END　============ -->

<table class="table table-bordered">
     <thead>
<tr>
<th>ID</th>
<th>元号</th>
<th>略称</th>
<th>開始日付</th>
</tr>
     </thead>

@foreach($warekis as $wareki)
<tbody>
<tr>
<td>{{$wareki->id}}</td>
<td>{{$wareki->gengou}}</td>
<td>{{$wareki->ryakusyou}}</td>
<td>{{$wareki->start_date}}</td>

<td><a href="{{ route('wareki.show', ['id'=>$wareki->id]) }}" class="btn btn-primary">詳細</a></td>
<td><a href="{{ route('wareki.edit', ['id'=>$wareki->id]) }}" class="btn btn-info">編集</a></td>

<td>
     <form action="{{ route('wareki.destroy', ['id' => $wareki->id]) }}" method="post">
          @csrf

          <button type="submit" class="btn btn-danger">削除</button>
     </form>
</td>

</tr>
</tbody>
@endforeach

</table>



@endsection