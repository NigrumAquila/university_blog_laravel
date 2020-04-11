@extends('layouts.main')
@section('title', 'Полный список студентов УТиИТ')
@section('content')
<h1>Полный список студентов УТиИТ</h1>
<h3>Поиск:</h3>
<table border="0" cellspacing="2" cellpadding="1">
  <tr class="tr-nohover">
    <th width="153px" scope="col">Группа</th>
    <th width="153px" scope="col">Зачетная книжка</th>
    <th width="153px" scope="col">Фамилия </th>
    <th width="153px" scope="col">Имя</th>
    <th width="153px" scope="col">Отчество</th>
    <th width="153px" scope="col">Пол</th>
    <th width="153px" scope="col">День рождения</th>
  </tr>
</table>    
 <form action="{{ route('students.index') }}" method="get" enctype="text/plain" autocomplete="off">
    <input name="group" type="text" class="border-bottom" value="{{ Input::get('group') }}" size="13">    
    <input name="number" type="text" class="border-bottom" value="{{ Input::get('number') }}"size="13">
    <input name="surname" type="text" class="border-bottom" value="{{ Input::get('surname') }}"size="13">
    <input name="name" type="text" class="border-bottom" value="{{ Input::get('name') }}"size="13" maxlength="30">
    <input name="patronymic" type="text" class="border-bottom" value="{{ Input::get('patronymic') }}"size="13"> 
    <input name="gender" type="text" class="border-bottom" value="{{ Input::get('gender') }}"size="13"> 
    <input name="birthday" type="text" class="border-bottom" value="{{ Input::get('birthday') }}"size="13"> 
    <input type="submit" name="" value="Найти" id="Submit">    
</form>
<form action="{{ route('students.index') }}" method="get" enctype="text/plain">
  <input name="group" type="hidden" value="">
  <input name="number" type="hidden" value="">
  <input name="surname" type="hidden" value="">
  <input name="name" type="hidden" value="">
  <input name="patronymic" type="hidden" value="">
  <input name="gender" type="hidden" value="">
  <input name="birthday" type="hidden" value="">
  <input type="submit" name="" value="Все" id="Submit" style="margin-top: 10px;">
</form>
<p>&nbsp;</p>
<hr>
@if(count($students) > 0)  
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="1%" scope="col">Номер</th>
    <th width="8%" scope="col">Группа</th>
    <th width="10%" scope="col">Зачетная книжка</th>
    <th width="22%" scope="col">Фамилия </th>
    <th width="15%" scope="col">Имя</th>
    <th width="24%" scope="col">Отчество</th>
    <th width="5%" scope="col">Пол</th>
    <th width="15%" scope="col">День рождения</th>
    @if(Auth::check() && Auth::user()->is_moder)
    <th width="5%" scope="col">Администрирование</th>
    @endif
  </tr>
  @foreach($students as $student)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $student->group_name }}</td>
    <td>{{ $student->number }}</td>
    <td>{{ $student->surname }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->patronymic }}</td>
    <td>{{ $student->gender }}</td>
    <td>{{ $student->birthday }}</td>
    @if(Auth::check() && Auth::user()->is_moder)
    <td>
      <a href="{{ route('students.edit', $student->id) }}">Изменить</a>| 
      <a href="{{ route('students.show', $student->id) }}">Удалить</a>
    </td>
    @endif
  </tr>
  @endforeach
</table>
@else
<h3>Студентов пока нет!</h3>
@endif
<p><a href="{{ route('groups.index') }}">На список групп</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')