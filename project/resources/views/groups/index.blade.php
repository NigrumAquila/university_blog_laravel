@extends('layouts.main')
@section('title', 'Группы студентов УТиИТ')
@section('content')
<h1>Группы студентов УТиИТ</h1>
<p>&nbsp;</p>
<hr>
<p align="center">&nbsp;</p>
@foreach($groups as $group)
<div class="fullnote">
  <h2>
    <a href="{{ route('groups.show', $group->id) }}">{{ $group->name }}</a> 
  </h2>
  @if(Auth::check() && Auth::user()->is_moder)
  <p><a href="{{ route('groups.edit', $group->id) }}">Изменить</a></p>
  <p><a href="{{ route('groups.showDeleteForm', $group->id) }}">Удалить</a></p>
  @endif
</div>
@endforeach
<p>Группы с 1 по {{ count($groups) }}</p>
@if(Auth::check() && Auth::user()->is_moder)
<p>&nbsp;</p>
@include('sections.show_errors')
<form action="{{ route('groups.index') }}" method="POST" autocomplete="off">
  {{ csrf_field() }}
	<p>Группа: 
    <input name="name" type="text" class="border-bottom" size="50" maxlength="50">
	</p>
	<p>
    <input type="submit" name="Submit" id="Submit" value="Добавить">
    <input type="reset" name="Reset" id="Reset" value="Отмена">
	</p>
</form>
@endif
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')