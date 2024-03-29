<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Http\Resources\Article\ArticleResource;
use App\Models\Article;


class IndexController extends BaseController
{
    public function __invoke(FilterRequest $request)//FilterRequest $request
    {

      $data = $request->validated();

      $page = $data['page'] ?? 1;
      $perPage = $data['per_page'] ?? 5;
      $filter = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);
      $published_articles =Article::filter($filter)->paginate($perPage, ['*'], 'page', $page);
      //return ArticleResource::collection($published_articles);
  //      dd($published_articles);
////       dd($data);
//       $query = Article::query();
//       if (isset($data['category_id'])){
//            $query->where('category_id', $data['category_id']);
//        }
//        if (isset($data['title'])){
//            $query->where('title', 'like', "%{$data['title']}%");
//        }
//        if (isset($data['article_content'])){
//            $query->where('article_content', 'like', "%{$data['article_content']}%");
//        }
//       $published_articles = $query->get();
//        dd($published_articles);//?title=vitam
 //      $published_articles = Article::where('is_published', 1)->paginate(5);

        return view('article.index', compact('published_articles'));
    }
}
