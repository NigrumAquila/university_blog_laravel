@extends('layouts.main')
@section('title', 'Полный список преподавателей УТиИТ')
@section('content')
<h1>Полный список преподавателей УТиИТ</h1>
<h3>Поиск:</h3>
<table border="0" cellspacing="2" cellpadding="1">
  <tr class="tr-nohover">
    <th width="153px" scope="col">Фамилия </th>
    <th width="153px" scope="col">Имя</th>
    <th width="153px" scope="col">Отчество</th>
    <th width="153px" scope="col">Должность</th>
    <th width="153px" scope="col">Кафедра</th>
  </tr>
</table>    
<form action="{{ route('lecturers.index') }}" method="get" enctype="text/plain" autocomplete="off">
  <input name="surname" type="text" class="border-bottom" value="{{ app('request')->input('surname') }}" size="13">    
  <input name="name" type="text" class="border-bottom" value="{{ Request::get('name') }}"size="13" >
  <input name="patronymic" type="text" class="border-bottom" value="{{ Request()->patronymic }}"size="13">
  <input name="post" type="text" class="border-bottom" value="{{ request()->get('post') }}"size="13">
  <input name="faculty" type="text" class="border-bottom" value="{{ Input::get('faculty') }}"size="13"> 
  <input type="submit" name="" value="Найти" id="Submit">    
</form>
<form action="{{ route('lecturers.index') }}" method="get" enctype="text/plain">
  <input name="surname" type="hidden" value="">
  <input name="name" type="hidden" value="">
  <input name="patronymic" type="hidden" value="">
  <input name="post" type="hidden" value="">
  <input name="faculty" type="hidden" value="">
  <input type="submit" name="" value="Все" id="Submit" style="margin-top: 10px;">  
</form
<p>&nbsp;</p>
<hr>
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="11%" scope="col">Номер</th>
    <th width="18%" scope="col">Фамилия </th>
    <th width="18%" scope="col">Имя</th>
    <th width="18%" scope="col">Отчество</th>
    <th width="18%" scope="col">Должность</th>
    <th width="18%" scope="col">Кафедра</th>
    @if(Auth::check() && Auth::user()->is_moder)
    <th width="3%" scope="col">Администрирование</th>
    @endif
  </tr>
@foreach($lecturers as $lecturer)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $lecturer->surname }}</td>
    <td>{{ $lecturer->name }}</td>
    <td>{{ $lecturer->patronymic }}</td>
    <td>{{ $lecturer->post_name }}</td>
    <td>{{ $lecturer->abbreviation }}</td>
    @if(Auth::check() && Auth::user()->is_moder)
    <td>
      <a href="{{ route('lecturers.edit', $lecturer->id) }}">Изменить</a>| 
      <a href="{{ route('lecturers.show', $lecturer->id) }}">Удалить</a>
    </td>
    @endif
  </tr>
@endforeach
</table>
<p><a href="{{ route('faculties.index') }}">На список кафедр</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection