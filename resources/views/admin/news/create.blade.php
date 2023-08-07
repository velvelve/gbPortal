@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавление новости</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        <form method="POST" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Категория</label>
                <select class="form-control" name="category_id" id="category_id">
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id === old('category_id')) selected @endif>
                            {{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if (old('status') === \App\Enums\News\Status::DRAFT->value) selected @endif>{{ \App\Enums\News\Status::DRAFT->value }}
                    </option>
                    <option @if (old('status') === 'active') selected @endif>active</option>
                    <option @if (old('status') === 'blocked') selected @endif>blocked</option>
                </select>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea type="text" class="form-control" name="description" id="description">{{ old('description') }}</textarea>
            </div>
            <button type="submit" class="btn btn-success mt-4">Сохранить</button>
        </form>
    </div>
@endsection
