@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ваш профиль</h1>
<form>
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" id="name" value="{{ Auth::user()->name }}" readonly>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" value="{{ Auth::user()->email }}" readonly>
      </div>
</form>
</div>
@endsection
