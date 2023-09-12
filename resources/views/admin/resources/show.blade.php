@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Просмотр ресурса</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>

    <div>
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <x-alert :message="$error" type="danger"></x-alert>
            @endforeach
        @endif
        @forelse ($newsList as $news)
            <div class="col">
                <div class="card shadow-sm">
                    <h4>{{ $news['title'] }}</h4>
                    <div class="card-body">
                        <p class="card-text">{{ $news['description'] }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <form method="POST" action="{{ route('admin.resources.addnews') }}">
                                    @csrf
                                    <input type="hidden" name="title" id="title" value="{{ $news['title'] }}">
                                    <input type="hidden" name="author" id="author" value="{{ $news['author'] }}">
                                    <input type="hidden" name="description" id="description" value="{{ $news['description'] }}">
                                    <input type="hidden" name="created_at" id="created_at" value="{{ $news['pubDate'] }}">
                                    <button type="submit"class="btn btn-sm btn-outline-secondary">Добавить новость
                                    </button>
                                </form>
                            </div>
                            <small class="text-muted"><em>{{ $news['author'] }}</em> &nbsp;
                                ({{ $news['pubDate']}})
                            </small>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <h2>Нет новостей</h2>
        @endforelse
    </div>
@endsection
