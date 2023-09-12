@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление ресурса</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.resources.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Наименование ресурса</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                @error('title')
                    <strong style="color:red; font-weight:bold"> {{ $message }}</strong>
                @enderror
            </div>
            <div class="form-group">
                <label for="url">Описание</label>
                <input type="url" class="form-control" name="url" id="url" value="{{ old('url') }}"></div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
