@extends('layouts.main')
@section('title', 'Добавление пользователя')
@section('content')
<h1>Добавление пользователя</h1>
<p>Страничка администратора, предназначенная для добавления нового пользователя. </p>
@include('sections.show_errors')
<form action="{{ route('users.store') }}" method="POST" autocomplete="off">
  {!! csrf_field() !!}
  <p>Имя:
    <input name="name" type="text" class="border-bottom" size="20">
  </p>
  <p>Пароль:
    <input name="password" type="text" class="border-bottom" size="20">
  </p>
  <p>Права:
    <select name="rights">
      @foreach($rights as $right)
      <option value="{{ $right }}">{{ $right }}</option>
      @endforeach
    </select>
  </p>
  <p>
    <input type="submit" name="Submit" id="Submit" value="Добавить">
    <input type="reset" name="Reset" id="Reset" value="Отмена">
</form>
<p><a href="{{ route('users.index') }}">На список пользователей</a></p>
@endsection('content')