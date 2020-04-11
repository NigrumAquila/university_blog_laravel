@extends('layouts.main')
@section('title', 'УТиИТ при ИрГУПС')
@section('content')
<h1>Иркутский государственный университет путей сообщения</h1>
<h2>Факультет "Управление на транспорте и информационные технологии"</h2>
<p>Здравствуйте, уважаемые посетители блога! </p>
<p>Здесь публикуются сведения о кафедрах, преподавателях, студентах и процессе обучения в институте.</p>
<p>Читайте на здоровье!</p>
<hr>
<p align="center"> 
  @if(!Auth::check())
  <a href="{{ route('login') }}">Вход</a>
  @else
  <a href="{{ route('logout') }}">Выход</a>
  @if(Auth::user()->is_admin)
  | <a href="{{ route('users.index') }}"> Пользователи</a>
  @endif
  @endif
</p>
<hr>
<p align="center">  | 
  <a href="{{ route('faculties.index') }}">Кафедры</a> | 
  <a href="{{ route('lecturers.index') }}">Преподаватели</a> | 
  <a href="{{ route('subjects') }}">Предметы</a> | 
</p>
<hr>
<p align="center"> | 
  <a href="{{ route('groups.index') }}">Группы</a> | 
  <a href="{{ route('students.index') }}">Студенты</a> | 
  <a href="{{ route('group_subjects.index') }}">Программа обучения</a> | 
  <a href="{{ route('results') }}">Результаты сессии</a> | 
</p>
<hr>
@endsection('content')