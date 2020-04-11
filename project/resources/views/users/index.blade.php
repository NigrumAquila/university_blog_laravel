@extends('layouts.main')
@section('title', 'Список пользователей')
@section('content')
<h1>Список пользователей</h1>
<p>Страничка администратора, предназначенная для управления пользователями. </p>
<table width="500" border="1" cellspacing="2" cellpadding="1" class="center">
	<caption>Список пользователей</caption>
	@if(count($users) > 0)
	<tr>
		<th width="120" scope="col">Пользователь</th>
		<th width="80" scope="col">Права</th>
		<th width="120" scope="col">Редактировать</th>
		<th width="100" scope="col">Удалить</th>
	</tr>
	@foreach($users as $user)
	<tr>
		<td>{{ $user->name }}</td>
		<td>{{ $user->rights }}</td>
		<td><a href="{{ route('users.edit', $user->id) }}">Изменить</a></td>
		<td><a href="{{ route('users.show', $user->id) }}">Удалить</a></td>
	</tr>
	@endforeach
	@endif
</table>
<p><a href="{{ route('users.create') }}">Добавить пользователя</a></p> 
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection