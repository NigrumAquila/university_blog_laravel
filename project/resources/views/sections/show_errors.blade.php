@if ($errors)
@foreach($errors->all() as $message) 
  <span class="warning">
    <strong>{{ $message }}</strong>
  </span>
@endforeach
@endif