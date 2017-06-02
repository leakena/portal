<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 6/1/17
 * Time: 6:10 PM
 */

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Portal\Post\Post;

trait BlogPostTrait
{


    /**
     * @param Request $request
     * @return mixed
     *
     */
    public function selectCategory(Request $request)
    {
        if(isset($request->tag_id)) {

            $categories = DB::table('categories')
                ->join('category_tags', function ($query) use($request) {
                    $query->on('category_tags.category_id', '=', 'categories.id')
                        ->whereIn('category_tags.tag_id', $request->tag_id);
                })
                ->where(function ($subquery) use($request) {
                    $subquery->where('categories.name', 'like', '%'.$request->category_name.'%');
                })->select('categories.id', 'categories.name as text')->get();


        } else {
            $categories =DB::table('categories')
                ->where('name', 'like', '%' . $request->category_name . '%')->select('id', 'name as text')->get();
        }


        return $categories;

    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function selectTag(Request $request)
    {
        if(isset($request->category_id)) {

            $tages =DB::table('tags')
                ->join('category_tags', function ($query) use ($request) {
                    $query->on('category_tags.tag_id', '=', 'tags.id')
                        ->whereIn('category_tags.category_id', $request->category_id );
                })
                ->where(function ($subQuery) use ($request) {
                    $subQuery->where('tags.name', 'like', '%' . $request->tag_name . '%');
                })->select('tags.id', 'tags.name as text')->get();

            return $tages;

        } else {

            $tages =DB::table('tags')
                ->where('name', 'like', '%' . $request->tag_name . '%')->select('id', 'name as text')->get();

            return $tages;

        }

    }

    /**
     * @param array $categoryId
     * @param array $tagId
     * @return mixed
     */

    private function findCategoryPostTag(array $categoryId = array(), array $tagId = array())
    {

        $categoryPostTagIds = DB::table('categories')->where(function ($query) use($categoryId){
            $query->whereIn('categories.id', $categoryId);
        })->join('category_tags', function ($subQuery) use($tagId) {
            $subQuery->on('category_tags.category_id', '=', 'categories.id')
                ->whereIn('category_tags.tag_id', $tagId);
        })->pluck('category_tags.id')->toArray();

        return $categoryPostTagIds;

    }

    public function storePost(Request $request)
    {
       // $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [auth()->user()->email, $academic_year['id']], []);

        $categoryTagIds = $this->findCategoryPostTag($request->category, $request->tag);

        $studentData = [
            'department_id' => 4,
            'degree_id' => 1,
            'grade_id' => 4,
            'academic_year_id' => 2017

        ];



        $input = [
            'body' => $request->body,
            'department_id' => 4,
            'degree_id' => 1,
            'grade_id' => 4,
            'academic_year_id' => 2017,
            'published' => 1

        ];

        if(count($categoryTagIds) > 0) {
            $input += ['category_tag_id' => $categoryTagIds];
        }

        if (isset($request->file)) {

            $filename = $request->file;

            $change = $filename->getClientOriginalExtension();
            $newFilename = auth()->id() . str_random(8) . '.' . $change;

            if ($filename->getMimeType() == 'image/jpeg' || $filename->getMimeType() == 'image/png' || $filename->getMimeType() == 'image/jpg') {
                $filename->move('img/frontend/uploads/images', "{$newFilename}");
            } else {
                $filename->move('docs', "{$newFilename}");
            }
            $input += ['file' => $newFilename];
        }

        $savePost = $this->posts->create($input);
        if($savePost) {

            return redirect()->back();
        }

    }


    public function viewPdf($name)
    {
        return view('frontend.new_portals.blogs.view_files.view_pdf', compact('name'));

    }

    public function getMyPost(Request $request)
    {
        $posts = Post::whereMonth('created_at', '>=', date("n", strtotime("first day of previous month")))
            ->orderBy('created_at', 'ASCE');
        if(isset($request->type)) {
            $posts->where('create_uid', auth()->id());
        }

        $postIds = $posts->pluck('id');
        $categoryPostTags = DB::table('category_post_tags')->whereIn('post_id', $postIds);
        $categoryTagIds = $categoryPostTags->pluck('category_tag_id');
        $tagBypostIds = collect($categoryPostTags->get())->groupBy('post_id')->toArray();

        $tags = DB::table('tags')
            ->join('category_tags', function ($query) use($categoryTagIds) {
                $query->on('category_tags.tag_id', '=', 'tags.id')
                    ->whereIn('category_tags.id',$categoryTagIds );
            })
            ->select('tags.name', 'tags.id as tag_id', 'category_tags.id as category_tag_id')
            ->get();

        $collectionTags = collect($tags)->keyBy('category_tag_id')->toArray();

        $posts = $posts->get();

        return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts','tagBypostIds', 'collectionTags' ));

    }


    public function searchPost(Request $request)
    {

        $searchResult = DB::table('categories')
            ->join('category_tags', 'category_tags.category_id', '=', 'categories.id')
            ->join('tags', 'tags.id', '=', 'category_tags.tag_id')
            ->where(function ($query) use($request) {
                $query ->where('categories.name', 'like', '%' . $request->text . '%')
                    ->orWhere('tags.name', 'like', '%'. $request->text.'%');
            });

        $tags = $searchResult->select('tags.name',  'tags.id as tag_id', 'category_tags.id as category_tag_id');

        $collectionTags = collect($tags->get())->keyBy('category_tag_id')->toArray();

        $category_tag_ids = $searchResult->pluck('category_tag_id')->toArray();

        $posts = DB::table('posts')->join('category_post_tags', function ($query) use($category_tag_ids) {
            $query->on('category_post_tags.post_id', '=', 'posts.id')
                ->whereIn('category_post_tags.category_tag_id', $category_tag_ids);
        })
            ->select('posts.id', 'posts.body', 'posts.file', 'posts.created_at', 'posts.create_uid', 'category_post_tags.post_id', 'category_post_tags.category_tag_id')
            ->orderBy('posts.created_at', 'ASCE')->get();

        $tagBypostIds = collect($posts)->groupBy('post_id')->toArray();



        return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts','tagBypostIds', 'collectionTags' ));



    }
}