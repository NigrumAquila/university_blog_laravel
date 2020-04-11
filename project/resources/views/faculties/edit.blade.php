@extends('layouts.main')
@section('title', 'Редактирование кафедры')
@section('content')
<h1>Редактирование кафедры</h1>
@include('sections.show_errors')
<form action="{{ route('faculties.update', $faculty->id) }}" method="POST" autocomplete="off">
  {!! method_field('put') !!}
  {!! csrf_field() !!}
  <p>Наименование: 
    <input name="name" type="text" class="border-bottom" value="{{ $faculty->name }}" size="50" maxlength="50">
  </p>
  <p>Аббревиатура: 
    <input name="abbreviation" type="text" class="border-bottom" value="{{ $faculty->abbreviation }}" size="10" maxlength="10">
  </p>
  <p>
    <input type="submit" id="Submit" value="Изменить">
    <input type="reset" id="Reset" value="Отмена">
  </p>
</form>
<p><a href="{{ route('faculties.index') }}">На список кафедр</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')