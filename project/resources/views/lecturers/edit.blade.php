@extends('layouts.main')
@section('title', 'Редактирование преподавателя')
@section('content')
<h1>Редактирование преподавателя</h1>
@include('sections.show_errors')
<form action="{{ route('lecturers.update', $lecturer->id) }}" method="POST" autocomplete="off">
  {!! method_field('put') !!}
  {!! csrf_field() !!}
  <p>Фамилия: 
    <input name="surname" type="text" class="border-bottom" value="{{ $lecturer->surname }}" size="20" maxlength="20">
  </p>
  <p>Имя: 
    <input name="name" type="text" class="border-bottom" value="{{ $lecturer->name }}" size="15" maxlength="15">
  </p
  <p>Отчество: 
    <input name="patronymic" type="text" class="border-bottom" value="{{ $lecturer->patronymic }}" size="20" maxlength="20">
  </p>
  <p>Должность: 
   <select name="post_id">
      @foreach($posts as $post)
      <option value="{{ $post->id }}" @if($post->id == $lecturer->post_id) selected @endif>{{ $post->name }}</option>
      @endforeach
    </select>
  </p>
  <p>
    <input type="submit" name="Submit" value="Ввод" id="Submit">
    <input type="reset" name="Reset" value="Отмена" id="Reset"> 
  </p>
</form>
<p><a href="{{ route('faculties.show', $lecturer->faculty_id) }}">На список преподавателей кафедры {{ $lecturer->faculty_name }}</a></p>
<p><a href="{{ route('lecturers.index') }}">На список преподавателей</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')