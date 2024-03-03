<?php

namespace App\Services\Article;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

class Service
{
public function store($data) {
    try{
        DB::beginTransaction();
        $tags = $data['tags'];
        $category =$data['category'];
        unset($data['tags'], $data['category']);
        $tagIds= $this->getTagIds($tags);
        $data['category_id']=$this->getCategoryId($category);
        $article = Article::create($data);
        //-----1 variant
        //foreach ($tags as $tag){
        //   ArticleTag::firstOrCreate([
        //    'tag_id' => $tag,
        //      'article_id' =>$article->id
        //  ]);
        //}
        //-----2 variant
        $article->tags()->attach($tagIds);
        DB::commit();
    }catch (\Exception $exception){
        DB::rollBack();
        return $exception->getMessage();
    }

    return $article;
}
public function update($article, $data){
    try {
        DB::beginTransaction();
        $tags = $data['tags'];
        $category = $data['category'];
        unset($data['tags'], $data['category']);

        $tagIds = $this->getTagIdsUpdate($tags);
        $data['category_id'] = $this->getCategoryIdWithUpdate($category);

        $article->update($data);
        //$article = $article->fresh();
        $article->tags()->sync($tagIds);
    } catch(\Exception $exception ){
        DB::rollBack();
        return $exception->getMessage();
    }
    return $article->fresh();
}

private function getTagIds($tags){
    $tagIds=[];
    foreach ($tags as $tag){
        $tag = !isset($tag['id']) ? Tag::create($tag): Tag::find($tag['id']);
        // dd($tag);
        $tagIds[] = $tag->id;
    }
    return $tagIds;
}

private function getCategoryId($item)
{
   $category= !isset($item['id'])? Category::create($item): Category::find($item['id']);
    return $category->id;
}

    private function getTagIdsUpdate($tags){
        $tagIds=[];
        foreach ($tags as $tag){

            if (!isset($tag['id'])){
               $tag= Tag::create($tag);
            }
            else{
                $currentTag=Tag::find($tag['id']);
                $currentTag->update($tag);
                $tag = $currentTag->fresh();
            }

            $tagIds[] = $tag->id;
        }
        //dd($tagIds);
        return $tagIds;
    }

    private function getCategoryIdWithUpdate($item)
    {
        if (!isset($item['id'])){
        $category = Category::create($item);
        }
        else {
            $category = Category::find($item['id']);
            $category->update($item);
            $category = $category->fresh();
        }
        return $category->id;
    }
}
