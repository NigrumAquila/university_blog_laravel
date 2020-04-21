@extends('layouts.main')
@section('title', 'Список групп и предметов обучения')
@section('content')
<h1>Список групп и предметов обучения</h1>
<h3>Поиск:</h3>
<table border="0" cellspacing="2" cellpadding="1">
  <tr class="tr-nohover">
    <th width="153px" scope="col">Группа</th>
    <th width="153px" scope="col">Предмет</th>
    <th width="153px" scope="col">Фамилия </th>
    <th width="153px" scope="col">Имя</th>
    <th width="153px" scope="col">Отчество</th>
    <th width="153px" scope="col">Форма сдачи</th>
  </tr>
</table>
<form action="{{ route('group_subjects.index') }}" method="get" enctype="text/plain" autocomplete="off">
  <input name="group" type="text" class="border-bottom" value="{{ Input::get('group') }}" size="13">    
  <input name="subject" type="text" class="border-bottom" value="{{ Input::get('subject') }}"size="13">
  <input name="surname" type="text" class="border-bottom" value="{{ Input::get('surname') }}"size="13">
  <input name="name" type="text" class="border-bottom" value="{{ Input::get('name') }}"size="13">
  <input name="patronymic" type="text" class="border-bottom" value="{{ Input::get('patronymic') }}"size="13"> 
  <input name="exam_test" type="text" class="border-bottom" value="{{ Input::get('exam_test') }}"size="13"> 
  <input type="submit" value="Найти" id="Submit">    
</form>
<form action="{{ route('group_subjects.index') }}" method="get" enctype="text/plain">
  <input name="group" type="hidden" value="">
  <input name="subject" type="hidden" value="">
  <input name="surname" type="hidden" value="">
  <input name="name" type="hidden" value="">
  <input name="patronymic" type="hidden" value="">
  <input name="exam_test" type="hidden" value="">
  <input type="submit" value="Все" id="Submit" style="margin-top: 10px;">
</form>
<p>&nbsp;</p>
<hr>
@if(count($group_subjects) > 0)
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th scope="col">Номер</th>
    <th scope="col">Группа</th>
    <th scope="col">Предмет</th>
    <th scope="col">Фамилия </th>
    <th scope="col">Имя</th>
    <th scope="col">Отчество</th>
    <th scope="col">Форма сдачи</th>
    <th scope="col">Ведомости</th>
  </tr>
  @foreach($group_subjects as $group_subject)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $group_subject->group_name }}</td>
    <td>{{ $group_subject->subject_name }}</td>
    <td>{{ $group_subject->surname }}</td>
    <td>{{ $group_subject->name }}</td>
    <td>{{ $group_subject->patronymic }}</td>
    <td>{{ $group_subject->exam_test }}</td>
    @if(Auth::check() && Auth::user()->is_moder)
    <td><a href="{{ route('group_subjects.edit', $group_subject->id) }}">Ведомость</a></td>
    @else
    <td><a href="{{ route('group_subjects.show', $group_subject->id) }}">Ведомость</a></td>
    @endif
  </tr>
  @endforeach
</table>
@else
<h3>Списка предметов пока нет!</h3>
@endif
<p><a href="{{ route('results') }}">На результаты сессии</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')