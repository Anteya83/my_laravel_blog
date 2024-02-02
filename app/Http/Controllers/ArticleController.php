<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function  index()
    {
        $art = Article::find(6);
        //dump($art->tags);
        $tag = Tag::find(1);
        //dump($tag->articles);

        //foreach ($articles as $article) {
        //    dump($article->title);
         //   dump($article->content);
        //}
        //dump($articles);
        //$published_articles = Article::where('is_published', 1)->where('category_id', 2)->get();//only published and category 2
        $published_articles = Article::where('is_published', 1)->get();
        //$categories = Category::all();
        $category = Category::find(1);
        //dump($category->articles);
        //dump($art->category);
        return view('article.index', compact('published_articles'));
    }
    public function  show($id) {//можно написать show(Article $article) - тогда лара автоматом подтянет статью по id
        $article = Article::findOrFail($id);//ищем по id
        dump($article);
        return view('article.show', compact('article'));
    }

    public function edit(Article $article){
        $categories = Category::all();
        $tags = Tag::all();
        return view('article.edit', compact('article', 'categories','tags'));
    }
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();

        return view('article.create', compact('categories','tags'));
//        $articlesArr = [
//            [
//                'title' => 'Title 3 from f create',
//                'content' => 'Content 3',
//                'image' => 'img3',
//                'likes' => 0,
//                'is_published' => 1,
//            ],
//            [
//                'title' => 'Title 4 from f create',
//                'content' => 'Content 4',
//                'image' => 'img4',
//                'likes' => 0,
//                'is_published' => 1,
//        ]
//        ];
//        foreach ($articlesArr as $item) {//add to db
//            Article::create($item);
//            dump('created');
//        }

    }

    public function store(){
        $data = request() -> validate([
            'title' => 'required|string',
            'article_content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => []]);
//dd($data);
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

        dump($data);
        return redirect()->route('article.index');
    }

    public function update(Article $article){
        $data = request() -> validate([
            'title' => 'string',
            'article_content' => 'string',
            'image' => 'string',
            'category_id' => '',
            'tags' => []
        ]);
        $tags = $data['tags'];
        unset($data['tags']);
        $article->update($data);
        //$article = $article->fresh();
        $article->tags()->sync($tags);
        return redirect()->route('article.show', $article->id);

    }

    public function delete(){
        $article = Article::find(4);
        //$article = Article::withTrashed()->find(4); $article->restore(); - восстановлении статьи после мягкого удаления
        dump($article->title);
        $article->delete();
    }
    public function destroy(Article $article){
        $article->delete();
        return redirect()->route('article.index');
    }
    //first or create - проверка на уникальность если да создать
    //update or create - чтобы например не было одинаковых заголовков
    public function firstOrCreate() {
        //$article = Article::find(1);
        $newArticle = [
            'title' => 'Title new article',
            'content' => 'Content 5',
            'image' => 'img5',
            'likes' => 0,
            'is_published' => 1,
        ];
        $article = Article::firstOrCreate(['title' => 'Title new article'],$newArticle);
        dump($article->content);
    }

    public function updateOrCreate() {
        $newArticle = [
            'title' => 'updateOrCreate new article',
            'content' => 'updateOrCreate2',
            'image' => 'img0',
            'likes' => 0,
            'is_published' => 1,
        ];
        $article = Article::updateOrCreate(['title' => 'updateOrCreate new article'],$newArticle);
        dump($article->title);
    }
}
