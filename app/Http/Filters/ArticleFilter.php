<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ArticleFilter extends AbstractFilter
{

    public const TITLE = 'title';
    public const ARTICLE_CONTENT = 'article_content';
    public const CATEGORY_ID = 'category_id';
    public const IS_PUBLISHED = 'is_published';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.
        return [
            self::TITLE =>[$this, 'title'],
            self::ARTICLE_CONTENT =>[$this, 'article_content'],
            self::CATEGORY_ID =>[$this, 'categoryId'],
            self::IS_PUBLISHED =>[$this, 'is_published']
        ];
    }

    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function article_content(Builder $builder, $value)
    {
        $builder->where('article_content', 'like', "%{$value}%");
    }
    public function categoryId(Builder $builder, $value)
    {
        $builder->where('category_id',  $value);
    }
    public function is_published(Builder $builder, $value)
    {
        $builder->where('is_published',  $value);
    }
}
