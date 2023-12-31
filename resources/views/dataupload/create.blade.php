@extends('layouts.main')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Получение выгрузки</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('dataupload.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя Заказчика</label>
                <input type="text" class="form-control" name="customer" id="customer" value="{{ old('customer') }}">
            </div>
            <div class="form-group">
                <label for="phone">Номер телефона</label>
                <input type="tel" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group">
                <label for="info">Информация об интересующей теме</label>
                <textarea type="text" class="form-control" name="info" id="info">{{ old('info') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
