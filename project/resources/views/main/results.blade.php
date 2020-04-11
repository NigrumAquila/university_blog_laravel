@extends('layouts.main')
@section('title', 'Результаты сессии')
@section('content')
<h1>Результаты сессии</h1>
<h3>Планируемые показатели по группам</h3>
<hr>
@if(count($groups) > 0)  
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th scope="col">Номер</th>
    <th scope="col">Группа</th>
    <th scope="col">Форма сдачи</th>
    <th scope="col">Количество предметов</th>
    <th scope="col">Максимальный балл</th>
  </tr>
@foreach($groups as $group)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $group->name }}</td>
    <td>{{ $group->exam_test }}</td>
    <td>{{ $group->count_subject }}</td>
    <td>{{ $group->Max_Ball }}</td>
  </tr>
@endforeach
</table>
@endif
<hr>
<h3>Фактические результаты сдачи сессии  студентами</h3>
<hr>
@if(count($students) > 0)
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="10%" scope="col">Номер </th>
    <th width="10%" scope="col">Группа </th>
    <th width="10%" scope="col">Номер зачетной книжки </th>
    <th width="10%" scope="col">Студент</th>
    <th width="20%" scope="col">Форма сдачи </th> 
    <th width="15%" scope="col">Количество оценок </th>
    <th width="15%" scope="col">Минимальная оценка</th>
    <th width="15%" scope="col">Суммарный балл</th>
  </tr>
@foreach($students as $student)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $student->group_name }}</td>
    <td>{{ $student->number }}</td>
    <td>{{ $student->student }}</td>
    <td>{{ $student->exam_test }}</td>
    <td>{{ $student->count_mark }}</td>
    <td>{{ $student->min_mark }}</td>
    <td>{{ $student->sum_mark }}</td>
  </tr>
@endforeach
</table>
@endif
<hr>
<h3>Подведение итогов сдачи сессии  студентами</h3>
<hr>
@if(count($students) > 0) 
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="10%" scope="col">Номер </th>
    <th width="10%" scope="col">Группа </th>
    <th width="10%" scope="col">Номер зачетной книжки </th>
    <th width="10%" scope="col">Студент</th>
    <th width="20%" scope="col">Форма сдачи </th> 
    <th width="15%" scope="col">Количество оценок </th>
    <th width="15%" scope="col">Минимальная оценка</th>
    <th width="15%" scope="col">Суммарный балл</th>
    <th width="15%" scope="col">Итог </th>
  </tr>
@foreach($students as $student)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $student->group_name }}</td>
    <td>{{ $student->number }}</td>
    <td>{{ $student->student }}</td>
    <td>{{ $student->exam_test }}</td>
    <td>{{ $student->count_mark }}</td>
    <td>{{ $student->min_mark }}</td>
    <td>{{ $student->sum_mark }}</td>
    <td>{{ $student->total }}</td>
  </tr>
@endforeach
</table>
@endif
<hr>
<h3>Определение стипендии</h3>
<hr>
@if(count($students) > 0)
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="10%" scope="col">Номер </th>
    <th width="10%" scope="col">Группа </th>
    <th width="10%" scope="col">Студент</th>        
    <th width="15%" scope="col">Стипендия, в %</th>
  </tr>
@for($i = 0, $j = 1; $i < count($students); $i++, $j++)
@if(!empty($students[$i+1]) AND $students[$i]->student == $students[$i+1]->student) 
@php $i++ @endphp 
@endif
  <tr>
    <td>{{ $j }}</td>
    <td>{{ $students[$i]->group_name }}</td>
    <td>{{ $students[$i]->student }}</td>
    <td>{{ $students[$i]->grant }}</td>
  </tr>
@endfor
</table>
@endif
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')