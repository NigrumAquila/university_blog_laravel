@extends('layouts.main')
@section('title', 'Редактирование пользователя')
@section('content')
<h1>Редактирование пользователя</h1>
<p>Страничка администратора, предназначенная для редактирования данных о пользователе. </p>
@include('sections.show_errors')
<form action="{{ route('users.update', $user->id) }}" method="POST" autocomplete="off">
  {!! method_field('put') !!}
  {!! csrf_field() !!}
  <p>Имя:
    <input name="name" type="text" class="border-bottom" size="20" value="{{ $user->name }}">
  </p>
  <p>Пароль:
    <input name="password" type="text" class="border-bottom" size="20" value="">
  </p>
  <p>Права:
    <select name="rights">
      @foreach($rights as $right)
      <option value="{{ $right }}" @if($user->rights == $right) selected @endif>{{ $right }}</option>
      @endforeach
    </select>
  </p>
  <p>
    <input type="submit" name="Submit" id="Submit" value="Изменить">
    <input type="reset" name="Reset" id="Reset" value="Отмена">
</form>
<p>
  <a href="{{ route('users.index') }}">На список пользователей</a>
</p>
@endsection('content')