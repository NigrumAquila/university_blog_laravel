@extends('layouts.main')
@section('title', 'Редактирование студента')
@section('content')
<h1>Редактирование студента</h1>
@include('sections.show_errors')
<form action="{{ route('students.update', $student->id) }}" method="POST" autocomplete="off">
  {{ method_field('put') }}
  {{ csrf_field() }}
  <p>Группа: 
    <select name="group_id">
      @foreach($groups as $group)
      <option value="{{ $group->id }}" @if($group->id == $student->group_id) selected @endif>{{ $group->name }}</option>
      @endforeach
    </select>
  </p>
  <p>Номер зачетной книжки: 
    <input name="number" type="text" class="border-bottom" value="{{ $student->number }}" size="15" maxlength="15">
  </p>
  <p>Фамилия: 
    <input name="surname" type="text" class="border-bottom" value="{{ $student->surname }}" size="15" maxlength="15">
  </p>
  <p>Имя: 
    <input name="name" type="text" class="border-bottom" value="{{ $student->name }}" size="15" maxlength="15">
  </p>
  <p>Отчество: 
    <input name="patronymic" type="text" class="border-bottom" value="{{ $student->patronymic }}" size="20" maxlength="20">
  </p>
  <p>Пол: 
    @foreach($genders as $gender)
    <input name="gender" type="radio" value="{{ $gender }}" size="20" maxlength="20" @if($student->gender == $gender) checked @endif>
    <label for="gender">{{ Str::ucfirst($gender) }}</label>
    @endforeach
  </p>
  <p>День рождения: 
    <input name="birthday" type="date" value="{{ $student->birthday }}" size="20" maxlength="20">
  </p>
  <p>
  <input type="hidden" name="page_id" value="{{ $student->group_id }}">
    <input type="submit" name="Submit" value="Ввод" id="Submit">
    <input type="reset" name="Reset" value="Отмена" id="Reset"> 
  </p>
</form>
<p><a href="{{ route('groups.show', $student->group_id) }}">На список студентов группы {{ $student->group_name }}</a></p>
<p><a href="{{ route('students.index') }}">На список студентов</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')