<?php

namespace App\Repositories\Backend\Post;

use App\Exceptions\GeneralException;
use App\Models\Portal\Post\Post;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

//use Intervention\Image\Facades\Image;

/**
 * Class EloquentPostRepository.
 */
class EloquentPostRepository implements PostContract
{
    /**
     * @param $id
     * @return mixed
     * @throws GeneralException
     */
    public function findOrThrowException($id)
    {
        if (!is_null(Post::find($id))) {
            return Post::find($id);
        }
        throw new GeneralException('Not Found');
    }

    /**
     * @param $input
     * @return bool
     */
    public function create($input)
    {

        $post = new Post();
        $post->body = $input['body'];
        $post->department_id = $input['department_id'];
        $post->degree_id = $input['degree_id'];
        $post->grade_id = $input['grade_id'];
        $post->academic_year_id = $input['academic_year_id'];
        if(isset($input['file'])) {
            $post->file = $input['file'];
        }
        $post->published = isset($input['published'])?$input['published']:0;
        $post->create_uid = auth()->id();
        $post->created_at = Carbon::now();

        if ($post->save()) {

            if(isset($input['category_tag_id'])) {

                foreach($input['category_tag_id'] as $category_tag_id) {
                    $object = [
                        'category_tag_id' => $category_tag_id,
                        'post_id' => $post->id,
                        'created_at' => Carbon::now()
                    ];
                    DB::table('category_post_tags')->insert($object);
                }
            }
            return true;
        }
    }

    /*new-- how to solve --------this */
    /**
     * @TODO how to slove this.
     * @param $id
     * @param $input
     * @return mixed|void
     */
    public function update($id, $input)
    {


    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        return Post::all();
    }

}
