<?php

namespace App\Models\Portal\Post;

use Illuminate\Database\Eloquent\Model;

class CategoryTag extends Model
{

    protected $table = 'category_tags';

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'category_post_tags', 'category_tag_id', 'post_id');
    }
}
