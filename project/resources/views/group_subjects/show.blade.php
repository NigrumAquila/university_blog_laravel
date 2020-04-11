@extends('layouts.main')
@section('title', 'Ведомость')
@section('content')
<h2>Ведомость</h2>
<h3>&nbsp;</h3>
<h3>Группа: {{ $group_subjects->group_name }}</h3>
<h3>Предмет: {{ $group_subjects->subject_name }}</h3>
<h3>Преподаватель: {{ $group_subjects->surname }} {{ $group_subjects->name }} {{ $group_subjects->patronymic }}</h3>
<h3>Форма сдачи: {{ $group_subjects->exam_test }}</h3>
<hr>
@if(count($students) > 0)
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="7%" scope="col">Номер</th>
    <th width="15%" scope="col">Зачетная книжка </th>
    <th width="17%" scope="col">Фамилия</th>
    <th width="13%" scope="col">Имя</th>
    <th width="15%" scope="col">Отчество</th>
    <th width="15%" scope="col">Оценка</th>
    <th width="21%" scope="col">Дата</th>
  </tr>
  @foreach($students as $student)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $student->number }}</td>
    <td>{{ $student->surname }}</td>
    <td>{{ $student->name }}</td>
    <td>{{ $student->patronymic }}</td>
    <td>{{ $student->mark_name }}</td>
    <td>{{ $student->date }}</td>
  </tr>
  @endforeach
</table>
@endif
<p><a href="{{ route('group_subjects.index') }}">На программу обучения</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')