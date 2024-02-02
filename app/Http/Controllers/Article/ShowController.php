<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\Article;


class ShowController extends BaseController
{
    public function __invoke($id)
    {
        $article = Article::findOrFail($id);//ищем по id
        dump($article);
        return view('article.show', compact('article'));
    }
}
