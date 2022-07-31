@extends('layouts.master')

@section('breadcrumbs')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Articles</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Articles</li>
        </ol>
    </div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12 mb-4">
        <!-- Simple Tables -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                {{ session('success') }}
            </div>
        @endif
        
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Articles</h6>
                <a href="{{ route('articles.create') }}" class="m-0 pull-left btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                    <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">Add New</span>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th>NO</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @php $no = ($articles->currentpage()-1)* $articles->perpage() + 1; @endphp
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $article->title }}</td>
                            <td>{{ $article->content }}</td>
                            <td><img src="{{ asset('articles/'.$article->image) }}" alt="{{ $article->image }}" class="img-fluid" style="width: 100px"></td>
                            <td>@if (empty($article->category_id)) - @else {{ $article->category->name }} @endif</td>
                            <td>{{ $article->user->name }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ route('articles.show', [$article->id]) }}" style="margin-bottom:5px">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('articles.edit', [$article->id]) }}" style="margin-bottom:5px">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <form action="{{ route('articles.destroy', [$article->id]) }}" method="POST" style="display:inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-danger" style="margin-bottom:5px" onclick="return confirm('Anda yakin ingin menghapus ini?');">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <td colspan="7">
                            <span class="float-right">{{ $articles->appends(request()->query())->links() }}</span>
                        </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection