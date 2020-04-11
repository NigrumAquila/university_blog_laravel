@extends('layouts.main')
@section('title', 'Выход')
@section('content')
<h2 align="center">Завершение сеанса работы посетителя с сайтом "Обучение студентов УТиИТ"</h2>
<p>
    <a href="{{ route('logout.post') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Выйти</a>
</p>
<form action="{{ route('logout.post') }}" method="POST" id="logout-form" style="display: none;">{{ csrf_field() }}</form>
<p><a href="{{ route('login') }}">На главную страницу</a></p>
@endsection