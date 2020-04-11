@extends('layouts.main')
@section('title', 'Удаление кафедры')
@section('content')
<h1>Удаление кафедры</h1>
<form action="{{ route('faculties.destroy', $faculty->id) }}" method="post">
  {!! method_field('delete') !!}
  {!! csrf_field() !!}
  <h3>Наименование: {{ $faculty->name }}</h3>
  <h3>Аббревиатура: {{ $faculty->abbreviation }}</h3>
  <p>
    <input type="submit" name="Submit" value="Удалить" id="Delete">
  </p>
</form>
<p><a href="{{ route('faculties.index') }}">На список кафедр</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')