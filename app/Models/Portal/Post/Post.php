<?php

namespace App\Models\Portal\Post;

use App\Models\Access\User\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo(User::class, 'id', 'create_uid');
    }
}
