@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Список новостных ресурсов</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.resources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                    ресурс</a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        @include('inc.message')
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование ресурса</th>
                    <th scope="col">Веб адрес</th>
                    <th scope="col">Действия</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($resources as $resource)
                    <tr>
                        <td>{{ $resource['id'] }}</td>
                        <td>{{ $resource['name'] }}</td>
                        <td>{{ $resource['url'] }}</td>
                        <td>
                            <a href="{{ route('admin.resources.edit', ['resource' => $resource]) }}">Edit</a> &nbsp;
                            <a href="">Delete</a> &nbsp;
                            <a href="{{ route('admin.resources.show', ['resource' => $resource]) }}">Просмотреть ресурс</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Записей не найдено</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
