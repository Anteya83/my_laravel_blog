<?php

namespace App\Http\Controllers\Admin\Article;

use App\Http\Controllers\Controller;
use App\Http\Filters\ArticleFilter;
use App\Http\Requests\Article\FilterRequest;
use App\Models\Article;


class IndexController extends Controller
{
    //
    public function __invoke(FilterRequest $request)
    {
        //dd(111);

        $data = $request->validated();
        $filter = app()->make(ArticleFilter::class, ['queryParams' => array_filter($data)]);
        $published_articles =Article::filter($filter)->paginate(5);
        return view('admin.article.index', compact('published_articles'));
    }
}
