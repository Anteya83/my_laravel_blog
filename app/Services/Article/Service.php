<?php

namespace App\Services\Article;

use App\Models\Article;

class Service
{
public function store($data) {
    $tags = $data['tags'];
    unset($data['tags']);
    $article = Article::create($data);
    //-----1 variant
    //foreach ($tags as $tag){
    //   ArticleTag::firstOrCreate([
    //    'tag_id' => $tag,
    //      'article_id' =>$article->id
    //  ]);
    //}
    //-----2 variant
    $article->tags()->attach($tags);
}
public function update($article, $data){
    $tags = $data['tags'];
    unset($data['tags']);
    $article->update($data);
    //$article = $article->fresh();
    $article->tags()->sync($tags);
}
}
