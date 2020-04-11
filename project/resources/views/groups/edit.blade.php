@extends('layouts.main')
@section('title', 'Редактирование группы')
@section('content')
<h1>Редактирование группы</h1>
@include('sections.show_errors')
<form action="{{ route('groups.update', $group->id) }}" method="POST" autocomplete="off">
  {{ method_field('put') }}
  {{ csrf_field() }}
  <p>Наименование: 
    <input name="name" type="text" class="border-bottom" value="{{ $group->name }}" size="50" maxlength="50">
  </p>
  <p>
    <input type="submit" name="Submit" id="Submit" value="Изменить">
    <input type="reset" name="Reset" id="Reset" value="Отмена">
  </p>
</form>
  <p><a href="{{ route('groups.index') }}">На список групп</a></p>
  <p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')