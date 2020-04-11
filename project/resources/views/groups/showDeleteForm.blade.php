@extends('layouts.main')
@section('title', 'Удаление группы')
@section('content')
<h1>Удаление группы</h1>
<form action="{{ route('groups.destroy', $group->id) }}" method="post">
  {{ method_field('delete') }}
  {{ csrf_field() }}
  @if($group->students()->count() > 0)
  <h2 class="warning">Предупреждение!</h2>
  <p>В группе имеются студенты</p>
  @endif
  <h3>Наименование: {{ $group->name }}</h3>
  <p>
    <input type="submit" name="Submit" value="Удалить" id="Delete">
  </p>
</form>
<p><a href="{{ route('groups.index') }}">На список групп</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')