@extends('layouts.main')
@section('title') {{ $category['name'] }} - @parent @stop
@section('content')
    <div>
        <h4><a href="<?= route('news.index') ?>"><?= $category['name'] ?></a></h4>
        <br>
        <p><?= $category['description'] ?></p>
        <p><?= $category['created_at'] ?></p>
    </div>
    <hr /><br>
@endsection
