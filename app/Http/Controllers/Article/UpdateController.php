<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;


class UpdateController extends BaseController
{
    public function __invoke(Article $article, UpdateRequest $request)
    {
        $data = $request->validated();
//dd($data);
        $article = $this->service->update($article, $data);
        return $article instanceof Article? new ArticleResource($article): $article;
        // return redirect()->route('article.show', $article->id);
    }
}
