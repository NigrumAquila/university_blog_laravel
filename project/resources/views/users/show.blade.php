@extends('layouts.main')
@section('title', 'Удаление пользователя')
@section('content')
<h1>Удаление пользователя</h1>
<p>Страничка администратора, предназначенная для удаления пользователя. </p>
<form action="{{ route('users.destroy', $user->id) }}" method="POST">
  {!! method_field('delete') !!}
  {!! csrf_field() !!}
  <h3>Имя: {{$user->name}}</h3>
  <h3>Права: {{$user->rights}}</h3>
  <p>
    <input type="submit" name="Submit" value="Удалить" id="Delete">
  </p>
</form>
<p><a href="{{ route('users.index') }}">На список пользователей</a></p>
@endsection('content')