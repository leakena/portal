<?php

namespace App\Models\Portal\Post;

use App\Models\Access\User\User;
use App\Models\Portal\Post\View;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'create_uid');
    }

    public function views(){
    	return $this->hasMany(View::class, 'post_uid');
    }
}
