<?php

namespace App\Http\Controllers\Frontend\Portal;

use App\Helpers\Auth\Auth;
use App\Http\Controllers\Controller;
use App\Models\Access\User\Profile;
use App\Models\Portal\Post\Post;
use App\Models\Portal\Post\View;
use App\Models\Portal\Resume\PersonalInfo;
use App\Models\Portal\Resume\Resume;
use App\Repositories\Backend\User\UserContract;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Frontend\Portal\HelperTrait\PortalMenuTrait;


class PortalController extends Controller
{
    /**
     * PortalController constructor.
     */

    protected $academic;
    protected $studentPrefix;
    protected $controller;
    protected $users;

    use PortalMenuTrait;

    public function __construct(Controller $cont, UserContract $userRepo)
    {
        $this->middleware('auth');
        $this->studentPrefix = '/api/student';
        $this->academic = '/api/academic-year';
        $this->controller = $cont;
        $this->users = $userRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        return view('frontend.new_portals.index');

    }

    public function myPosts(Request $request) {

        $authUser = auth()->user();

        //$years = $this->controller->getElementByApi($this->academic . '/all', [], [], []);
        //$endYearId = collect($years)->max('id');
        //$studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [$authUser->email, $endYearId], []);

        $posts = Post::where('create_uid', $authUser->id)
            ->whereMonth('created_at', '>=', date("n", strtotime("first day of previous month")))//dd(date("Y-n-j", strtotime("first day of previous month")));
            ->orderBy('created_at', 'ASCE')->get();

        return view('frontend.new_portals.blogs.my_post', compact('posts'));

    }
    public function index_()
    {

        $user = auth()->user();
        $studentScore = $this->controller->getElementByApi($this->studentPrefix . '/score', ['student_id_card'], [$user->email], []);
        $years = $this->controller->getElementByApi($this->academic . '/all', [], [], []);
        $studentScore = $studentScore['course_score'];
        foreach ($years as $year) {
            if ($year == end($years))
                $academic_year = $year;
        }
        foreach ($studentScore as $score) {
            if ($score == end($studentScore)) {
                $scores = $score;
            }
        }
        $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [auth()->user()->email, $academic_year['id']], []);
        $posts_ = Post::where('published', true)->limit(3)->get();
        $array_key_post = [];
        foreach ($posts_ as $post) {

            $array_key_post[$post->degree_id][$post->department_id][$post->grade_id][] = $post;

        }
        if (isset($array_key_post[$studentData['degree_id']])) {
            $level_degree = $array_key_post[$studentData['degree_id']];
            $priority_to_post = $level_degree;
        } else {
            $priority_to_post = null;
        }
        if (isset($level_degree[$studentData['department_id']])) {

            $level_dept = $level_degree[$studentData['department_id']];
            $priority_to_post = $level_dept;

        }
        if (isset($level_dept[$studentData['grade_id']])) {
            $level_grade = $level_dept[$studentData['grade_id']];
            $priority_to_post = $level_grade;
        }

        //$priority_to_post = $level_grade; //$array_key_post[$studentData['degree_id']][$studentData['department_id']][$studentData['grade_id']];

        /*if (!is_null($priority_to_post)) {
            foreach ($posts_ as $post) {
                if ($post->degree_id != $studentData['degree_id']) {
                    if ($post->department_id != $studentData['department_id']) {

                        if ($post->grade_id != $studentData['grade_id']) {
                            $priority_to_post = array_merge($priority_to_post, [$post]);
                        }
                    }
                }

            }
            $posts = $priority_to_post;
        } else {
            $posts = $posts_;
        }*/

//        $posts = Post::latest()->limit(3)->get();
        $profile = Profile::where(['user_uid' => auth()->id()])->first();
        $resume = Resume::where(['user_uid' => auth()->id()])->first();
        $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], ['e20161226', 2017], []);


        return view('frontend.portals.index', compact('resume', 'profile', 'posts', 'studentScore', 'years', 'scores', 'academic_year'));
    }

    /**
     * @param $year
     * @return mixed
     */
    public function score($year)
    {
        $user = auth()->user();

        $studentScore = $this->controller->getElementByApi($this->studentPrefix . '/score', ['student_id_card', 'academic_year_id'], [$user->email, $year], []);
        $academic_years = $this->controller->getElementByApi($this->academic . '/all', [], [], []);


        $posts = Post::latest()->limit(3)->get();
        $profile = Profile::where(['user_uid' => auth()->id()])->first();
        $resume = Resume::where(['user_uid' => auth()->id()])->first();

        if ($studentScore == null || count($studentScore['course_score']) == 0) {

            return Response::json([
                view('frontend.portals.index', compact('academic_years', 'posts', 'profile', 'resume', 'studentScore')),
                'status' => false,
            ]);
        } else {
            return Response::json([
                view('frontend.portals.index', compact('academic_years', 'posts', 'profile', 'resume', 'studentScore')),
                'status' => true,
                'data' => $studentScore
            ]);
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $academic_years = $this->controller->getElementByApi($this->academic . '/all', [], [], []);
        foreach ($academic_years as $year) {
            if ($year == end($academic_years))
                $academic_year = $year;
        }

        $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [auth()->user()->email, $academic_year['id']], []);

        $newPost = new Post();

        $newPost->body = request('body');
        $newPost->department_id = $studentData['department_id'];
        $newPost->degree_id = $studentData['degree_id'];
        $newPost->grade_id = $studentData['grade_id'];
        $newPost->academic_year_id = $studentData['academic_year_id'];


        if (Input::file()) {

            $filename = Input::file('file');

            $change = $filename->getClientOriginalExtension();
            $newFilename = auth()->id() . str_random(8) . '.' . $change;
//            $filename->move('docs', "{$newFilename}" . $change);

//            Storage::disk('local')->put($newFilename,  file_get_contents($filename->getRealPath()));

            if (Input::file('file')->getMimeType() == 'image/jpeg' || Input::file('file')->getMimeType() == 'image/png' || Input::file('file')->getMimeType() == 'image/jpg') {

                $filename->move('img/frontend/uploads/images', "{$newFilename}");
            } else {

                $filename->move('docs', "{$newFilename}");
            }
            $newPost->file = $newFilename;

        }

        switch ($request->btn_submit) {

            case 'Publish':
                //action save here
                $newPost->published = 1;
                break;

            case 'Draft':
                //action for save-draft here
                $newPost->published = 0;
                break;
        }

        $newPost->create_uid = auth()->id();

        if ($newPost->save()) {
            session()->flash('flash_info', 'Post have been created');
        } else {
            session()->flash('flash_warning', 'Something went wrong');
        }

        return redirect()->back();
    }


    public function show(Post $post)
    {
        $newView = new View();
        $newView->post_uid = $post->id;
        $newView->save();
        $post = Post::find($post->id);
        return view('frontend.portals.show', compact('post'));
    }

    /**
     * @param Post $post
     * @return $this
     */
    public function edit(Post $post)
    {
        return view('frontend.portals.edit')->with('post', $post);
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Post $post)
    {


        if (!empty(Input::file())) {
            if ($post->profile) {
                $file = explode(".", $post->file);
                $filename = Input::file('file');
                $change = $filename->getClientOriginalExtension();
                $newfilename = auth()->id() . str_random(10) . '.';

                if (Input::file('file')->getMimeType() == 'image/jpeg') {

                    $filename->move('img/frontend/uploads/images', "{$newfilename}" . $change);
                } else {

                    $filename->move('docs', "{$newfilename}" . $change);
                }

                if ($file[1] == 'jpg' || $file[1] == 'jpeg' || $file[1] == 'png') {
                    unlink(public_path('img/frontend/uploads/images/' . $post->file));
                } else {
                    unlink(public_path('/docs' . $post->file));
                }

                $post->file = $newfilename . $change;
            } else {
                $filename = Input::file('file');
                $change = $filename->getClientOriginalExtension();
                $newfilename = auth()->id() . str_random(10) . '.';
                if (Input::file('file')->getMimeType() == 'image/jpeg') {

                    $filename->move('img/frontend/uploads/images', "{$newfilename}" . $change);
                } else {

                    $filename->move('docs', "{$newfilename}" . $change);
                }
                $post->file = $newfilename . $change;
            }

        } elseif (request('name') == null) {

            if (isset($post->file)) {
                $file = explode(".", $post->file);
                if ($file[1] == 'jpg' || $file[1] == 'jpeg' || $file[1] == 'png') {
                    unlink(public_path('img/frontend/uploads/images/' . $post->file));
                } else {
                    unlink(public_path('docs/' . $post->file));
                }
                $post->file = null;
            }

        }

        $post->body = request('body');

        $post->save();

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function post(Request $request)
    {
        $priority_to_post = [];
        /*$years = $this->controller->getElementByApi($this->academic . '/all', [], [], []);

        foreach ($years as $year) {
            if ($year == end($years))
                $academic_year = $year;
        }*/

        $studentData = $this->controller->getElementByApi($this->studentPrefix . '/annual-object', ['student_id_card', 'academic_year_id'], [auth()->user()->email, 2017], []);



        $posts_ = Post::where('published', true)
            ->whereMonth('created_at', '>=', date("n", strtotime("first day of previous month")))//dd(date("Y-n-j", strtotime("first day of previous month")));
            ->orderBy('created_at', 'ASCE')->get();

        $unpublished_post = Post::join('users', 'users.id', 'posts.create_uid')
            ->where([
                ['users.email', auth()->user()->email],
                ['posts.published', false]
            ])
            ->get();


        $array_key_post = [];

        foreach ($posts_ as $post) {

            $array_key_post[$post->degree_id][$post->department_id][$post->grade_id][] = $post;
        }

        if (isset($array_key_post[$studentData['degree_id']])) {

            $level_degree = $array_key_post[$studentData['degree_id']];


            if (isset($level_degree[$studentData['department_id']])) {

                $level_dept = $level_degree[$studentData['department_id']];

                $priority_to_post = $level_dept;

                if (isset($level_dept[$studentData['grade_id']])) {
                    $level_grade = $level_dept[$studentData['grade_id']];
                    //dd($level_grade);
                    $priority_to_post = $level_grade;
                } else {
                    //dd('no-grade');
                }

            } else {

                foreach($level_degree as $post_level_degree) {

                    if($this->isAssoc($post_level_degree)) {
                        foreach($post_level_degree as $post_de) {
                            $priority_to_post = array_merge($priority_to_post, $post_de);
                        }
                    }
                }

               // dd('no-dept');
            }
        } else {

            //dd('no-degree');
            $priority_to_post = [];
        }



        if (isset($priority_to_post)) {

            foreach ($posts_ as $post) {
                if ($post->degree_id != $studentData['degree_id']) {
                    if ($post->department_id != $studentData['department_id']) {

                        if ($post->grade_id != $studentData['grade_id']) {
                            $priority_to_post = array_merge($priority_to_post, [$post]);
                        }
                    }
                }

            }

            $posts = $priority_to_post;

        } else {
            $posts = $posts_;
        }

        $posts = $posts_;

       // dd((array)$priority_to_post);


        return view('frontend.portals.blog', compact('posts', 'posts_', 'unpublished_post'));
    }

    private function isAssoc(array $arr)
    {
        if (array() === $arr) return false;
        return array_keys($arr) !== range(0, count($arr) - 1);
    }


    /**
     * @return array
     */
    private function selectFields()
    {

        $select = [
            'id',
            'department_id',
            'degree_id',
            'grade_id',
            'academic_year_id',
            'file',
            'body',
            'published',
            'create_uid',
            'created_at',
            'updated_at'
        ];

        return $select;
    }


    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Post $post)
    {

        if ($post->file) {
            if (str_contains($post->file, '.pdf'))
                unlink(public_path('docs/' . $post->file));
            else
                unlink(public_path('img/frontend/uploads/images/' . $post->file));
        }
        Post::find($post->id)->delete();
        session()->flash('flash_success', 'Post have been deleted.');
        return redirect()->back();
    }

    /**
     * @param Post $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function publish(Post $post)
    {

        $post->published = 1;
        $post->updated_at = Carbon::now();

        if ($post->save()) {
            return redirect()->back();
        }

    }
}
