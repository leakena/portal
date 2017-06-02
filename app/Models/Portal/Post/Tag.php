<?php

namespace App\Models\Portal\Post;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_tags', 'tag_id', 'category_id');
    }
}
