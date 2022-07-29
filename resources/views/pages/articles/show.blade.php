@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Show Article
                </div>
                <div class="card-body">
                    <div class="row">
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
                                    <img src="{{ asset('articles/'.$article->image) }}" alt="{{ $article->image }}" class="img-thumbnail">
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Category
                                </th>
                                <td>
                                    {{ $article->category->name }}
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
