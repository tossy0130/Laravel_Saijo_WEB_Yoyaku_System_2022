@extends('kanri.app')

@section('title', '和暦新規登録')

@section('kanri_content')


<form action="{{ route('wareki.update', ['id'=>$wareki->id]) }}" method="post">

    @csrf

  <div>
    <label for="form-name">元号</label>
    <input type="text" name="gengou" id="form-name" value="{{ $wareki->gengou }}">
  </div>

  <div>
    <label for="form-tel">略称</label>
    <input type="text" name="ryakusyou" id="form-tel" value="{{ $wareki->ryakusyou }}">
  </div>

  <div>
    <label for="form-email">開始日付</label>
    <input type="date" name="start_date" id="form-email" value="{{ $wareki->start_date }}">
  </div>

   <button type="submit">修正</button>
</form>

<p><a href="{{ route('wareki.index') }}">キャンセル</a></p>

@endsection