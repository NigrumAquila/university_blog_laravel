@extends('layouts.main')
@section('title', 'Предметы УТиИТ')
@section('content')
<h1>Предметы УТиИТ</h1>
<p>&nbsp;</p>
<hr>
<p>&nbsp;</p>
@if(count($subjects) > 0)
@foreach($subjects as $subject)
<div class="fullnote">
	<h2>{{ Str::ucfirst($subject->name) }}({{ $subject->hour }})</h2>
</div>
@endforeach
<p>Предметы с 1 по {{count($subjects)}}</p>
@endif
<p>&nbsp;</p>
<p><a href="{{ route('index') }}">На главную страницу</a></p>
@endsection('content')