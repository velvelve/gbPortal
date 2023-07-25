@extends('layouts.main')
@section('title') Список категорий - @parent @stop
@section('content')
    <h2>Список категорий</h2>
    <div class="list-group">
        @forelse ($categories as $category)
            <a href="{{ route('categories.show', ['id' => $category['id']]) }}"
                class="list-group-item list-group-item-action d-flex gap-3 py-3" aria-current="true">
                <div class="d-flex gap-2 w-100 justify-content-between">
                    <div>
                        <h6 class="mb-0">{{ $category['name'] }}</h6>
                        <p class="mb-0 opacity-75">{!! $category['description'] !!}</p>
                    </div>
                    <small class="opacity-50 text-nowrap">{{ $category['created_at'] }}</small>
                </div>
            </a>
        @empty
            <h2>Нет категорий
            </h2>
        @endforelse
    </div>
@endsection
