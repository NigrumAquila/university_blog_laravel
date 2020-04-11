@extends('layouts.main')
@section('title', 'Список студентов группы')
@section('content')
<h1>Список студентов группы</h1>
<p>&nbsp;</p>
<div class="fullnote">
  <h2>{{ $group->name }}</h2>
</div>
<p>&nbsp;</p>
<hr>
@if(count($students) > 0)
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="11%" scope="col">Номер</th>
    <th width="17%" scope="col">Зачетная книжка </th>
    <th width="26%" scope="col">Фамилия</th>
    <th width="9%" scope="col">Имя</th>
    <th width="16%" scope="col">Отчество</th>
    <th width="4%" scope="col">Пол</th>
    <th width="17%" scope="col">День рождения</th>
    @if(Auth::check() && Auth::user()->is_moder)
    <th width="17%" scope="col">Администрирование</th>
    @endif
  </tr>
  @foreach($students as $student)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $student->number }}</td>
    <td>{{ $student->surname }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->patronymic }}</td>
    <td>{{ $student->gender }}</td>
    <td>{{ $student->birthday }}</td>
    @if(Auth::check() && Auth::user()->is_moder)
    <td>
      <a href="{{ route('students.edit', $student->id) }}">Изменить</a> | 
      <a href="{{ route('students.show', $student->id) }}">Удалить</a>
    </td>
    @endif
  </tr>
  @endforeach
</table>
@else
<h3>Студентов в данной группе  пока нет!</h3>
@endif
@if(Auth::check() && Auth::user()->is_moder)
<p>&nbsp;</p>
<div class="fullnote">
  <h3>Добавить студента:</h3>
  @include('sections.show_errors')
  <form action="{{ route('students.store') }}" method="POST" autocomplete="off"> 
    {{ csrf_field() }}
    <table width="900"  border="0" cellspacing="2" cellpadding="2">
      <tr class="tr-nohover">
        <th width="150" scope="col">Номер зачетной книжки: </th>
        <td> 
          <input name="number" type="text" class="border-bottom" size="20" maxlength="10"></td>
      </tr>
      <tr class="tr-nohover">
        <th width="150" scope="col" >Фамилия: </th>
        <td>
          <input name="surname" type="text" class="border-bottom" size="20" maxlength="15">
        </td>
      </tr>
      <tr class="tr-nohover">   
        <th width="150" scope="col">Имя</th>
        <td>
          <input name="name" type="text" class="border-bottom" size="20" maxlength="10">
        </td>
      </tr>
      <tr class="tr-nohover">
        <th width="150" scope="col">Отчество</th>
        <td>
          <input name="patronymic" type="text" class="border-bottom" size="20" maxlength="15">
        </td>
      </tr>
      <tr class="tr-nohover">
        <th width="150" scope="col">Пол</th> 
        <td>
          @foreach($genders as $gender)
          <input name="gender" type="radio" value="{{ $gender }}">
          <label for="gender">{{ Str::ucfirst($gender) }}</label>
          @endforeach
        </td>
      </tr>
      <tr class="tr-nohover">
        <th width="150" scope="col">День рождения</th>
        <td>
          <input name="birthday" type="date">
        </td>
    </table>
    <input name="group_id" type="hidden" value="{{ $group->id }}">
    <input type="submit" name="Submit" id="Submit" value="Добавить">
    <input type="reset" name="Reset" id="Reset" value="Отмена">
  </form>
</div>
@endif
<p><a href="{{ route('groups.index') }}">На список групп</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')