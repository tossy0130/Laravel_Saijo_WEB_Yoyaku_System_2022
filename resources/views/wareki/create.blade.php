@extends('kanri.app')

@section('title', '和暦新規登録')

@section('kanri_content')


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

   <button type="submit">登録</button>

</form>

<p><a href="{{ route('wareki.index') }}">キャンセル</a></p>

@endsection