<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;


class IndexController extends BaseController
{
    public function __invoke()
    {
        $published_articles = Article::where('is_published', 1)->paginate(5);
        return view('article.index', compact('published_articles'));
    }
}
