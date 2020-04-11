@extends('layouts.main')
@section('title', 'Вход')
@section('content')
<h2 align="center">Вход на сайт "Обучение студентов УТиИТ"</h2>
<p>Авторизация посетителя:</p>
@include('sections.show_errors')
<form action="{{ route('login.post') }}" method="POST" autocomplete="off">
	{!! csrf_field() !!}
	<p>Имя:
		<input type="text" name="name" class="border-bottom" size="20" maxlength="20">
	</p>
	<p>Пароль:
		<input type="password" name="password" class="border-bottom" size="20" maxlength="20">
	</p>
	<p>
		<input type="submit" id="Submit" value="Войти">
	</p>
</form>
<a href="{{ route('index') }}">На главную страницу</a>
@endsection