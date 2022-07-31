<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\ArticlesResource;
use Illuminate\Support\Facades\Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::paginate(10);
        return response([ 'articles' => ArticlesResource::collection($articles), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->user()->id;

        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image' => 'required',
            'category_id' => 'required|exists:category,id'
        ]);

        if ($validator->fails()) {
            return response(['message' => $validator->errors(), 'Validation Error'], 400);
        }

        $article = Article::create($data);

        return response(['article' => new ArticlesResource($article), 'message' => 'Created successfully'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return response(['article' => new ArticlesResource($article), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validator = Validator::make($data, [
            'title' => 'required|max:255',
            'content' => 'required|max:255',
            'image' => 'required',
            'category_id' => 'required|exists:category,id'
        ]);

        if ($validator->fails()) {
            return response(['message' => $validator->errors(), 'Validation Error'], 400);
        }

        $article->update($request->all());

        return response(['article' => new ArticlesResource($article), 'message' => 'Update successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return response(['message' => 'Deleted']);
    }
}
