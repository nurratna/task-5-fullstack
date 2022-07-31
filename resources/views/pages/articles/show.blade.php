@extends('layouts.master')

@section('breadcrumbs')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Articles</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{route('articles.index')}}">Articles</a></li>
            <li class="breadcrumb-item active" aria-current="page">Create</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
    <h6 class="m-0 font-weight-bold text-primary">Show Article</h6>
</div>

<div class="card-body">
    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <th>
                Title
            </th>
            <td>
                {{ $article->title }}
            </td>
        </tr>
        <tr>
            <th>
                Content
            </th>
            <td>
                {{ $article->content }}
            </td>
        </tr>
        <tr>
            <th>
                Image
            </th>
            <td>
                <img src="{{ asset('articles/'.$article->image) }}" alt="{{ $article->image }}" class="img-fluid" style="width: 100px">
            </td>
        </tr>
        <tr>
            <th>
                Category
            </th>
            <td>
                @if (empty($article->category_id)) - @else {{ $article->category->name }} @endif
            </td>
        </tr>
        <tr>
            <th>
                User
            </th>
            <td>
                {{ $article->user->name }}
            </td>
        </tr>
        </tbody>
    </table>
    <a style="margin-top:20px;" class="btn btn-danger" href="{{ url()->previous() }}">
        Back
    </a>
</div>
@endsection
