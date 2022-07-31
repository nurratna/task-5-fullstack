@extends('layouts.welcome')

@section('content')
<div class="row">
    @foreach ($articles as $article)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('articles/'.$article->image) }}" alt="{{ $article->image }}" class="img-fluid card-img-top">
                <div class="card-body">
                    <h5 class="card-title align-items-center">{{ $article->title}}</h5>
                    <span class="badge badge-warning"><i class="fa fa-tags"></i>@if (empty($article->category_id)) - @else {{ $article->category->name }} @endif</span>
                    <span class="badge badge-warning float-right"><i class="fa fa-user"></i> {{ $article->user->name }}</span>
                    <p class="card-text">{{ $article->content}}</p>
                    <a href="#" class="btn btn-primary btn-block">More..</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

@endsection