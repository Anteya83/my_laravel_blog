<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;


class UpdateController extends BaseController
{
    public function __invoke(Article $article, UpdateRequest $request)
    {
        $data = $request->validated();

        $this->service->update($article, $data);

        return redirect()->route('article.show', $article->id);
    }
}
