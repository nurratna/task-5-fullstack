<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Schema;

class WelcomeController extends Controller
{
    public function index()
    {
        $articles = array();

        if (Schema::hasTable('articles')) {
            $articles = Article::paginate(10);
        }

        return view('welcome', compact('articles'));
    }
}
