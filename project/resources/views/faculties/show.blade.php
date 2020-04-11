@extends('layouts.main')
@section('title', 'Список преподавателей кафедры')
@section('content')
<h1>Список преподавателей кафедры</h1>
<p>&nbsp;</p>
<div class="fullnote">
  <h2>{{$faculty->name}} ({{ $faculty->abbreviation}})</h2>
</div>
<p>&nbsp;</p>
<hr>
@if(count($lecturers) > 0)
<table width="100%"  border="1" cellspacing="2" cellpadding="1" class="center">
  <tr>
    <th width="11%" scope="col">Номер</th>
    <th width="22.5%" scope="col">Фамилия </th>
    <th width="22.5%" scope="col">Имя</th>
    <th width="22.5%" scope="col">Отчество</th>
    <th width="22.5%" scope="col">Должность</th>
    @if(Auth::check() && Auth::user()->is_moder)<th width="22.5%" scope="col">Администрирование</th>@endif
  </tr>
  @foreach($lecturers as $lecturer)
  <tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $lecturer->surname }}</td>
    <td>{{ $lecturer->name }}</td>
    <td>{{ $lecturer->patronymic }}</td>
    <td>{{ $lecturer->post_name }}</td>
    @if(Auth::check() && Auth::user()->is_moder)
    <td>
      <a href="{{ route('lecturers.edit', $lecturer->id) }}">Изменить
      </a> | 
      <a href="{{ route('lecturers.show', $lecturer->id) }}">Удалить
      </a>
    </td>
    @endif
  </tr>
  @endforeach
</table>
@else
<h3>Преподавателей на данной кафедре пока нет!</h3>
@endif
@if(Auth::check() && Auth::user()->is_moder)
<div class="fullnote">
  <h3>Добавить преподавателя:</h3>
  @include('sections.show_errors')
  <form action="{{ route('lecturers.store') }}" method="POST" autocomplete="off">
    {!! csrf_field() !!}
    <table  border="0" cellspacing="0" cellpadding="0">
      <tr class="tr-nohover">
        <th scope="col">Фамилия </th>
        <th scope="col">Имя</th>
        <th scope="col">Отчество</th>
        <th scope="col">Должность</th>
      </tr>
      <tr class="tr-nohover">
        <td>   <input name="surname" type="text" class="border-bottom" size="20" maxlength="20"></td>
        <td>   <input name="name" type="text" class="border-bottom" size="15" maxlength="15"></td>
        <td>   <input name="patronymic" type="text" class="border-bottom" size="20" maxlength="20"></td>
        <td>
          <select name="post_id">
            @foreach($posts as $post)
            <option value="{{ $post->id }}">{{ $post->name }}</option>
            @endforeach
          </select>
        </td>
        <input name="faculty_id" type="hidden" value="{{ $faculty->id }}">
        <td>
          <input type="submit" name="Submit" id="Submit" value="Добавить">
          <input type="reset" name="Reset" id="Reset" value="Отмена">
        </td>
      </tr>
    </table>
  </form>
</div>
@endif
<p><a href="{{ route('faculties.index') }}">На список кафедр</a></p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')