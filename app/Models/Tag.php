<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = false;
    public function articles() {
        return $this->belongsToMany(Article::class, 'article_tags', 'tag_id','article_id');
    }
}
