<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;


class ShowController extends BaseController
{
    public function __invoke(Article $article)
    {
        //$article = Article::findOrFail($id);//ищем по id
       // dump($article);
        //return view('article.show', compact('article'));
        return new ArticleResource($article);
    }
}
