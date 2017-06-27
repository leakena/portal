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
        $post->title = $input['title'];
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
        $post = $this->findOrThrowException($id);

        if($input['is_crosed'] == 1) {

            if($post->file) {
                $this->removeFile($post->file);
               return  $this->fieldToUpdate($post, $input);
            }
        } else {
            return $this->fieldToUpdate($post, $input);
        }

    }

    private function fieldToUpdate($post, $input)
    {
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->department_id = $input['department_id'];
        $post->degree_id = $input['degree_id'];
        $post->grade_id = $input['grade_id'];
        $post->academic_year_id = $input['academic_year_id'];
        if(isset($input['file'])) {
            $post->file = $input['file'];
        } else {
            if($input['is_crosed'] == 1) {
                $post->file = null;
            }
        }
        $post->published = isset($input['published'])?$input['published']:0;
        $post->create_uid = auth()->id();
        $post->created_at = Carbon::now();
        $post->updated_at = Carbon::now();

        if ($post->save()) {

            /*---delete all category post tag----*/
            $delete = DB::table('category_post_tags')->where('post_id', $post->id)->delete();
            if($delete) {
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

            }
            return true;
        }
    }

    /**
     * @param $id
     * @return mixed|void
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.

        $post = $this->findOrThrowException($id);

        if(isset($post->file)) {

            $extention = explode('.', $post->file);

            if($extention[1] != 'png' && $extention[1] != 'jpg' ) {

                if(file_exists('docs/' . $post->file)) {
                    if (unlink('docs/' . $post->file)) {
                        $post->delete();
                    } else {
                        $post->delete();
                    }
                } else {
                    $post->delete();
                }
            } else {

                if(file_exists('img/frontend/uploads/images/' . $post->file)) {
                    if (unlink('img/frontend/uploads/images/' . $post->file)) {
                        $post->delete();
                    } else {
                        $post->delete();
                    }
                } else {
                    $post->delete();
                }

            }

        } else {

            $post->delete();

        }
            return true;

    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {

        return Post::all();
    }

    public function removeFile($file)
    {
        $extention = explode('.', $file);

        if($extention[1] != 'png' && $extention[1] != 'jpg' ) {

            if(file_exists('docs/' . $file)) {
                if (unlink('docs/' . $file)) {
                   return true;
                } else {
                   return false;
                }
            } else {
              return true;
            }
        } else {

            if(file_exists('img/frontend/uploads/images/' . $file)) {
                if (unlink('img/frontend/uploads/images/' . $file)) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return true;
            }

        }

    }

}
