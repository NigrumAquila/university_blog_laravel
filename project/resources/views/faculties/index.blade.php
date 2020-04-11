@extends('layouts.main')
@section('title', 'Кафедры УТиИТ')
@section('content')
<h1>Кафедры УТиИТ</h1>
<p>&nbsp;</p>
<hr>
<p>&nbsp;</p>
@if(count($faculties) > 0)
@foreach($faculties as $faculty)
<div class="fullnote">
  <h2>
    <a href="{{ route('faculties.show', $faculty->id) }}">{{ $faculty->name }} ({{ $faculty->abbreviation }})</a>
  </h2>
  @if(Auth::check() && Auth::user()->is_moder)
  <p>
    <a href="{{ route('faculties.edit', $faculty->id) }}">Изменить</a>
  </p>
  <p>
    <a href="{{ route('faculties.showDeleteForm', $faculty->id) }}">Удалить</a>
  </p>
  @endif
</div>
@endforeach
<p>Кафедры с 1 по {{ count($faculties) }} 
@else
<h3>Кафедр пока нет!</h3>
@endif
@if(Auth::check() && Auth::user()->is_moder)
<p>&nbsp;</p>
@include('sections.show_errors')
<form action="{{ route('faculties.store') }}" method="POST" autocomplete="off">
  {!! csrf_field() !!}
  <p>Кафедра: 
    <input name="name" type="text" class="border-bottom" size="50" maxlength="50">
  </p>
  <p>Аббревиатура: 
    <input name="abbreviation" type="text" class="border-bottom" size="10" maxlength="10">
  </p>
  <p>
    <input type="submit" id="Submit" value="Добавить">
    <input type="reset" id="Reset" value="Отмена">
  </p>
</form>
@endif
<p><a href="{{ route('groups.index') }}">На список групп</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')