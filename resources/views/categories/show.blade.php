@extends('layouts.main')
@section('title') {{ $category->title }} - @parent @stop
@section('content')
    <div>
        <h4><a href="<?= route('news.index') ?>"><?= $category->title ?></a></h4>
        <br>
        <p><?= $category->description ?></p>
        <p><?= $category->created_at ?></p>
    </div>
    <hr /><br>
@endsection
