@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование профиля</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        @include('inc.message')
        <form method="POST" action="{{ route('admin.profiles.update', ['profile' => $profile]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $profile->name }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" name="email" id="email" value="{{ $profile->email }}">
            </div>
            <div class="form-group">
                <label for="is_admin">Админ</label>
                <select class="form-control" name="is_admin" id="is_admin">
                    <option value="1" @if ($profile->is_admin === true) selected @endif>Да</option>
                    <option value="0" @if ($profile->is_admin === false) selected @endif>Нет</option>
                </select>
            </div>
            <div class="form-group">
                <label for="password">Текущий пароль</label>
                <input type="text" class="form-control" name="password" id="password" placeholder="Текущий пароль">
            </div>
            <div class="form-group">
                <label for="newPassword">Новый пароль</label>
                <input type="text" class="form-control" name="newPassword" id="newPassword" placeholder="Новый пароль">
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
