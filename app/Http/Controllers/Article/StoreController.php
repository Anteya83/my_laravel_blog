<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\StoreRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {

        $data = $request->validated();

        $article =$this->service->store($data);
        return new ArticleResource($article);
        //dd($article);
//        $tags = $data['tags']; перенесл всю логику в service.php
//        unset($data['tags']);
//        $article = Article::create($data);
//        //-----1 variant
//        //foreach ($tags as $tag){
//        //   ArticleTag::firstOrCreate([
//        //    'tag_id' => $tag,
//        //      'article_id' =>$article->id
//        //  ]);
//        //}
//        //-----2 variant
//        $article->tags()->attach($tags);
       // return redirect()->route('article.index');
    }
}
