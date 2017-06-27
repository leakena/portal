<?php
/**
 * Created by PhpStorm.
 * User: vannat_gic
 * Date: 6/1/17
 * Time: 6:10 PM
 */

namespace App\Http\Controllers\Frontend\Portal\HelperTrait;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Models\Portal\Post\Post;
use Illuminate\Support\Facades\Response;
use App\Models\Access\User\User;

trait BlogPostTrait
{


    /**
     * @param Request $request
     * @return mixed
     *
     */
    public function selectCategory(Request $request)
    {
        if (isset($request->tag_id)) {

            $categories = DB::table('categories')
                ->join('category_tags', function ($query) use ($request) {
                    $query->on('category_tags.category_id', '=', 'categories.id')
                        ->whereIn('category_tags.tag_id', $request->tag_id);
                })
                ->where(function ($subquery) use ($request) {
                    $subquery->where('categories.name', 'like', '%' . $request->category_name . '%');
                })->select('categories.id', 'categories.name as text')->get();


        } else {
            $categories = DB::table('categories')
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
        if (isset($request->category_id)) {

            $tages = DB::table('tags')
                ->join('category_tags', function ($query) use ($request) {
                    $query->on('category_tags.tag_id', '=', 'tags.id')
                        ->whereIn('category_tags.category_id', $request->category_id);
                })
                ->where(function ($subQuery) use ($request) {
                    $subQuery->where('tags.name', 'like', '%' . $request->tag_name . '%');
                })->select('tags.id', 'tags.name as text')->get();

            return $tages;

        } else {

            $tages = DB::table('tags')
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

        $categoryPostTagIds = DB::table('categories')->where(function ($query) use ($categoryId) {
            $query->whereIn('categories.id', $categoryId);
        })->join('category_tags', function ($subQuery) use ($tagId) {
            $subQuery->on('category_tags.category_id', '=', 'categories.id')
                ->whereIn('category_tags.tag_id', $tagId);
        })->pluck('category_tags.id')->toArray();

        return $categoryPostTagIds;

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storePost(Request $request)
    {
        $thisYear = date("Y");
        $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [auth()->user()->email, $thisYear], []);

        $store = $this->create_post($request->title, $request->category, $request->tag, $request->body, $studentData, $request->file);
        if ($store) {
            return redirect()->back();
        }

    }

    /**
     * @param $title
     * @param $categoryIds
     * @param $tagIds
     * @param $body
     * @param $studentData
     * @param $file
     * @return bool
     */
    private function create_post($title, $categoryIds, $tagIds, $body, $studentData, $file)
    {

        $categoryTagIds = $this->findCategoryPostTag($categoryIds, $tagIds);
        $input = [
            'title' => $title,
            'body' => $body,
            'department_id' => $studentData['department_id'],
            'degree_id' => $studentData['degree_id'],
            'grade_id' => $studentData['grade_id'],
            'academic_year_id' => $studentData['academic_year_id'],
            'published' => 1

        ];

        if (count($categoryTagIds) > 0) {
            $input += ['category_tag_id' => $categoryTagIds];
        }

        if (isset($file)) {


            $filename = $file;

            $filenameWithExtention = $filename->getClientOriginalName();

            $change = $filename->getClientOriginalExtension();
            $newFilename = auth()->id() . strtotime(Carbon::now()) . '.' . $change;

            if ($filename->getMimeType() == 'image/jpeg' || $filename->getMimeType() == 'image/png' || $filename->getMimeType() == 'image/jpg') {
                $filename->move('img/frontend/uploads/images', "{$newFilename}");
            } else {
                $filename->move('docs', "{$newFilename}");
            }
            $input += ['file' => $newFilename];
        }

        $savePost = $this->posts->create($input);
        if ($savePost) {

            return true;
        }

    }


    /**
     * @param $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function viewPdf($name)
    {
        return view('frontend.new_portals.blogs.view_files.view_pdf', compact('name'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getMyPost(Request $request)
    {

        $thisYear = date("Y");

//        $posts = Post::whereMonth('created_at', '>=', date("n", strtotime("first day of previous month")))
//            ->orderBy('created_at', 'ASCE');

        if (isset($request->last_post)) {
            $posts = Post::whereYear('created_at', '=', $thisYear)
                ->where('created_at', '<', $request->last_post)
                ->orderBy('created_at', 'ASCE');

        } else {
            $posts = Post::whereYear('created_at', '=', $thisYear)
                ->where('created_at', '<=', Carbon::now())
                ->orderBy('created_at', 'ASCE');
        }


        if (isset($request->type)) {

            $posts = $posts->where('create_uid', auth()->id());
        }
        //dd($posts->get());
        if (count($posts->get()) > 0) {
            $postIds = $posts->pluck('id');
            $categoryPostTags = DB::table('category_post_tags')->whereIn('post_id', $postIds);
            $categoryTagIds = $categoryPostTags->pluck('category_tag_id');
            $tagBypostIds = collect($categoryPostTags->get())->groupBy('post_id')->toArray();

            $tags = DB::table('tags')
                ->join('category_tags', function ($query) use ($categoryTagIds) {
                    $query->on('category_tags.tag_id', '=', 'tags.id')
                        ->whereIn('category_tags.id', $categoryTagIds);
                })
                ->select('tags.name', 'tags.id as tag_id', 'category_tags.id as category_tag_id')
                ->get();

            $collectionTags = collect($tags)->keyBy('category_tag_id')->toArray();

            $posts = $posts->limit(2)->get();
            //dd($posts);
            $last_post = $posts->last()->created_at;
            $rest_post = Post::where([
                ['created_at', '<', $last_post],
                ['create_uid', auth()->user()->id]
            ])->get();
            //dd($rest_post);

            if ($rest_post->isEmpty()) {
                $last_post = '0';
            }
            return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts', 'tagBypostIds', 'collectionTags', 'last_post'));
        } else {
            $posts = [];
            $tagBypostIds = [];
            $collectionTags = [];
            $last_post = 0;


            return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts', 'tagBypostIds', 'collectionTags', 'last_post'));
        }


    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchPost(Request $request)
    {

        $searchResult = DB::table('categories')
            ->join('category_tags', 'category_tags.category_id', '=', 'categories.id')
            ->join('tags', 'tags.id', '=', 'category_tags.tag_id')
            ->where(function ($query) use ($request) {
                $query->where('categories.name', 'like', '%' . $request->text . '%')
                    ->orWhere('tags.name', 'like', '%' . $request->text . '%');
            });

        $tags = $searchResult->select('tags.name', 'tags.id as tag_id', 'category_tags.id as category_tag_id');

        $collectionTags = collect($tags->get())->keyBy('category_tag_id')->toArray();

        $category_tag_ids = $searchResult->pluck('category_tag_id')->toArray();


        $posts = DB::table('posts')->join('category_post_tags', function ($query) use ($category_tag_ids) {
            $query->on('category_post_tags.post_id', '=', 'posts.id')
                ->whereIn('category_post_tags.category_tag_id', $category_tag_ids);
        })
            ->select(
                'posts.id',
                'posts.title',
                'posts.body',
                'posts.file',
                'posts.created_at',
                'posts.create_uid',
                'category_post_tags.post_id',
                'category_post_tags.category_tag_id',
                'posts.degree_id',
                'posts.department_id',
                'posts.grade_id'
            )
            ->orderBy('posts.created_at', 'ASCE')->get();

        if(count($posts) == 0){

            $posts = Post::where('title', 'like' , '%' . $request->text . '%')->orderBy('posts.created_at', 'ASCE')->get();
           // dd($posts);
        }


        $tagBypostIds = collect($posts)->groupBy('post_id')->toArray();

        return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts', 'tagBypostIds', 'collectionTags'));

    }

    /**
     * @param $postId
     * @param Request $request
     * @return mixed
     */
    public function deletePost($postId, Request $request)
    {

        $destroy = $this->posts->destroy($postId);
        if ($destroy) {
            return Response::json(['status' => true]);
        }

    }

    /**
     * @param $postId
     * @param Request $request
     * @return mixed
     */
    public function ajaxEditPost($postId, Request $request)
    {
        $post = DB::table('posts')->where('id', $postId)->first();

        $categories = DB::table('categories')
            ->join('category_tags', function ($query) use ($post) {
                $query->on('category_tags.category_id', '=', 'categories.id')
                    ->whereIn('category_tags.id', DB::table('category_post_tags')->where('post_id', $post->id)->pluck('category_tag_id'));
            })
            ->select('categories.id', 'categories.name')
            ->get();

        $categories = collect($categories)->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();


        $tags = DB::table('tags')
            ->join('category_tags', function ($query) use ($post) {
                $query->on('category_tags.tag_id', '=', 'tags.id')
                    ->whereIn('category_tags.id', DB::table('category_post_tags')->where('post_id', $post->id)->pluck('category_tag_id'));
            })
            ->select('tags.id', 'tags.name')
            ->get()->toArray();

        $tags = collect($tags)->mapWithKeys(function ($item) {
            return [$item->id => $item->name];
        })->toArray();


        return Response::json([
            'status' => true,
            'post' => $post,
            'category' => $categories,
            'tag' => $tags
        ]);

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateBlogPost(Request $request)
    {
        $thisYear = date("Y");
        $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [auth()->user()->email, $thisYear], []);

        $postId = $request->post_id;

        if ($postId) {

            /*--user must at least select one type of category and tag---*/
            $categoryTagIds = $this->findCategoryPostTag($request->category, $request->tag);
            if (isset($request->file)) {

                /*--destroy post first then create it again ---*/
                $destroy = $this->posts->destroy($postId);
                if ($destroy) {
                    $createAgain = $this->create_post($request->category, $request->tag, $request->body, $studentData, $request->file);

                    if ($createAgain) {
                        return redirect()->back();
                    }
                }

            } else {
                $input = $request->all();
                $input += $studentData;
                $input += ['category_tag_id' => $categoryTagIds];
                $update = $this->posts->update($postId, $input);
                if ($update) {
                    return redirect()->back()->with('status', 'updated');
                }
            }

        } else {
            return redirect()->back()->with(['error' => 'Request sent without Post Id']);
            //return Response::json(['status' => false, 'message' => 'Request sent without Post Id']);

        }

    }

    /**
     * @param $categoryId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postByCategory($categoryId, Request $request)
    {

        $posts = Post::join('category_post_tags', function ($query) use ($categoryId) {

                $categoryTagIds = DB::table('categories')->join('category_tags', function ($subQuery) use ($categoryId) {
                    $subQuery->on('category_tags.category_id', '=', 'categories.id')
                        ->where('categories.id', '=', $categoryId);
                })->pluck('category_tags.id')->toArray();

                $query->on('category_post_tags.post_id', '=', 'posts.id')
                    ->whereIn('category_post_tags.category_tag_id', $categoryTagIds);

            })->select(
                'posts.id',
                'posts.title',
                'posts.body',
                'posts.file',
                'posts.created_at',
                'posts.create_uid',
                'category_post_tags.post_id',
                'category_post_tags.category_tag_id',
                'posts.degree_id',
                'posts.department_id',
                'posts.grade_id'
            )
            ->orderBy('posts.created_at', 'ASCE')->get();

        foreach ($posts as $post){
           // dd($post);
        }




        $tags = DB::table('tags')
            ->join('category_tags', function ($query) use ($categoryId) {
                $query->on('category_tags.tag_id', '=', 'tags.id')
                    ->whereIn('category_tags.category_id', [$categoryId]);
            })->select('tags.name', 'tags.id as tag_id', 'category_tags.id as category_tag_id');


        $newPosts = [];
        $collectionTags = collect($tags->get())->keyBy('category_tag_id')->toArray();

        $tagBypostIds = collect($posts)->mapWithKeys(function($item_post) use(&$newPosts){
            $item_post = (object)collect($item_post)->toArray();
            $newPosts[$item_post->id][] = $item_post;
            return $newPosts;
        })->toArray();


        $posts = collect($posts)->mapWithKeys(function ($item) {
            return [$item->post_id => (object)collect($item)->toArray()];
        })->toArray();



        return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts', 'tagBypostIds', 'collectionTags'));


    }

    /**
     * @param $tagId
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function postByTag($tagId, Request $request)
    {

        $posts = DB::table('posts')
            ->join('category_post_tags', function ($query) use ($tagId) {

                $categoryTagIds = DB::table('tags')->join('category_tags', function ($subQuery) use ($tagId) {
                    $subQuery->on('category_tags.tag_id', '=', 'tags.id')
                        ->where('tags.id', '=', $tagId);
                })->pluck('category_tags.id')->toArray();

                $query->on('category_post_tags.post_id', '=', 'posts.id')
                    ->whereIn('category_post_tags.category_tag_id', $categoryTagIds);

            })->select(
                'posts.id',
                'posts.body',
                'posts.file',
                'posts.created_at',
                'posts.create_uid',
                'category_post_tags.post_id',
                'category_post_tags.category_tag_id',
                'posts.degree_id',
                'posts.department_id',
                'posts.grade_id'
            )
            ->orderBy('posts.created_at', 'ASCE')->get();

        $tags = DB::table('tags')
            ->join('category_tags', function ($query) use ($tagId) {
                $query->on('category_tags.tag_id', '=', 'tags.id')
                    ->whereIn('category_tags.tag_id', [$tagId]);
            })->select('tags.name', 'tags.id as tag_id', 'category_tags.id as category_tag_id');

        $collectionTags = collect($tags->get())->keyBy('category_tag_id')->toArray();
        $tagBypostIds = collect($posts)->groupBy('id')->toArray();


        $posts = collect($posts)->mapWithKeys(function ($item) {
            return ([$item->post_id => $item]);
        })->toArray();

        return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts', 'tagBypostIds', 'collectionTags'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function loadMorePost(Request $request)
    {

        $dataToLoads = $this->loadPosts($request->last_post);
        // dd($request->last_post);
        $posts = $this->setPriority($dataToLoads['post'], $dataToLoads['student_data']);
        $tagBypostIds = $dataToLoads['tag_by_post_id'];
        $collectionTags = $dataToLoads['collection_tag'];
        //$lastMonth = $dataToLoads['last_month'];
        $last_post = $dataToLoads['last_post'];

        return view('frontend.new_portals.blogs.patials.each_blog_post', compact('posts', 'tagBypostIds', 'collectionTags', 'last_post'));

    }

    /**
     * @param $today
     * @return array
     */
    private function loadPosts($today)
    {

        //dd( date("Y",strtotime("-1 year")));

        if ($today) {


            $thisYear = date("Y");
            $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [auth()->user()->email, $thisYear], []);

            if ($today == Carbon::now()) {
                $posts = Post::whereYear('created_at', '=', $thisYear)
                    ->where('created_at', '<=', $today)//dd(date("Y-n-j", strtotime("first day of previous month")));
                    ->whereNotIn('create_uid', [auth()->id()])
                    ->orderBy('created_at', 'ASCE');

            } else {
                $posts = Post::whereYear('created_at', '=', $thisYear)
                    ->where('created_at', '<', $today)//dd(date("Y-n-j", strtotime("first day of previous month")));
                    ->whereNotIn('create_uid', [auth()->id()])
                    ->orderBy('created_at', 'ASCE');
            }


            $postIds = $posts->pluck('id');


            $categoryPostTags = DB::table('category_post_tags')->whereIn('post_id', $postIds);
            $categoryTagIds = $categoryPostTags->pluck('category_tag_id');
            $tagBypostIds = collect($categoryPostTags->get())->groupBy('post_id')->toArray();


            $tags = DB::table('tags')
                ->join('category_tags', function ($query) use ($categoryTagIds) {
                    $query->on('category_tags.tag_id', '=', 'tags.id')
                        ->whereIn('category_tags.id', $categoryTagIds);
                })
                ->select('tags.name', 'tags.id as tag_id', 'category_tags.id as category_tag_id')
                ->get();
            $collectionTags = collect($tags)->keyBy('category_tag_id')->toArray();

            $posts = $posts->limit(2)->get();


            $last_post = $posts->last()->created_at;
            $rest_post = Post::where('created_at', '<', $last_post)->get();

            if ($rest_post->isEmpty()) {
                $last_post = '0';
            }


            $posts = $this->setPriority($posts, $studentData);

            return [
                'post' => $posts,
                'tag_by_post_id' => $tagBypostIds,
                'collection_tag' => $collectionTags,
                'last_post' => $last_post,
                'student_data' => $studentData
            ];

        } else {
            return [];
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show_post(Request $request)
    {

        $post = Post::find($request->post_id);

        $categoryPostTags = DB::table('category_post_tags')->where('post_id', $request->post_id);
        //dd($categoryPostTags);
        $categoryTagIds = $categoryPostTags->pluck('category_tag_id');
        $tagBypostIds = collect($categoryPostTags->get())->groupBy('post_id')->toArray();


        $tags = DB::table('tags')
            ->join('category_tags', function ($query) use ($categoryTagIds) {
                $query->on('category_tags.tag_id', '=', 'tags.id')
                    ->whereIn('category_tags.id', $categoryTagIds);
            })
            ->select('tags.name', 'tags.id as tag_id', 'category_tags.id as category_tag_id')
            ->get();
        $collectionTags = collect($tags)->keyBy('category_tag_id')->toArray();

        return view('frontend.new_portals.blogs.patials.show', compact('post', 'tagBypostIds', 'collectionTags'));
    }
}