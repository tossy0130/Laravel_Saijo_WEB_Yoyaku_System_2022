@extends('kanri.app')

@section('title', 'お知らせ作成')

@section('kanri_content')

<h1>お知らせ登録</h1>


<h2>新規作成</h2>

<form method="POST" action="{{ route('news.store') }}">
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
    <input type="date" name="Start_date" id="form-email">
  </div>

  <div>
    <label for="form-email">終了日付</label>
    <input type="date" name="End_date" id="form-email">
  </div>

  <div>
    <label for="form-email">開始時刻</label>
    <input type="time" name="Start_time" id="form-email">
  </div>

  <div>
    <label for="form-email">終了時刻</label>
    <input type="time" name="End_time" id="form-email">
  </div>

  <div>
    <label for="form-email">案内文章</label>
   <textarea name="annai_test" rows="6" cols="60">案内文章をご入力ください。</textarea>
  </div>

  <input type="hidden" name="touroku_person" value="未定">
 

  <button type="submit">登録</button>

</form>


@endsection
