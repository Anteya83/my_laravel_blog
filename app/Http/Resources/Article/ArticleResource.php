<?php

namespace App\Http\Resources\Article;

use App\Http\Resources\Category\CategoryResourse;
use App\Http\Resources\Tag\TagResourse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ArticleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title'=> $this->title,
            'article_content'=>$this->article_content,
            'image'=>$this->image,
            'category'=> new CategoryResourse($this->category),
            'tags'=> TagResourse::collection($this->tags)
        ];
    }
}
