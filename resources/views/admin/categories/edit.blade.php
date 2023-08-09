@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Наименование</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description" id="description">{{ $category->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
