@extends('layouts.main')
@section('title', 'Удаление преподавателя')
@section('content')
<h1>Удаление преподавателя</h1>
<form action="{{ route('lecturers.destroy', $lecturer->id) }}" method="post">
  {!! method_field('delete') !!}
  {!! csrf_field() !!}
  <h3>Фамилия: {{ $lecturer->surname}}</h3>
  <h3>Имя: {{ $lecturer->name }}</h3>
  <h3>Отчество: {{ $lecturer->patronymic }}</h3>
  <h3>Должность: {{ $lecturer->post_name }}</h3>
  <h3>Кафедра: {{ $lecturer->faculty_name }}</h3>
  <p>
    <input type="submit" name="Submit" value="Удалить" id="Delete">
  </p>
</form>
<p><a href="{{ route('faculties.show', $lecturer->faculty_id) }}">На список преподавателей кафедры {{ $lecturer->faculty_name }}</a></p>
<p><a href="{{ route('lecturers.index') }}">На список преподавателей</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')