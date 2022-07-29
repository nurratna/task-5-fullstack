<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::paginate(10);

        return view('pages.articles.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);

        return view('pages.articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::where('user_id', Auth::user()->id)->get()->pluck('name','id')->toArray();

        return view('pages.articles.create', compact('categories'));
    }

    public function store(Request $request)
    {
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->hashName();
            $request->image->storeAs('public/articles', $filename);

            $article = new Article;
            $article->title = $request->title;
            $article->content = $request->content;
            $article->image = $filename;
            $article->category_id = $request->category_id;
            $article->user_id = Auth::user()->id;
            $article->save();
        }

        return redirect('articles');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::where('user_id', Auth::user()->id)->get()->pluck('name','id')->toArray();

        return view('pages.articles.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $filename = $file->hashName();
            $request->image->storeAs('public/articles', $filename);
            $article->image = $filename;
        }

        $article->title = $request->title;
        $article->content = $request->content;
        $article->category_id = $request->category_id;
        $article->user_id = Auth::user()->id;
        $article->save();

        return redirect('articles');
    }

    public function destroy($id)
    {
        Article::destroy($id);

        return redirect('articles');
    }
}
