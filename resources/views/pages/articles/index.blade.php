@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

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
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $no = ($articles->currentpage()-1)* $articles->perpage() + 1; @endphp
                        @foreach ($articles as $article)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->content }}</td>
                                <td><img src="{{ asset('articles/'.$article->image) }}" alt="{{ $article->image }}" class="img-thumbnail"></td>
                                <td>{{ $article->category->name }}</td>
                                <td>{{ $article->user->name }}</td>
                                <td>
                                    <a class="btn btn-block btn-sm btn-success" href="{{ route('articles.show', [$article->id]) }}" style="margin-bottom:5px">
                                        <i class="fa fa-show"></i>show
                                    </a>
                                    <a class="btn btn-block btn-sm btn-warning" href="{{ route('articles.edit', [$article->id]) }}" style="margin-bottom:5px">
                                        <i class="fa fa-edit"></i>edit
                                    </a>
                                    <form action="{{ route('articles.destroy', [$article->id]) }}" method="POST" style="display:inline">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-block btn-sm btn-danger" style="margin-bottom:5px" onclick="return confirm('Anda yakin ingin menghapus ini?');">
                                            <i class="fa fa-trash"></i>delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                {{-- <td>{{ $articles->links() }}</td> --}}
                            </tr>
                        </tfoot>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection