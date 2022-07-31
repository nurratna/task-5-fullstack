@extends('layouts.master')

@section('breadcrumbs')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Articles</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('articles.index')}}">Articles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Edit</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="card mb-4">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Edit Article</h6>
    </div>
    <div class="card-body">
        {!! Form::model($article, ['route' => ['articles.update', $article->id], 'method' => 'patch', 'enctype'=>'multipart/form-data']) !!}
            @include('pages.articles.fields')
        {!! Form::close() !!}
    </div>
</div>
@endsection


