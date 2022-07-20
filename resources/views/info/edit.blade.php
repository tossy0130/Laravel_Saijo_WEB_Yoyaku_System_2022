@extends('kanri.app')

@section('title', 'お知らせ編集')

@section('kanri_content')


<form action="{{ route('info.update', ['id'=>$infos->id]) }}" method="post">

    @csrf

  <div>
    <label for="form-name">文章番号</label>
    <input type="text" name="sentence_number" id="form-name" value="{{ $infos->sentence_number }}">
  </div>

  <div>
    <label for="form-tel">案内種別</label>
    <input type="text" name="annai_type" id="form-tel" value="{{ $infos->annai_type }}">
  </div>

  <div>
    <label for="form-email">表題</label>
    <input type="text" name="annai_title" id="form-email" value="{{ $infos->annai_title }}">
  </div>


    <div>
    <label for="form-name">開始日付</label>
    <input type="date" name="start_date" id="form-name" value="{{ $infos->start_date }}">
  </div>

  <div>
    <label for="form-tel">終了日付</label>
    <input type="date" name="end_date" id="form-tel" value="{{ $infos->end_date }}">
  </div>

  <div>
    <label for="form-email">開始時刻</label>
    <input type="time" name="start_time" id="form-email" value="{{ $infos->start_time }}">
  </div>

   <div>
    <label for="form-email">終了時刻</label>
    <input type="time" name="end_time" id="form-email" value="{{ $infos->end_time }}">
  </div>

   <div>
    <label for="form-email">案内文章</label>
    <textarea name="annai_test" id="form-email"  rows="6" cols="60">
        {{ $infos->annai_test }}
    </textarea>
  </div>

  <input type="hidden" name="touroku_person" value="未定">


   <button type="submit">修正</button>
</form>

<p><a href="{{ route('info.index') }}">キャンセル</a></p>

@endsection