@extends('layouts.main')
@section('title', 'Удаление студента')
@section('content')
<h1>Удаление студента</h1>
<form action="{{ route('students.destroy', $student->id) }}" method="post">
  {{ method_field('delete') }}
  {{ csrf_field() }}
  <h3>Группа: {{ $student->group_name }}</h3>
  <h3>Зачетная книжка: {{ $student->number }}</h3>
  <h3>Фамилия: {{ $student->surname }}</h3>
  <h3>Имя: {{ $student->name }}</h3>
  <h3>Отчество: {{ $student->patronymic }}</h3>
  <h3>Пол: {{ $student->gender }}</h3>
  <h3>День рождения: {{ $student->birthday }}</h3>
  <p>
    <input type="hidden" name="group_id" value="{{ $student->group_id }}">
    <input type="submit" name="Submit" value="Удалить" id="Delete">
  </p>
</form>
  <p><a href="{{ route('groups.show', $student->group_id) }}">На список студентов группы {{ $student->group_name }}</a></p>
  <p><a href="{{ route('students.index') }}">На список студентов</a></p>
  <p><a href="{{ route('index') }}">На главную страницу</a></p>
  @endsection('content')